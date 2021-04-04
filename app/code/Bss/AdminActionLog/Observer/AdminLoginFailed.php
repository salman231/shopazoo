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

use Magento\Framework\Exception\State\UserLockedException;

class AdminLoginFailed implements \Magento\Framework\Event\ObserverInterface
{
    protected $logAction;

    /**
     * AdminLoginFailed constructor.
     * @param \Bss\AdminActionLog\Model\Log $logAction
     */
    public function __construct(\Bss\AdminActionLog\Model\Log $logAction)
    {
        $this->logAction = $logAction;
    }

    /**
     * @param \Magento\Framework\Event\Observer $observer
     */
    public function execute(\Magento\Framework\Event\Observer $observer)
    {
        if (class_exists('Magento\User\Model\Backend\Observer', false) && $eventModel) {
            $exception = $observer->getException();
            if ($exception instanceof UserLockedException) {
                $this->logAction->logAdminLogin($observer->getUserName(), 5);
            }
        }else{
            $this->logAction->logAdminLogin($observer->getUserName(), 4);
        }
    }
}
