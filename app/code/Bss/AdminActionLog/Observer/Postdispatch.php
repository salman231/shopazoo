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
namespace Bss\AdminActionLog\Observer;

use Magento\Framework\Event\ObserverInterface;

class Postdispatch implements ObserverInterface
{
    protected $logAction;

    protected $visit;

    /**
     * Postdispatch constructor.
     * @param \Bss\AdminActionLog\Model\Log $logAction
     * @param \Bss\AdminActionLog\Model\Visit $visit
     */
    public function __construct(
        \Bss\AdminActionLog\Model\Log $logAction,
        \Bss\AdminActionLog\Model\Visit $visit
    ) {
        $this->logAction = $logAction;
        $this->visit = $visit;
    }

    /**
     * @param \Magento\Framework\Event\Observer $observer
     */
    public function execute(\Magento\Framework\Event\Observer $observer)
    {
        if ($observer->getEvent()->getControllerAction()->getRequest()->isDispatched()) {
            $this->logAction->logAction();
            $this->visit->saveDetailDataVisit();
            $this->visit->updateOnlineAdminActivity();
        }
    }
}
