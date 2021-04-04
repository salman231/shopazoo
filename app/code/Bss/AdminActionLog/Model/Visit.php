<?php
/**
 * BSS Commerce Co.
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the EULA
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://bsscommerce.com/Bss-Commerce-License.txt
 *
 * @category   BSS
 * @package    Bss_AdminActionLog
 * @author     Extension Team
 * @copyright  Copyright (c) 2017-2018 BSS Commerce Co. ( http://bsscommerce.com )
 * @license    http://bsscommerce.com/Bss-Commerce-License.txt
 */
namespace Bss\AdminActionLog\Model;

use Magento\Framework\Model\AbstractModel;

class Visit extends AbstractModel
{
    protected $pageTitle;

    protected $urlInterface;

    protected $authSession;

    protected $customerSession;

    protected $ipAddress;

    protected $dateTime;

    protected $helper;

    protected $loginlog;

    protected $_sessionactive;

    protected $visitdetail;

    protected $clearlog;

    /**
     * Visit constructor.
     * @param \Magento\Framework\Model\Context $context
     * @param \Magento\Framework\Registry $registry
     * @param \Magento\Framework\View\Page\Title $pageTitle
     * @param \Magento\Framework\UrlInterface $urlInterface
     * @param \Magento\Backend\Model\Auth\Session $authSession
     * @param \Magento\Customer\Model\Session $customerSession
     * @param \Magento\Framework\Stdlib\DateTime\DateTime $dateTime
     * @param \Bss\AdminActionLog\Helper\Data $helper
     * @param IpAdress $ipAddress
     * @param Login $loginlog
     * @param SessionActive $sessionactive
     * @param VisitDetail $visitdetail
     * @param ResourceModel\ClearLog $clearlog
     * @param \Magento\Framework\Model\ResourceModel\AbstractResource|null $resource
     * @param \Magento\Framework\Data\Collection\AbstractDb|null $resourceCollection
     * @param array $data
     */
    public function __construct(
        \Magento\Framework\Model\Context $context,
        \Magento\Framework\Registry $registry,
        \Magento\Framework\View\Page\Title $pageTitle,
        \Magento\Framework\UrlInterface $urlInterface,
        \Magento\Backend\Model\Auth\Session $authSession,
        \Magento\Customer\Model\Session $customerSession,
        \Magento\Framework\Stdlib\DateTime\DateTime $dateTime,
        \Bss\AdminActionLog\Helper\Data $helper,
        \Bss\AdminActionLog\Model\IpAdress $ipAddress,
        \Bss\AdminActionLog\Model\Login $loginlog,
        \Bss\AdminActionLog\Model\SessionActive $sessionactive,
        \Bss\AdminActionLog\Model\VisitDetail $visitdetail,
        \Bss\AdminActionLog\Model\ResourceModel\ClearLog $clearlog,
        \Magento\Framework\Model\ResourceModel\AbstractResource $resource = null,
        \Magento\Framework\Data\Collection\AbstractDb $resourceCollection = null,
        array $data = []
    ) {
        parent::__construct($context, $registry, $resource, $resourceCollection, $data);

        $this->pageTitle = $pageTitle;
        $this->urlInterface = $urlInterface;
        $this->authSession = $authSession;
        $this->customerSession = $customerSession;
        $this->dateTime = $dateTime;
        $this->helper = $helper;
        $this->ipAddress = $ipAddress;
        $this->loginlog = $loginlog;
        $this->_sessionactive = $sessionactive;
        $this->visitdetail = $visitdetail;
        $this->clearlog = $clearlog;
    }

    /**
     *
     */
    protected function _construct()
    {
        $this->_init('Bss\AdminActionLog\Model\ResourceModel\Visit');
    }

    /**
     * @return $this|bool
     */
    public function processVisitActive()
    {
        if (!$this->helper->isEnabled()) {
            return false;
        }
        $this->checkOnline();
        if (!$this->helper->isAdminAccountSharingEnabled()) {
            $user_name = $this->authSession->getUser()->getUserName();
            $session_actives = $this->_sessionactive->getCollection()
                                                    ->addFieldToFilter('user_name',$user_name);
            if ($session_actives->getSize()) {
                foreach ($session_actives as $session_active) {
                    $this->loginlog->logAdminLogin($session_active->getUserName(), 3, $session_active->getIpAddress(), null);
                    $this->processVisitRemove($session_active->getSessionId(), true);
                }
            }
        }
        $this->saveSessionActive();
        $this->startVisit();
        return $this;
    }

    /**
     *
     */
    protected function saveSessionActive()
    {   
        $this->_sessionactive->setData(
            [   'recent_activity' => $this->dateTime->gmtDate(),
                'session_id' => $this->authSession->getSessionId(),
                'user_name' => $this->authSession->getUser()->getUserName(),
                'name' => $this->authSession->getUser()->getName(),
                'ip_address' => $this->ipAddress->getIpAdress(),
                'created_at' => $this->dateTime->gmtDate()
            ]
        )->save();
    }

