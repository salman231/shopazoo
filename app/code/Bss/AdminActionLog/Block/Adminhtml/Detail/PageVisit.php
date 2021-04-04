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

class PageVisit extends Template
{
    protected $request;

    protected $visitFactory;

    protected $visitdetailCollectionFactory;

    /**
     * PageVisit constructor.
     * @param Template\Context $context
     * @param Http $request
     * @param \Bss\AdminActionLog\Model\VisitFactory $visitFactory
     * @param \Bss\AdminActionLog\Model\ResourceModel\VisitDetail\CollectionFactory $visitdetailCollectionFactory
     * @param array $data
     */
    public function __construct(
        Template\Context $context,
        Http $request,
        \Bss\AdminActionLog\Model\VisitFactory $visitFactory,
        \Bss\AdminActionLog\Model\ResourceModel\VisitDetail\CollectionFactory $visitdetailCollectionFactory,
        array $data = []
    ) {
        parent::__construct($context, $data);
        $this->request = $request;
        $this->visitFactory = $visitFactory;
        $this->visitdetailCollectionFactory = $visitdetailCollectionFactory;
    }

    /**
     * @return \Bss\AdminActionLog\Model\Visit
     */
    public function getVisit()
    {
        $params = $this->request->getParams();
        $visit = $this->visitFactory->create()->load($params['id']);
        return $visit;
    }

    /**
     * @param $date
     * @return string
     */
    public function formatTimeSession($date)
    {
        return $this->_localeDate->formatDateTime(
                $date,
                \IntlDateFormatter::MEDIUM
            );
    }

    /**
     * @return \Bss\AdminActionLog\Model\ResourceModel\VisitDetail\Collection
     */
    public function getVisitDetail()
    {
        $visit = $this->getVisit();
        $session_id =  $visit->getSessionId();
        $collecttion = $this->visitdetailCollectionFactory->create();
        $collecttion->addFieldToFilter('session_id', $session_id);
        return $collecttion;
    }

}