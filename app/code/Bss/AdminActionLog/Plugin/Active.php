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
namespace Bss\AdminActionLog\Plugin;

class Active
{
    /**
     * Active constructor.
     * @param \Bss\AdminActionLog\Model\Visit $visit
     */
    public function __construct(\Bss\AdminActionLog\Model\Visit $visit)
    {
        $this->visit = $visit;
    }

    /**
     * @param \Magento\Backend\Model\Auth $authModel
     */
    public function afterLogin(\Magento\Backend\Model\Auth $authModel)
    {
        $this->visit->processVisitActive();
    }

    /**
     * @param \Magento\Backend\Model\Auth $authModel
     */
    public function beforeLogout(\Magento\Backend\Model\Auth $authModel)
    {
        $this->visit->processVisitRemove();
    }
}