    /**
     *
     */
    protected function startVisit()
    {
        $this->setData(
                [   
                    'user_name' => $this->authSession->getUser()->getUserName(),
                    'name' => $this->authSession->getUser()->getName(),
                    'ip_address' => $this->ipAddress->getIpAdress(),
                    'session_id' => $this->authSession->getSessionId(),
                    'session_start' => $this->dateTime->gmtDate(),
                    'session_end' => ''
                ]
            )->save();
    }

    /**
     * @param null $sessionId
     * @param bool $loginlog
     * @return bool
     */
    public function processVisitRemove($sessionId = null, $loginlog = false)
    {   
        if (!$this->helper->isEnabled()) {
            return false;
        }
        
        if (!$loginlog && $this->authSession->getUser()) {
            $username = $this->authSession->getUser()->getUserName();
            $this->loginlog->logAdminLogin($username, 0, null, null);
        }

        if (!$sessionId) {
           $sessionId = $this->authSession->getSessionId();
        }

        $this->clearlog->deleteBySessionId($sessionId);

        $this->endVisit($sessionId);
    }

    /**
     * @param $sessionId
     */
    public function endVisit($sessionId)
    {
        $visit = $this->getCollection()->addFieldToFilter('session_id',$sessionId);
        if ($visit->getSize()) {
            foreach ($visit as $v) {
                $id = $v->getId();
                break;
            }
            $this->load($id)
                 ->setSessionEnd($this->dateTime->gmtDate())
                 ->save(); 
        }
        $this->saveLastPageDuration($sessionId);
    }

    /**
     * @param $sessionId
     * @return $this|bool
     */
    public function getLastSessionPage($sessionId)
    {
        $lastItem = $this->visitdetail->getCollection()
                                      ->addFieldToFilter('session_id',$sessionId);
        if ($lastItem->getSize()) {
            $i = 0;
            foreach ($lastItem as $v) {
                if(++$i === $lastItem->getSize()) {
                    $id = $v->getId();
                    break;
                }
            }
            return $this->visitdetail->load($id);
        }
        return false;
    }

    /**
     * @param $sessionId
     */
    public function saveLastPageDuration($sessionId)
    {
        $lastPage = $this->getLastSessionPage($sessionId);
        if ($lastPage) {
            $lastPageData = $lastPage->getData();
            $time = time();

            $lastPageTime = $this->customerSession->getLastPageTime();

            if (!empty($lastPageData) && $lastPageTime) {
                $duration = $time - $lastPageTime;
                $lastPage->setStayDuration($duration);
                $lastPage->save();
            }
        }
        
    }

    /**
     *
     */
    public function updateOnlineAdminActivity()
    {
        $sessionactive = $this->_sessionactive->getCollection()
                                ->addFieldToFilter('session_id',$this->authSession->getSessionId());
        if ($sessionactive->getSize()) {
            foreach ($sessionactive as $v) {
                $id = $v->getId();
                break;
            }
            $this->_sessionactive->load($id)
                                 ->setData('recent_activity', $this->dateTime->gmtDate())
                                 ->save();
        }
    }

    /**
     *
     */
    public function checkOnline()
    {
        $collection = $this->_sessionactive->getCollection();
        $sessionLifeTime = $this->helper->getAdminSessionLifetime();
        $currentTime = $this->dateTime->gmtTimestamp();

        foreach ($collection as $session_active) {
            $rowTime = strtotime($session_active->getRecentActivity());
            $timeDifference = $currentTime - $rowTime;
            if ($timeDifference >= $sessionLifeTime) {
                $time_logout = $rowTime + $sessionLifeTime;
                $sessionId = $session_active->getSessionId();
                $this->loginlog->logAdminLogin($session_active->getUserName(), 2, null, $time_logout);
                $this->processVisitRemove($sessionId, true);
            }
        }
    }

    /**
     *
     */
    public function saveDetailDataVisit() {
        if ($this->pageTitle->getShort()) {
            $sessionId = $this->authSession->getSessionId();
            $visit = $this->getCollection()
                          ->addFieldToFilter('session_id',$sessionId);

            $detailData = [];

            if ($visit->getSize()) {
                $detailData['page_name'] = __($this->pageTitle->getShort());
                $detailData['page_url'] = $this->urlInterface->getCurrentUrl() ;
                $detailData['session_id'] = $sessionId;
                $this->saveLastPageDuration($sessionId);
                $this->customerSession->setLastPageTime(time());
                $this->visitdetail->setData($detailData)->save();
            }
        }
    }

    /**
     * @return mixed
     */
    public function getSessionId()
    {
        return $this->getData('session_id');
    }
}
