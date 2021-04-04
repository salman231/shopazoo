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
namespace Bss\AdminActionLog\Model\Config\Source;

class GroupAction implements \Magento\Framework\Option\ArrayInterface
{

    /**
     * @return array
     */
    public function toOptionArray()
    {
        return [
                ['value' => 'catalog_products', 'label' => __('Catalog Products')],
                ['value' => 'catalog_categories', 'label' => __('Catalog Categories')],
                ['value' => 'urlrewrites', 'label' => __('URL Rewrites')],
                ['value' => 'catalogsearch', 'label' => __('Catalog Search')],
                ['value' => 'rating', 'label' => __('Catalog Ratings')],
                ['value' => 'review', 'label' => __('Catalog Reviews')],
                ['value' => 'catalog_attributes', 'label' => __('Catalog Attributes')],
                ['value' => 'catalog_attributesets', 'label' => __('Catalog Product Templates')],
                ['value' => 'admin_login', 'label' => __('Admin Sign In')],
                ['value' => 'cms_pages', 'label' => __('CMS Pages')],
                ['value' => 'cms_blocks', 'label' => __('CMS Blocks')],
                ['value' => 'customer', 'label' => __('Customers')],
                ['value' => 'customer_groups', 'label' => __('Customer Groups')],
                ['value' => 'reports', 'label' => __('Reports')],
                ['value' => 'adminhtml_system_config', 'label' => __('System Configuration')],
                ['value' => 'catalogrule', 'label' => __('Catalog Price Rules')],
                ['value' => 'salesrule', 'label' => __('Cart Price Rules')],
                ['value' => 'adminhtml_system_account', 'label' => __('Admin My Account')],
                ['value' => 'newsletter_queue', 'label' => __('Newsletter Queue')],
                ['value' => 'newsletter_templates', 'label' => __('Newsletter Templates')],
                ['value' => 'newsletter_subscribers', 'label' => __('Newsletter Subscribers')],
                ['value' => 'sales_orders', 'label' => __('Sales Orders')],
                ['value' => 'sales_order_status', 'label' => __('Sales Order Status')],
                ['value' => 'sales_invoices', 'label' => __('Sales Invoices')],
                ['value' => 'sales_shipments', 'label' => __('Sales Shipments')],
                ['value' => 'sales_creditmemos', 'label' => __('Sales Credit Memos')],
                ['value' => 'sales_agreement', 'label' => __('Checkout Terms and Conditions')],
                ['value' => 'adminhtml_permission_roles', 'label' => __('Admin Permission Roles')],
                ['value' => 'adminhtml_permission_users', 'label' => __('Admin Permission Users')],
                ['value' => 'adminhtml_system_websites', 'label' => __('Manage Websites')],
                ['value' => 'adminhtml_system_store_groups', 'label' => __('Manage Stores')],
                ['value' => 'adminhtml_system_stores', 'label' => __('Manage Store Views')],
                ['value' => 'adminhtml_system_design', 'label' => __('Manage Design')],
                ['value' => 'adminhtml_system_currency', 'label' => __('Manage Currency Rates')],
                ['value' => 'adminhtml_email_template', 'label' => __('Transactional Emails')],
                ['value' => 'adminhtml_system_variable', 'label' => __('Custom Variables')],
                ['value' => 'backups', 'label' => __('System Backups')],
                ['value' => 'tax_customer_tax_classes', 'label' => __('Customer Tax Classes')],
                ['value' => 'tax_rules', 'label' => __('Tax Rules')],
                ['value' => 'tax_rates', 'label' => __('Tax Rates')],
                ['value' => 'google_sitemap', 'label' => __('XML Sitemap')],
                ['value' => 'widget_instance', 'label' => __('Widget')],
                ['value' => 'cache_management', 'label' => __('Cache Management')],
                ['value' => 'paypal_settlement_reports', 'label' => __('PayPal Settlement Reports')]
            ];
    }
}
