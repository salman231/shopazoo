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
namespace Bss\AdminActionLog\Block\Adminhtml\Detail;

use Magento\Backend\Block\Template;
use Magento\Framework\App\Request\Http;
use Magento\User\Model\UserFactory;

class Action extends Template
{
    protected $request;

    protected $userFactory;

    protected $actionFactory;

    protected $actionDetailCollectionFactory;

    protected $_localeDate;

    protected $convert;

    /**
     * Action constructor.
     * @param Template\Context $context
     * @param Http $request
     * @param UserFactory $userFactory
     * @param \Bss\AdminActionLog\Model\ActionGridFactory $actionFactory
     * @param \Bss\AdminActionLog\Model\ResourceModel\ActionDetail\CollectionFactory $actionDetailCollectionFactory
     * @param \Bss\AdminActionLog\Convert\FineDiffFactory $convert
     * @param array $data
     */
    public function __construct(
        Template\Context $context,
        Http $request,
        UserFactory $userFactory,
        \Bss\AdminActionLog\Model\ActionGridFactory $actionFactory,
        \Bss\AdminActionLog\Model\ResourceModel\ActionDetail\CollectionFactory $actionDetailCollectionFactory,
        \Bss\AdminActionLog\Convert\FineDiffFactory $convert,
        array $data = []
    ) {
        parent::__construct($context, $data);
        $this->request = $request;
        $this->userFactory = $userFactory;
        $this->actionFactory = $actionFactory;
        $this->actionDetailCollectionFactory = $actionDetailCollectionFactory;
        $this->convert = $convert;
    }

    /**
     * @return \Bss\AdminActionLog\Model\ActionGrid
     */
    public function getLog()
    {
        $params = $this->request->getParams();
        $actionlog = $this->actionFactory->create()->load($params['id']);
        return $actionlog;
    }

    /**
     * @return string
     */
    public function getCreatedAt()
    {
        return $this->_localeDate->formatDateTime(
                $this->getLog()->getCreatedAt(),
                \IntlDateFormatter::MEDIUM
            );
    }

    /**
     * @return \Bss\AdminActionLog\Model\ResourceModel\ActionDetail\Collection
     */
    public function getDetails()
    {
        $log = $this->getLog();
        $collecttion = $this->actionDetailCollectionFactory->create();
        $collecttion->addFieldToFilter('log_id', $log->getId());
        return $collecttion;
    }

    /**
     * @param $userId
     * @return \Magento\User\Model\User
     */
    public function getUser($userId)
    {
        return $this->userFactory->create()->load($userId);
    }

    /**
     * @return string
     */
    public function getUrlRevert()
    {
        $log =  $this->getLog();
        return $this->getUrl('bssadmin/config/revert', ['id' => $log->getId()]);
    }

    /**
     * @param $old
     * @param $new
     * @return array
     */
    public function getDecoratedDiff($old, $new){

        $from_text = substr($old, 0, 1024*100);
        $to_text = substr($new, 0, 1024*100);
        $from_text = str_replace(',',', ',$from_text);
        $to_text = str_replace(',',', ',$to_text);
        $from_text = mb_convert_encoding($from_text, 'HTML-ENTITIES', 'UTF-8');
        $to_text = mb_convert_encoding($to_text, 'HTML-ENTITIES', 'UTF-8');

        $diff_opcodes = $this->convert->create()->getDiffOpcodes($from_text, $to_text);

        $text_new = $this->convert->create()->_renderDiffToHTML($to_text, $diff_opcodes);
        $text_old = $this->convert->create()->renderDiffToHTML($from_text, $diff_opcodes);
        
        return ["old"=>$text_old, "new"=>$text_new];
    }
}