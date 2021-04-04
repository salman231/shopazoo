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
namespace Bss\AdminActionLog\Helper;

class Data extends \Magento\Framework\App\Helper\AbstractHelper
{

    protected $actiontype;

    protected $actioninfo;

    /**
     * Data constructor.
     * @param \Magento\Framework\App\Helper\Context $context
     * @param \Bss\AdminActionLog\Model\Config\Source\ActionType $actiontype
     * @param \Bss\AdminActionLog\Model\Config\Source\ActionInfo $actioninfo
     */
    public function __construct(
        \Magento\Framework\App\Helper\Context $context,
        \Bss\AdminActionLog\Model\Config\Source\ActionType $actiontype,
        \Bss\AdminActionLog\Model\Config\Source\ActionInfo $actioninfo
    ) {
        $this->actiontype = $actiontype;
        $this->actioninfo = $actioninfo;
        parent::__construct($context);
    }

    /**
     * @return bool
     */
    public function isEnabled()
    {
        return $this->scopeConfig->isSetFlag('action_log_bss/general/active', \Magento\Store\Model\ScopeInterface::SCOPE_STORE);
    }

    /**
     * @return mixed
     */
    public function getTimeClearLog()
    {
        return $this->scopeConfig->getValue('action_log_bss/general/clear_log', \Magento\Store\Model\ScopeInterface::SCOPE_STORE);
    }

    /**
     * @param null $groupaction
     * @return bool
     */
    public function getGroupActionAllow($groupaction = null)
    {
        $group_allow = $this->scopeConfig->getValue('action_log_bss/general/groupaction', \Magento\Store\Model\ScopeInterface::SCOPE_STORE);
        return in_array($groupaction, explode(',', $group_allow));
    }

    /**
     * @return int
     */
    public function getAdminSessionLifetime()
    {
        return (int) $this->scopeConfig->getValue('admin/security/session_lifetime', \Magento\Store\Model\ScopeInterface::SCOPE_STORE);
    }

    /**
     * @return bool
     */
    public function isAdminAccountSharingEnabled()
    {
        return $this->scopeConfig->isSetFlag('admin/security/admin_account_sharing', \Magento\Store\Model\ScopeInterface::SCOPE_STORE
        );
    }

    /**
     * @return array
     */
    public function getActionInfo()
    {
        return $this->actioninfo->toArray();
    }

    /**
     * @return array
     */
    public function getActionType()
    {
        return $this->actiontype->toArray();
    }
}
