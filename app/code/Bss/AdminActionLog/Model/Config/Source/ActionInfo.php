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

class ActionInfo
{
    /**
     * @return array
     */
    public function toArray()
    {
        return [
                  'catalog_product_edit' =>
                  [
                    'label' => 'Catalog Products',
                    'group_name' => 'catalog_products',
                    'action' => 'view',
                    'controller_action' => 'catalog_product_edit',
                    'expected_models' => 'Magento\\Catalog\\Model\\Product',
                  ],
                  'catalog_product_save' =>
                  [
                    'label' => 'Catalog Products',
                    'group_name' => 'catalog_products',
                    'action' => 'save',
                    'controller_action' => 'catalog_product_save',
                    'expected_models' =>
                    [
                      'Magento\\Catalog\\Model\\Product' => [],
                      'Magento\\CatalogInventory\\Model\\Stock\\Item' => []
                    ],
                    'skip_on_back' => 'catalog_product_edit',
                  ],
                  'catalog_product_delete' =>
                  [
                    'label' => 'Catalog Products',
                    'group_name' => 'catalog_products',
                    'action' => 'delete',
                    'controller_action' => 'catalog_product_delete',
                    'expected_models' => 'Magento\\Catalog\\Model\\Product',
                  ],
                  'catalog_product_massStatus' =>
                  [
                    'label' => 'Catalog Products',
                    'group_name' => 'catalog_products',
                    'action' => 'massUpdate',
                    'controller_action' => 'catalog_product_massStatus',
                    'post_dispatch' => 'ProductUpdateAttributes',
                    'expected_models' => 'Magento\\Catalog\\Model\\Product',
                  ],
                  'catalog_product_massDelete' =>
                  [
                    'label' => 'Catalog Products',
                    'group_name' => 'catalog_products',
                    'action' => 'massDelete',
                    'post_dispatch' => 'MassAction',
                    'controller_action' => 'catalog_product_massDelete',
                    'expected_models' => 'Magento\\Catalog\\Model\\Product',
                  ],
                  'catalog_product_action_attribute_save' =>
                  [
                    'label' => 'Catalog Products',
                    'group_name' => 'catalog_products',
                    'action' => 'massUpdate',
                    'controller_action' => 'catalog_product_action_attribute_save',
                    'post_dispatch' => 'ProductUpdateAttributes',
                    'expected_models' => 'Magento\\Catalog\\Model\\Product',
                  ],
                  'catalog_category_edit' =>
                  [
                    'label' => 'Catalog Categories',
                    'group_name' => 'catalog_categories',
                    'action' => 'view',
                    'controller_action' => 'catalog_category_edit',
                    'expected_models' => 'Magento\\Catalog\\Model\\Category',
                  ],
                  'catalog_category_save' =>
                  [
                    'label' => 'Catalog Categories',
                    'group_name' => 'catalog_categories',
                    'action' => 'save',
                    'controller_action' => 'catalog_category_save',
                    'expected_models' => 'Magento\\Catalog\\Model\\Category',
                  ],
                  'catalog_category_move' =>
                  [
                    'label' => 'Catalog Categories',
                    'group_name' => 'catalog_categories',
                    'action' => 'move',
                    'controller_action' => 'catalog_category_move',
                    'post_dispatch' => 'CategoryMove',
                    'expected_models' => 'Magento\\Catalog\\Model\\Category',
                  ],
                  'catalog_category_delete' =>
                  [
                    'label' => 'Catalog Categories',
                    'group_name' => 'catalog_categories',
                    'action' => 'delete',
                    'controller_action' => 'catalog_category_delete',
                    'expected_models' => 'Magento\\Catalog\\Model\\Category',
                  ],
                  'adminhtml_url_rewrite_edit' =>
                  [
                    'label' => 'URL Rewrites',
                    'group_name' => 'urlrewrites',
                    'action' => 'view',
                    'controller_action' => 'adminhtml_url_rewrite_edit',
                    'expected_models' => 'Magento\\UrlRewrite\\Model\\UrlRewrite',
                  ],
                  'adminhtml_url_rewrite_save' =>
                  [
                    'label' => 'URL Rewrites',
                    'group_name' => 'urlrewrites',
                    'action' => 'save',
                    'controller_action' => 'adminhtml_url_rewrite_save',
                    'expected_models' => 'Magento\\UrlRewrite\\Model\\UrlRewrite',
                  ],
                  'adminhtml_url_rewrite_delete' =>
                  [
                    'label' => 'URL Rewrites',
                    'group_name' => 'urlrewrites',
                    'action' => 'delete',
                    'controller_action' => 'adminhtml_url_rewrite_delete',
                    'expected_models' => 'Magento\\UrlRewrite\\Model\\UrlRewrite',
                  ],
                  'catalog_search_edit' =>
                  [
                    'label' => 'Catalog Search',
                    'group_name' => 'catalogsearch',
                    'action' => 'view',
                    'controller_action' => 'catalog_search_edit',
                    'expected_models' => 'Magento\\Search\\Model\\Query',
                  ],
                  'catalog_search_save' =>
                  [
                    'label' => 'Catalog Search',
                    'group_name' => 'catalogsearch',
                    'action' => 'save',
                    'controller_action' => 'catalog_search_save',
                    'expected_models' => 'Magento\\Search\\Model\\Query',
                  ],
                  'catalog_search_delete' =>
                  [
                    'label' => 'Catalog Search',
                    'group_name' => 'catalogsearch',
                    'action' => 'delete',
                    'controller_action' => 'catalog_search_delete',
                    'expected_models' => 'Magento\\Search\\Model\\Query',
                  ],
                  'catalog_search_massDelete' =>
                  [
                    'label' => 'Catalog Search',
                    'group_name' => 'catalogsearch',
                    'action' => 'massDelete',
                    'controller_action' => 'catalog_search_massDelete',
                    'expected_models' => 'Magento\\Search\\Model\\Query',
                  ],
                  'adminhtml_index_globalSearch' =>
                  [
                    'label' => 'Catalog Search',
                    'group_name' => 'catalogsearch',
                    'action' => 'global_search',
                    'controller_action' => 'adminhtml_index_globalSearch',
                    'post_dispatch' => 'GlobalSearch',
                    'expected_models' => 'Magento\\Search\\Model\\Query',
                  ],
                  'rating_edit' =>
                  [
                    'label' => 'Catalog Ratings',
                    'group_name' => 'rating',
                    'action' => 'view',
                    'controller_action' => 'rating_edit',
                    'expected_models' => 'Magento\\Review\\Model\\Rating',
                  ],
                  'rating_save' =>
                  [
                    'label' => 'Catalog Ratings',
                    'group_name' => 'rating',
                    'action' => 'save',
                    'controller_action' => 'rating_save',
                    'expected_models' => 'Magento\\Review\\Model\\Rating',
                  ],
                  'rating_delete' =>
                  [
                    'label' => 'Catalog Ratings',
                    'group_name' => 'rating',
                    'action' => 'delete',
                    'controller_action' => 'rating_delete',
                    'expected_models' => 'Magento\\Review\\Model\\Rating',
                  ],
                  'review_product_edit' =>
                  [
                    'label' => 'Catalog Reviews',
                    'group_name' => 'review',
                    'action' => 'view',
                    'controller_action' => 'review_product_edit',
                    'expected_models' => 'Magento\\Review\\Model\\Review',
                  ],
                  'review_product_save' =>
                  [
                    'label' => 'Catalog Reviews',
                    'group_name' => 'review',
                    'action' => 'save',
                    'controller_action' => 'review_product_save',
                    'expected_models' => 'Magento\\Review\\Model\\Review',
                  ],
                  'review_product_post' =>
                  [
                    'label' => 'Catalog Reviews',
                    'group_name' => 'review',
                    'action' => 'save',
                    'controller_action' => 'review_product_post',
                    'expected_models' => 'Magento\\Review\\Model\\Review',
                  ],
                  'review_product_delete' =>
                  [
                    'label' => 'Catalog Reviews',
                    'group_name' => 'review',
                    'action' => 'delete',
                    'controller_action' => 'review_product_delete',
                    'expected_models' => 'Magento\\Review\\Model\\Review',
                  ],
                  'review_product_massUpdateStatus' =>
                  [
                    'label' => 'Catalog Reviews',
                    'group_name' => 'review',
                    'action' => 'massUpdate',
                    'controller_action' => 'review_product_massUpdateStatus',
                    'expected_models' => 'Magento\\Review\\Model\\Review',
                  ],
                  'review_product_massDelete' =>
                  [
                    'label' => 'Catalog Reviews',
                    'group_name' => 'review',
                    'action' => 'massDelete',
                    'controller_action' => 'review_product_massDelete',
                    'expected_models' => 'Magento\\Review\\Model\\Review',
                  ],
                  'catalog_product_attribute_edit' =>
                  [
                    'label' => 'Catalog Attributes',
                    'group_name' => 'catalog_attributes',
                    'action' => 'view',
                    'controller_action' => 'catalog_product_attribute_edit',
                    'expected_models' => 'Magento\\Catalog\\Model\\ResourceModel\\Eav\\Attribute',
                  ],
                  'catalog_product_attribute_save' =>
                  [
                    'label' => 'Catalog Attributes',
                    'group_name' => 'catalog_attributes',
                    'action' => 'save',
                    'controller_action' => 'catalog_product_attribute_save',
                    'expected_models' => 'Magento\\Catalog\\Model\\ResourceModel\\Eav\\Attribute',
                    'skip_on_back' => 'catalog_product_attribute_edit',
                  ],
                  'catalog_product_attribute_delete' =>
                  [
                    'label' => 'Catalog Attributes',
                    'group_name' => 'catalog_attributes',
                    'action' => 'delete',
                    'controller_action' => 'catalog_product_attribute_delete',
                    'expected_models' => 'Magento\\Catalog\\Model\\ResourceModel\\Eav\\Attribute',
                  ],
                  'catalog_product_set_edit' =>
                  [
                    'label' => 'Catalog Product Templates',
                    'group_name' => 'catalog_attributesets',
                    'action' => 'view',
                    'controller_action' => 'catalog_product_set_edit',
                    'expected_models' => 'Magento\\Eav\\Model\\Entity\\Attribute\\Set',
                  ],
                  'catalog_product_set_save' =>
                  [
                    'label' => 'Catalog Product Templates',
                    'group_name' => 'catalog_attributesets',
                    'action' => 'save',
                    'controller_action' => 'catalog_product_set_save',
                    'expected_models' => 'Magento\\Eav\\Model\\Entity\\Attribute\\Set',
                    'skip_on_back' => 'catalog_product_set_edit',
                  ],
                  'catalog_product_set_delete' =>
                  [
                    'label' => 'Catalog Product Templates',
                    'group_name' => 'catalog_attributesets',
                    'action' => 'delete',
                    'controller_action' => 'catalog_product_set_delete',
                    'expected_models' => 'Magento\\Eav\\Model\\Entity\\Attribute\\Set',
                  ],
                  'adminhtml_auth_forgotpassword' =>
                  [
                    'label' => 'Admin Sign In',
                    'group_name' => 'admin_login',
                    'action' => 'forgotpassword',
                    'controller_action' => 'adminhtml_auth_forgotpassword',
                    'post_dispatch' => 'ForgotPassword',
                    'expected_models' => 'Magento\\User\\Model\\User',
                  ],
                  'cms_page_edit' =>
                  [
                    'label' => 'CMS Pages',
                    'group_name' => 'cms_pages',
                    'action' => 'view',
                    'controller_action' => 'cms_page_edit',
                    'expected_models' => 'Magento\\Cms\\Model\\Page',
                  ],
                  'cms_page_save' =>
                  [
                    'label' => 'CMS Pages',
                    'group_name' => 'cms_pages',
                    'action' => 'save',
                    'controller_action' => 'cms_page_save',
                    'expected_models' => 'Magento\\Cms\\Model\\Page',
                    'skip_on_back' => 'cms_page_edit',
                  ],
                  'cms_page_delete' =>
                  [
                    'label' => 'CMS Pages',
                    'group_name' => 'cms_pages',
                    'action' => 'delete',
                    'controller_action' => 'cms_page_delete',
                    'expected_models' => 'Magento\\Cms\\Model\\Page',
                  ],
                  'adminhtml_cms_page_edit' =>
                  [
                    'label' => 'CMS Pages',
                    'group_name' => 'version_cms_pages',
                    'action' => 'view',
                    'controller_action' => 'adminhtml_cms_page_edit',
                    'expected_models' => 'Magento\\Cms\\Model\\Page',
                  ],
                  'adminhtml_cms_page_save' =>
                  [
                    'label' => 'CMS Pages',
                    'group_name' => 'version_cms_pages',
                    'action' => 'save',
                    'controller_action' => 'adminhtml_cms_page_save',
                    'expected_models' => 'Magento\\Cms\\Model\\Page',
                    'skip_on_back' => 'adminhtml_cms_page_edit',
                  ],
                  'adminhtml_cms_page_delete' =>
                  [
                    'label' => 'CMS Pages',
                    'group_name' => 'version_cms_pages',
                    'action' => 'delete',
                    'controller_action' => 'adminhtml_cms_page_delete',
                    'expected_models' => 'Magento\\Cms\\Model\\Page',
                  ],
                  'cms_block_edit' =>
                  [
                    'label' => 'CMS Blocks',
                    'group_name' => 'cms_blocks',
                    'action' => 'view',
                    'controller_action' => 'cms_block_edit',
                    'expected_models' => 'Magento\\Cms\\Model\\Block',
                  ],
                  'cms_block_save' =>
                  [
                    'label' => 'CMS Blocks',
                    'group_name' => 'cms_blocks',
                    'action' => 'save',
                    'controller_action' => 'cms_block_save',
                    'expected_models' => 'Magento\\Cms\\Model\\Block',
                  ],
                  'cms_block_delete' =>
                  [
                    'label' => 'CMS Blocks',
                    'group_name' => 'cms_blocks',
                    'action' => 'delete',
                    'controller_action' => 'cms_block_delete',
                    'expected_models' => 'Magento\\Cms\\Model\\Block',
                  ],
                  'customer_index_edit' =>
                  [
                    'label' => 'Customers',
                    'group_name' => 'customer',
                    'action' => 'view',
                    'controller_action' => 'customer_index_edit',
                    'expected_models' => 'Magento\\Customer\\Model\\Customer',
                  ],
                  'customer_index_save' =>
                  [
                    'label' => 'Customers',
                    'group_name' => 'customer',
                    'action' => 'save',
                    'controller_action' => 'customer_index_save',
                    'expected_models' => 'Magento\\Customer\\Model\\Customer',
                    'skip_on_back' => 'customer_index_edit',
                  ],
                  'customer_index_validate' =>
                  [
                    'label' => 'Customers',
                    'group_name' => 'customer',
                    'action' => 'save',
                    'controller_action' => 'customer_index_validate',
                    'post_dispatch' => 'CustomerValidate',
                    'expected_models' => 'Magento\\Customer\\Model\\Customer',
                  ],
                  'customer_index_delete' =>
                  [
                    'label' => 'Customers',
                    'group_name' => 'customer',
                    'action' => 'delete',
                    'controller_action' => 'customer_index_delete',
                    'expected_models' => 'Magento\\Customer\\Model\\Customer',
                  ],
                  'customer_index_massSubscribe' =>
                  [
                    'label' => 'Customers',
                    'group_name' => 'customer',
                    'action' => 'massUpdate',
                    'controller_action' => 'customer_index_massSubscribe',
                    'expected_models' => 'Magento\\Customer\\Model\\Customer',
                  ],
                  'customer_index_massUnsubscribe' =>
                  [
                    'label' => 'Customers',
                    'group_name' => 'customer',
                    'action' => 'massUpdate',
                    'controller_action' => 'customer_index_massUnsubscribe',
                    'expected_models' => 'Magento\\Customer\\Model\\Customer',
                  ],
                  'customer_index_massDelete' =>
                  [
                    'label' => 'Customers',
                    'group_name' => 'customer',
                    'action' => 'massDelete',
                    'controller_action' => 'customer_index_massDelete',
                    'expected_models' => 'Magento\\Customer\\Model\\Customer',
                  ],
                  'customer_index_exportCsv' =>
                  [
                    'label' => 'Customers',
                    'group_name' => 'customer',
                    'action' => 'export',
                    'controller_action' => 'customer_index_exportCsv',
                    'expected_models' => 'Magento\\Customer\\Model\\Customer',
                  ],
                  'customer_index_exportXml' =>
                  [
                    'label' => 'Customers',
                    'group_name' => 'customer',
                    'action' => 'export',
                    'controller_action' => 'customer_index_exportXml',
                    'expected_models' => 'Magento\\Customer\\Model\\Customer',
                  ],
                  'customer_index_massAssignGroup' =>
                  [
                    'label' => 'Customers',
                    'group_name' => 'customer',
                    'action' => 'massUpdate',
                    'controller_action' => 'customer_index_massAssignGroup',
                    'expected_models' => 'Magento\\Customer\\Model\\Customer',
                  ],
                  'customer_group_edit' =>
                  [
                    'label' => 'Customer Groups',
                    'group_name' => 'customer_groups',
                    'action' => 'view',
                    'controller_action' => 'customer_group_edit',
                    'expected_models' => 'Magento\\Customer\\Model\\Group',
                  ],
                  'customer_group_save' =>
                  [
                    'label' => 'Customer Groups',
                    'group_name' => 'customer_groups',
                    'action' => 'save',
                    'controller_action' => 'customer_group_save',
                    'expected_models' => 'Magento\\Customer\\Model\\Group',
                  ],
                  'customer_group_delete' =>
                  [
                    'label' => 'Customer Groups',
                    'group_name' => 'customer_groups',
                    'action' => 'delete',
                    'controller_action' => 'customer_group_delete',
                    'expected_models' => 'Magento\\Customer\\Model\\Group',
                  ],
                  'reports_report_sales_sales' =>
                  [
                    'label' => 'Reports',
                    'group_name' => 'reports',
                    'action' => 'view',
                    'controller_action' => 'reports_report_sales_sales',
                  ],
                  'reports_report_sales_tax' =>
                  [
                    'label' => 'Reports',
                    'group_name' => 'reports',
                    'action' => 'view',
                    'controller_action' => 'reports_report_sales_tax',
                  ],
                  'reports_report_sales_shipping' =>
                  [
                    'label' => 'Reports',
                    'group_name' => 'reports',
                    'action' => 'view',
                    'controller_action' => 'reports_report_sales_shipping',
                  ],
                  'reports_report_sales_invoiced' =>
                  [
                    'label' => 'Reports',
                    'group_name' => 'reports',
                    'action' => 'view',
                    'controller_action' => 'reports_report_sales_invoiced',
                  ],
                  'reports_report_sales_refunded' =>
                  [
                    'label' => 'Reports',
                    'group_name' => 'reports',
                    'action' => 'view',
                    'controller_action' => 'reports_report_sales_refunded',
                  ],
                  'reports_report_sales_coupons' =>
                  [
                    'label' => 'Reports',
                    'group_name' => 'reports',
                    'action' => 'view',
                    'controller_action' => 'reports_report_sales_coupons',
                  ],
                  'reports_report_shopcart_product' =>
                  [
                    'label' => 'Reports',
                    'group_name' => 'reports',
                    'action' => 'view',
                    'controller_action' => 'reports_report_shopcart_product',
                  ],
                  'reports_report_shopcart_abandoned' =>
                  [
                    'label' => 'Reports',
                    'group_name' => 'reports',
                    'action' => 'view',
                    'controller_action' => 'reports_report_shopcart_abandoned',
                  ],
                  'reports_report_product_sold' =>
                  [
                    'label' => 'Reports',
                    'group_name' => 'reports',
                    'action' => 'view',
                    'controller_action' => 'reports_report_product_sold',
                  ],
                  'reports_report_product_ordered' =>
                  [
                    'label' => 'Reports',
                    'group_name' => 'reports',
                    'action' => 'view',
                    'controller_action' => 'reports_report_product_ordered',
                  ],
                  'reports_report_product_viewed' =>
                  [
                    'label' => 'Reports',
                    'group_name' => 'reports',
                    'action' => 'view',
                    'controller_action' => 'reports_report_product_viewed',
                  ],
                  'reports_report_product_lowstock' =>
                  [
                    'label' => 'Reports',
                    'group_name' => 'reports',
                    'action' => 'view',
                    'controller_action' => 'reports_report_product_lowstock',
                  ],
                  'reports_report_product_downloads' =>
                  [
                    'label' => 'Reports',
                    'group_name' => 'reports',
                    'action' => 'view',
                    'controller_action' => 'reports_report_product_downloads',
                  ],
                  'reports_report_customer_accounts' =>
                  [
                    'label' => 'Reports',
                    'group_name' => 'reports',
                    'action' => 'view',
                    'controller_action' => 'reports_report_customer_accounts',
                  ],
                  'reports_report_customer_orders' =>
                  [
                    'label' => 'Reports',
                    'group_name' => 'reports',
                    'action' => 'view',
                    'controller_action' => 'reports_report_customer_orders',
                  ],
                  'reports_report_customer_totals' =>
                  [
                    'label' => 'Reports',
                    'group_name' => 'reports',
                    'action' => 'view',
                    'controller_action' => 'reports_report_customer_totals',
                  ],
                  'reports_report_review_customer' =>
                  [
                    'label' => 'Reports',
                    'group_name' => 'reports',
                    'action' => 'view',
                    'controller_action' => 'reports_report_review_customer',
                  ],
                  'reports_report_review_product' =>
                  [
                    'label' => 'Reports',
                    'group_name' => 'reports',
                    'action' => 'view',
                    'controller_action' => 'reports_report_review_product',
                  ],
                  'reports_index_search' =>
                  [
                    'label' => 'Reports',
                    'group_name' => 'reports',
                    'action' => 'view',
                    'controller_action' => 'reports_index_search',
                  ],
                  'invitations_report_invitation_index' =>
                  [
                    'label' => 'Reports',
                    'group_name' => 'reports',
                    'action' => 'view',
                    'controller_action' => 'invitations_report_invitation_index',
                  ],
                  'invitations_report_invitation_customer' =>
                  [
                    'label' => 'Reports',
                    'group_name' => 'reports',
                    'action' => 'view',
                    'controller_action' => 'invitations_report_invitation_customer',
                  ],
                  'invitations_report_invitation_order' =>
                  [
                    'label' => 'Reports',
                    'group_name' => 'reports',
                    'action' => 'view',
                    'controller_action' => 'invitations_report_invitation_order',
                  ],
                  'reports_report_sales_exportSalesCsv' =>
                  [
                    'label' => 'Reports',
                    'group_name' => 'reports',
                    'action' => 'export',
                    'controller_action' => 'reports_report_sales_exportSalesCsv',
                  ],
                  'reports_report_sales_exportSalesExcel' =>
                  [
                    'label' => 'Reports',
                    'group_name' => 'reports',
                    'action' => 'export',
                    'controller_action' => 'reports_report_sales_exportSalesExcel',
                  ],
                  'reports_report_sales_exportTaxCsv' =>
                  [
                    'label' => 'Reports',
                    'group_name' => 'reports',
                    'action' => 'export',
                    'controller_action' => 'reports_report_sales_exportTaxCsv',
                  ],
                  'reports_report_sales_exportTaxExcel' =>
                  [
                    'label' => 'Reports',
                    'group_name' => 'reports',
                    'action' => 'export',
                    'controller_action' => 'reports_report_sales_exportTaxExcel',
                  ],
                  'reports_report_sales_exportShippingCsv' =>
                  [
                    'label' => 'Reports',
                    'group_name' => 'reports',
                    'action' => 'export',
                    'controller_action' => 'reports_report_sales_exportShippingCsv',
                  ],
                  'reports_report_sales_exportShippingExcel' =>
                  [
                    'label' => 'Reports',
                    'group_name' => 'reports',
                    'action' => 'export',
                    'controller_action' => 'reports_report_sales_exportShippingExcel',
                  ],
                  'reports_report_sales_exportInvoicedCsv' =>
                  [
                    'label' => 'Reports',
                    'group_name' => 'reports',
                    'action' => 'export',
                    'controller_action' => 'reports_report_sales_exportInvoicedCsv',
                  ],
                  'reports_report_sales_exportInvoicedExcel' =>
                  [
                    'label' => 'Reports',
                    'group_name' => 'reports',
                    'action' => 'export',
                    'controller_action' => 'reports_report_sales_exportInvoicedExcel',
                  ],
                  'reports_report_sales_exportRefundedCsv' =>
                  [
                    'label' => 'Reports',
                    'group_name' => 'reports',
                    'action' => 'export',
                    'controller_action' => 'reports_report_sales_exportRefundedCsv',
                  ],
                  'reports_report_sales_exportRefundedExcel' =>
                  [
                    'label' => 'Reports',
                    'group_name' => 'reports',
                    'action' => 'export',
                    'controller_action' => 'reports_report_sales_exportRefundedExcel',
                  ],
                  'reports_report_sales_exportCouponsCsv' =>
                  [
                    'label' => 'Reports',
                    'group_name' => 'reports',
                    'action' => 'export',
                    'controller_action' => 'reports_report_sales_exportCouponsCsv',
                  ],
                  'reports_report_sales_exportCouponsExcel' =>
                  [
                    'label' => 'Reports',
                    'group_name' => 'reports',
                    'action' => 'export',
                    'controller_action' => 'reports_report_sales_exportCouponsExcel',
                  ],
                  'reports_report_shopcart_exportProductCsv' =>
                  [
                    'label' => 'Reports',
                    'group_name' => 'reports',
                    'action' => 'export',
                    'controller_action' => 'reports_report_shopcart_exportProductCsv',
                  ],
                  'reports_report_shopcart_exportProductExcel' =>
                  [
                    'label' => 'Reports',
                    'group_name' => 'reports',
                    'action' => 'export',
                    'controller_action' => 'reports_report_shopcart_exportProductExcel',
                  ],
                  'reports_report_shopcart_exportAbandonedCsv' =>
                  [
                    'label' => 'Reports',
                    'group_name' => 'reports',
                    'action' => 'export',
                    'controller_action' => 'reports_report_shopcart_exportAbandonedCsv',
                  ],
                  'reports_report_shopcart_exportAbandonedExcel' =>
                  [
                    'label' => 'Reports',
                    'group_name' => 'reports',
                    'action' => 'export',
                    'controller_action' => 'reports_report_shopcart_exportAbandonedExcel',
                  ],
                  'reports_report_product_exportOrderedCsv' =>
                  [
                    'label' => 'Reports',
                    'group_name' => 'reports',
                    'action' => 'export',
                    'controller_action' => 'reports_report_product_exportOrderedCsv',
                  ],
                  'reports_report_product_exportOrderedExcel' =>
                  [
                    'label' => 'Reports',
                    'group_name' => 'reports',
                    'action' => 'export',
                    'controller_action' => 'reports_report_product_exportOrderedExcel',
                  ],
                  'reports_report_product_exportViewedCsv' =>
                  [
                    'label' => 'Reports',
                    'group_name' => 'reports',
                    'action' => 'export',
                    'controller_action' => 'reports_report_product_exportViewedCsv',
                  ],
                  'reports_report_product_exportViewedExcel' =>
                  [
                    'label' => 'Reports',
                    'group_name' => 'reports',
                    'action' => 'export',
                    'controller_action' => 'reports_report_product_exportViewedExcel',
                  ],
                  'reports_report_product_exportSoldCsv' =>
                  [
                    'label' => 'Reports',
                    'group_name' => 'reports',
                    'action' => 'export',
                    'controller_action' => 'reports_report_product_exportSoldCsv',
                  ],
                  'reports_report_product_exportSoldExcel' =>
                  [
                    'label' => 'Reports',
                    'group_name' => 'reports',
                    'action' => 'export',
                    'controller_action' => 'reports_report_product_exportSoldExcel',
                  ],
                  'reports_report_product_exportLowstockCsv' =>
                  [
                    'label' => 'Reports',
                    'group_name' => 'reports',
                    'action' => 'export',
                    'controller_action' => 'reports_report_product_exportLowstockCsv',
                  ],
                  'reports_report_product_exportLowstockExcel' =>
                  [
                    'label' => 'Reports',
                    'group_name' => 'reports',
                    'action' => 'export',
                    'controller_action' => 'reports_report_product_exportLowstockExcel',
                  ],
                  'reports_report_product_exportDownloadsCsv' =>
                  [
                    'label' => 'Reports',
                    'group_name' => 'reports',
                    'action' => 'export',
                    'controller_action' => 'reports_report_product_exportDownloadsCsv',
                  ],
                  'reports_report_product_exportDownloadsExcel' =>
                  [
                    'label' => 'Reports',
                    'group_name' => 'reports',
                    'action' => 'export',
                    'controller_action' => 'reports_report_product_exportDownloadsExcel',
                  ],
                  'reports_report_customer_exportAccountsCsv' =>
                  [
                    'label' => 'Reports',
                    'group_name' => 'reports',
                    'action' => 'export',
                    'controller_action' => 'reports_report_customer_exportAccountsCsv',
                  ],
                  'reports_report_customer_exportAccountsExcel' =>
                  [
                    'label' => 'Reports',
                    'group_name' => 'reports',
                    'action' => 'export',
                    'controller_action' => 'reports_report_customer_exportAccountsExcel',
                  ],
                  'reports_report_customer_exportTotalsCsv' =>
                  [
                    'label' => 'Reports',
                    'group_name' => 'reports',
                    'action' => 'export',
                    'controller_action' => 'reports_report_customer_exportTotalsCsv',
                  ],
                  'reports_report_customer_exportTotalsExcel' =>
                  [
                    'label' => 'Reports',
                    'group_name' => 'reports',
                    'action' => 'export',
                    'controller_action' => 'reports_report_customer_exportTotalsExcel',
                  ],
                  'reports_report_customer_exportOrdersCsv' =>
                  [
                    'label' => 'Reports',
                    'group_name' => 'reports',
                    'action' => 'export',
                    'controller_action' => 'reports_report_customer_exportOrdersCsv',
                  ],
                  'reports_report_customer_exportOrdersExcel' =>
                  [
                    'label' => 'Reports',
                    'group_name' => 'reports',
                    'action' => 'export',
                    'controller_action' => 'reports_report_customer_exportOrdersExcel',
                  ],
                  'reports_report_review_exportCustomerCsv' =>
                  [
                    'label' => 'Reports',
                    'group_name' => 'reports',
                    'action' => 'export',
                    'controller_action' => 'reports_report_review_exportCustomerCsv',
                  ],
                  'reports_report_review_exportCustomerExcel' =>
                  [
                    'label' => 'Reports',
                    'group_name' => 'reports',
                    'action' => 'export',
                    'controller_action' => 'reports_report_review_exportCustomerExcel',
                  ],
                  'reports_report_review_exportProductCsv' =>
                  [
                    'label' => 'Reports',
                    'group_name' => 'reports',
                    'action' => 'export',
                    'controller_action' => 'reports_report_review_exportProductCsv',
                  ],
                  'reports_report_review_exportProductExcel' =>
                  [
                    'label' => 'Reports',
                    'group_name' => 'reports',
                    'action' => 'export',
                    'controller_action' => 'reports_report_review_exportProductExcel',
                  ],
                  'reports_index_exportSearchCsv' =>
                  [
                    'label' => 'Reports',
                    'group_name' => 'reports',
                    'action' => 'export',
                    'controller_action' => 'reports_index_exportSearchCsv',
                  ],
                  'reports_index_exportSearchExcel' =>
                  [
                    'label' => 'Reports',
                    'group_name' => 'reports',
                    'action' => 'export',
                    'controller_action' => 'reports_index_exportSearchExcel',
                  ],
                  'invitations_report_invitation_exportCsv' =>
                  [
                    'label' => 'Reports',
                    'group_name' => 'reports',
                    'action' => 'export',
                    'controller_action' => 'invitations_report_invitation_exportCsv',
                  ],
                  'invitations_report_invitation_exportExcel' =>
                  [
                    'label' => 'Reports',
                    'group_name' => 'reports',
                    'action' => 'export',
                    'controller_action' => 'invitations_report_invitation_exportExcel',
                  ],
                  'invitations_report_invitation_exportCustomerCsv' =>
                  [
                    'label' => 'Reports',
                    'group_name' => 'reports',
                    'action' => 'export',
                    'controller_action' => 'invitations_report_invitation_exportCustomerCsv',
                  ],
                  'invitations_report_invitation_exportCustomerExcel' =>
                  [
                    'label' => 'Reports',
                    'group_name' => 'reports',
                    'action' => 'export',
                    'controller_action' => 'invitations_report_invitation_exportCustomerExcel',
                  ],
                  'invitations_report_invitation_exportOrderCsv' =>
                  [
                    'label' => 'Reports',
                    'group_name' => 'reports',
                    'action' => 'export',
                    'controller_action' => 'invitations_report_invitation_exportOrderCsv',
                  ],
                  'invitations_report_invitation_exportOrderExcel' =>
                  [
                    'label' => 'Reports',
                    'group_name' => 'reports',
                    'action' => 'export',
                    'controller_action' => 'invitations_report_invitation_exportOrderExcel',
                  ],
                  'adminhtml_system_config_index' =>
                  [
                    'label' => 'System Configuration',
                    'group_name' => 'adminhtml_system_config',
                    'action' => 'view',
                    'controller_action' => 'adminhtml_system_config_index',
                    'post_dispatch' => 'ConfigView',
                  ],
                  'adminhtml_system_config_edit' =>
                  [
                    'label' => 'System Configuration',
                    'group_name' => 'adminhtml_system_config',
                    'action' => 'view',
                    'controller_action' => 'adminhtml_system_config_edit',
                    'post_dispatch' => 'ConfigView',
                  ],
                  'adminhtml_system_config_save' =>
                  [
                    'label' => 'System Configuration',
                    'group_name' => 'adminhtml_system_config',
                    'action' => 'save',
                    'controller_action' => 'adminhtml_system_config_save',
                    'post_dispatch' => 'ConfigView',
                    'expected_models' => 'Magento\\Framework\\App\\Config\\Value',
                    'skip_on_back' => 'adminhtml_system_config_edit',
                  ],
                  'catalog_rule_promo_catalog_edit' =>
                  [
                    'label' => 'Catalog Price Rules',
                    'group_name' => 'catalogrule',
                    'action' => 'view',
                    'controller_action' => 'catalog_rule_promo_catalog_edit',
                    'expected_models' => 'Magento\\CatalogRule\\Model\\Rule',
                  ],
                  'catalog_rule_promo_catalog_save' =>
                  [
                    'label' => 'Catalog Price Rules',
                    'group_name' => 'catalogrule',
                    'action' => 'save',
                    'controller_action' => 'catalog_rule_promo_catalog_save',
                    'expected_models' => 'Magento\\CatalogRule\\Model\\Rule',
                    'skip_on_back' => 'catalog_rule_promo_catalog_edit',
                  ],
                  'catalog_rule_promo_catalog_delete' =>
                  [
                    'label' => 'Catalog Price Rules',
                    'group_name' => 'catalogrule',
                    'action' => 'delete',
                    'controller_action' => 'catalog_rule_promo_catalog_delete',
                    'expected_models' => 'Magento\\CatalogRule\\Model\\Rule',
                  ],
                  'catalog_rule_promo_catalog_applyRules' =>
                  [
                    'label' => 'Catalog Price Rules',
                    'group_name' => 'catalogrule',
                    'action' => 'apply',
                    'controller_action' => 'catalog_rule_promo_catalog_applyRules',
                    'post_dispatch' => 'PromoCatalogApply',
                    'expected_models' => 'Magento\\CatalogRule\\Model\\Rule',
                  ],
                  'catalog_promo_quote_edit' =>
                  [
                    'label' => 'Cart Price Rules',
                    'group_name' => 'salesrule',
                    'action' => 'view',
                    'controller_action' => 'catalog_promo_quote_edit',
                    'expected_models' => 'Magento\\SalesRule\\Model\\Rule',
                  ],
                  'sales_rule_promo_quote_save' =>
                  [
                    'label' => 'Cart Price Rules',
                    'group_name' => 'salesrule',
                    'action' => 'save',
                    'controller_action' => 'sales_rule_promo_quote_save',
                    'expected_models' => 'Magento\\SalesRule\\Model\\Rule',
                    'skip_on_back' => 'catalog_promo_quote_edit',
                  ],
                  'sales_rule_promo_quote_delete' =>
                  [
                    'label' => 'Cart Price Rules',
                    'group_name' => 'salesrule',
                    'action' => 'delete',
                    'controller_action' => 'sales_rule_promo_quote_delete',
                    'expected_models' => 'Magento\\SalesRule\\Model\\Rule',
                  ],
                  'adminhtml_system_account_index' =>
                  [
                    'label' => 'Admin My Account',
                    'group_name' => 'adminhtml_system_account',
                    'action' => 'view',
                    'controller_action' => 'adminhtml_system_account_index',
                    'expected_models' => 'Magento\\User\\Model\\User',
                  ],
                  'adminhtml_system_account_save' =>
                  [
                    'label' => 'Admin My Account',
                    'group_name' => 'adminhtml_system_account',
                    'action' => 'save',
                    'controller_action' => 'adminhtml_system_account_save',
                    'expected_models' => 'Magento\\User\\Model\\User',
                  ],
                  'newsletter_queue_edit' =>
                  [
                    'label' => 'Newsletter Queue',
                    'group_name' => 'newsletter_queue',
                    'action' => 'view',
                    'controller_action' => 'newsletter_queue_edit',
                    'expected_models' => 'Magento\\Newsletter\\Model\\Queue',
                  ],
                  'newsletter_queue_save' =>
                  [
                    'label' => 'Newsletter Queue',
                    'group_name' => 'newsletter_queue',
                    'action' => 'save',
                    'controller_action' => 'newsletter_queue_save',
                    'expected_models' => 'Magento\\Newsletter\\Model\\Queue',
                  ],
                  'newsletter_template_save' =>
                  [
                    'label' => 'Newsletter Templates',
                    'group_name' => 'newsletter_templates',
                    'action' => 'save',
                    'controller_action' => 'newsletter_template_save',
                    'expected_models' => 'Magento\\Newsletter\\Model\\Template',
                  ],
                  'newsletter_template_edit' =>
                  [
                    'label' => 'Newsletter Templates',
                    'group_name' => 'newsletter_templates',
                    'action' => 'view',
                    'controller_action' => 'newsletter_template_edit',
                    'expected_models' => 'Magento\\Newsletter\\Model\\Template',
                  ],
                  'newsletter_template_delete' =>
                  [
                    'label' => 'Newsletter Templates',
                    'group_name' => 'newsletter_templates',
                    'action' => 'delete',
                    'controller_action' => 'newsletter_template_delete',
                    'expected_models' => 'Magento\\Newsletter\\Model\\Template',
                  ],
                  'newsletter_template_preview' =>
                  [
                    'label' => 'Newsletter Templates',
                    'group_name' => 'newsletter_templates',
                    'action' => 'preview',
                    'controller_action' => 'newsletter_template_preview',
                    'expected_models' => 'Magento\\Newsletter\\Model\\Template',
                  ],
                  'newsletter_subscriber_massUnsubscribe' =>
                  [
                    'label' => 'Newsletter Subscribers',
                    'group_name' => 'newsletter_subscribers',
                    'action' => 'massUpdate',
                    'controller_action' => 'newsletter_subscriber_massUnsubscribe',
                    'expected_models' => 'Magento\\Newsletter\\Model\\Subscriber',
                  ],
                  'newsletter_subscriber_massDelete' =>
                  [
                    'label' => 'Newsletter Subscribers',
                    'group_name' => 'newsletter_subscribers',
                    'action' => 'massDelete',
                    'controller_action' => 'newsletter_subscriber_massDelete',
                    'expected_models' => 'Magento\\Newsletter\\Model\\Subscriber',
                  ],
                  'newsletter_subscriber_exportCsv' =>
                  [
                    'label' => 'Newsletter Subscribers',
                    'group_name' => 'newsletter_subscribers',
                    'action' => 'export',
                    'controller_action' => 'newsletter_subscriber_exportCsv',
                    'expected_models' => 'Magento\\Newsletter\\Model\\Subscriber',
                  ],
                  'newsletter_subscriber_exportXml' =>
                  [
                    'label' => 'Newsletter Subscribers',
                    'group_name' => 'newsletter_subscribers',
                    'action' => 'export',
                    'controller_action' => 'newsletter_subscriber_exportXml',
                    'expected_models' => 'Magento\\Newsletter\\Model\\Subscriber',
                  ],
                  'sales_order_pdfdocs' =>
                  [
                    'label' => 'Sales Orders',
                    'group_name' => 'sales_orders',
                    'action' => 'export',
                    'controller_action' => 'sales_order_pdfdocs',
                    'expected_models' => 'Magento\\Sales\\Model\\Order',
                  ],
                  'sales_order_view' =>
                  [
                    'label' => 'Sales Orders',
                    'group_name' => 'sales_orders',
                    'action' => 'view',
                    'controller_action' => 'sales_order_view',
                    'expected_models' => 'Magento\\Sales\\Model\\Order',
                  ],
                  'sales_order_create_reorder' =>
                  [
                    'label' => 'Sales Orders',
                    'group_name' => 'sales_orders',
                    'action' => 'reorder',
                    'controller_action' => 'sales_order_create_reorder',
                    'expected_models' => 'Magento\\Sales\\Model\\Order',
                  ],
                  'sales_order_edit_start' =>
                  [
                    'label' => 'Sales Orders',
                    'group_name' => 'sales_orders',
                    'action' => 'edit',
                    'controller_action' => 'sales_order_edit_start',
                    'expected_models' => 'Magento\\Sales\\Model\\Order',
                  ],
                  'sales_order_massHold' =>
                  [
                    'label' => 'Sales Orders',
                    'group_name' => 'sales_orders',
                    'action' => 'massUpdate',
                    'controller_action' => 'sales_order_massHold',
                    'expected_models' =>
                    [
                      'Magento\\Sales\\Model\\Order' => [],
                      'Magento\\Sales\\Model\\Order\\Status\\History' => []
                    ],
                  ],
                  'sales_order_massUnhold' =>
                  [
                    'label' => 'Sales Orders',
                    'group_name' => 'sales_orders',
                    'action' => 'massUpdate',
                    'controller_action' => 'sales_order_massUnhold',
                    'expected_models' =>
                    [
                      'Magento\\Sales\\Model\\Order' => [],
                      'Magento\\Sales\\Model\\Order\\Status\\History' => []
                    ],
                  ],
                  'sales_order_massCancel' =>
                  [
                    'label' => 'Sales Orders',
                    'group_name' => 'sales_orders',
                    'action' => 'massUpdate',
                    'controller_action' => 'sales_order_massCancel',
                    'expected_models' =>
                    [
                      'Magento\\Sales\\Model\\Order' => [],
                      'Magento\\Sales\\Model\\Order\\Status\\History' => []
                    ],
                  ],
                  'sales_order_hold' =>
                  [
                    'label' => 'Sales Orders',
                    'group_name' => 'sales_orders',
                    'action' => 'save',
                    'controller_action' => 'sales_order_hold',
                    'expected_models' =>
                    [
                      'Magento\\Sales\\Model\\Order' => [],
                      'Magento\\Sales\\Model\\Order\\Status\\History' => []
                    ],
                  ],
                  'sales_order_unhold' =>
                  [
                    'label' => 'Sales Orders',
                    'group_name' => 'sales_orders',
                    'action' => 'save',
                    'controller_action' => 'sales_order_unhold',
                    'expected_models' =>
                    [
                      'Magento\\Sales\\Model\\Order' => [],
                      'Magento\\Sales\\Model\\Order\\Status\\History' => []
                    ],
                  ],
                  'sales_order_cancel' =>
                  [
                    'label' => 'Sales Orders',
                    'group_name' => 'sales_orders',
                    'action' => 'save',
                    'controller_action' => 'sales_order_cancel',
                    'expected_models' =>
                    [
                      'Magento\\Sales\\Model\\Order' => [],
                      'Magento\\Sales\\Model\\Order\\Status\\History' => []
                    ],
                  ],
                  'sales_order_create_save' =>
                  [
                    'label' => 'Sales Orders',
                    'group_name' => 'sales_orders',
                    'action' => 'save',
                    'controller_action' => 'sales_order_create_save',
                    'expected_models' =>
                    [
                      'Magento\\Sales\\Model\\Order' => [],
                      'Magento\\Customer\\Model\\Order' => [],
                      'Magento\\Customer\\Model\\Customer' => [],
                      'Magento\\Customer\\Model\\Address' => [],
                      'Magento\\Sales\\Model\\Order\\Status\\History' => []
                    ],
                    'skip_on_back' => 'sales_order_view',
                  ],
                  'sales_order_edit_save' =>
                  [
                    'label' => 'Sales Orders',
                    'group_name' => 'sales_orders',
                    'action' => 'save',
                    'controller_action' => 'sales_order_edit_save',
                    'expected_models' =>
                    [
                      'Magento\\Customer\\Model\\Order' => [],
                      'Magento\\Customer\\Model\\Customer' => [],
                      'Magento\\Customer\\Model\\Address' => [],
                      'Magento\\Sales\\Model\\Order\\Status\\History' => []
                    ],
                  ],
                  'sales_order_email' =>
                  [
                    'label' => 'Sales Orders',
                    'group_name' => 'sales_orders',
                    'action' => 'send',
                    'controller_action' => 'sales_order_email',
                    'expected_models' =>
                    [
                      'Magento\\Sales\\Model\\Order' => [],
                      'Magento\\Sales\\Model\\Order\\Status\\History' => []
                    ],
                    'skip_on_back' => 'sales_order_view',
                  ],
                  'sales_order_pdfinvoices' =>
                  [
                    'label' => 'Sales Orders',
                    'group_name' => 'sales_orders',
                    'action' => 'export',
                    'controller_action' => 'sales_order_pdfinvoices',
                    'expected_models' => 'Magento\\Sales\\Model\\Order',
                  ],
                  'sales_order_pdfshipments' =>
                  [
                    'label' => 'Sales Orders',
                    'group_name' => 'sales_orders',
                    'action' => 'export',
                    'controller_action' => 'sales_order_pdfshipments',
                    'expected_models' => 'Magento\\Sales\\Model\\Order',
                  ],
                  'sales_order_pdfcreditmemos' =>
                  [
                    'label' => 'Sales Orders',
                    'group_name' => 'sales_orders',
                    'action' => 'export',
                    'controller_action' => 'sales_order_pdfcreditmemos',
                    'expected_models' => 'Magento\\Sales\\Model\\Order',
                  ],
                  'sales_order_addComment' =>
                  [
                    'label' => 'Sales Order Status',
                    'group_name' => 'sales_order_status',
                    'action' => 'save',
                    'controller_action' => 'sales_order_addComment',
                    'expected_models' => 'Magento\\Sales\\Model\\Order\\Status\\History',
                  ],
                  'sales_invoice_view' =>
                  [
                    'label' => 'Sales Invoices',
                    'group_name' => 'sales_invoices',
                    'action' => 'view',
                    'controller_action' => 'sales_invoice_view',
                    'expected_models' => 'Magento\\Sales\\Model\\Order\\Invoice',
                  ],
                  'sales_order_invoice_view' =>
                  [
                    'label' => 'Sales Invoices',
                    'group_name' => 'sales_invoices',
                    'action' => 'view',
                    'controller_action' => 'sales_order_invoice_view',
                    'expected_models' => 'Magento\\Sales\\Model\\Order\\Invoice',
                  ],
                  'sales_order_invoice_save' =>
                  [
                    'label' => 'Sales Invoices',
                    'group_name' => 'sales_invoices',
                    'action' => 'save',
                    'controller_action' => 'sales_order_invoice_save',
                    'expected_models' =>
                    [
                      'Magento\\Sales\\Model\\Order\\Invoice' => [],
                      'Magento\\Sales\\Model\\Order\\Invoice\\Comment' => []
                    ],
                    'skip_on_back' => 'sales_order_view',
                  ],
                  'sales_order_invoice_addComment' =>
                  [
                    'label' => 'Sales Invoices',
                    'group_name' => 'sales_invoices',
                    'action' => 'save',
                    'controller_action' => 'sales_order_invoice_addComment',
                    'expected_models' => 'Magento\\Sales\\Model\\Order\\Invoice\\Comment',
                  ],
                  'sales_invoice_pdfinvoices' =>
                  [
                    'label' => 'Sales Invoices',
                    'group_name' => 'sales_invoices',
                    'action' => 'export',
                    'controller_action' => 'sales_invoice_pdfinvoices',
                    'expected_models' => 'Magento\\Sales\\Model\\Order\\Invoice',
                  ],
                  'sales_order_invoice_print' =>
                  [
                    'label' => 'Sales Invoices',
                    'group_name' => 'sales_invoices',
                    'action' => 'print',
                    'controller_action' => 'sales_order_invoice_print',
                    'expected_models' => 'Magento\\Sales\\Model\\Order\\Invoice',
                    'post_dispatch' => 'ActionPrint',
                  ],
                  'sales_order_invoice_email' =>
                  [
                    'label' => 'Sales Invoices',
                    'group_name' => 'sales_invoices',
                    'action' => 'email',
                    'controller_action' => 'sales_order_invoice_email',
                    'expected_models' => 'Magento\\Sales\\Model\\Order\\Invoice',
                    'skip_on_back' => 'sales_invoice_view',
                  ],
                  'sales_shipment_view' =>
                  [
                    'label' => 'Sales Shipments',
                    'group_name' => 'sales_shipments',
                    'action' => 'view',
                    'controller_action' => 'sales_shipment_view',
                    'expected_models' => 'Magento\\Sales\\Model\\Order\\Shipment',
                  ],
                  'sales_order_shipment_view' =>
                  [
                    'label' => 'Sales Shipments',
                    'group_name' => 'sales_shipments',
                    'action' => 'view',
                    'controller_action' => 'sales_order_shipment_view',
                    'expected_models' => 'Magento\\Sales\\Model\\Order\\Shipment',
                  ],
                  'sales_order_shipment_save' =>
                  [
                    'label' => 'Sales Shipments',
                    'group_name' => 'sales_shipments',
                    'action' => 'save',
                    'controller_action' => 'sales_order_shipment_save',
                    'expected_models' =>
                    [
                      'Magento\\Sales\\Model\\Order\\Shipment' => [],
                      'Magento\\Sales\\Model\\Order\\Shipment\\Comment' => []
                    ],
                    'skip_on_back' => 'sales_order_view',
                  ],
                  'sales_order_shipment_addComment' =>
                  [
                    'label' => 'Sales Shipments',
                    'group_name' => 'sales_shipments',
                    'action' => 'save',
                    'controller_action' => 'sales_order_shipment_addComment',
                    'expected_models' => 'Magento\\Sales\\Model\\Order\\Shipment\\Comment',
                  ],
                  'sales_shipment_pdfshipments' =>
                  [
                    'label' => 'Sales Shipments',
                    'group_name' => 'sales_shipments',
                    'action' => 'export',
                    'controller_action' => 'sales_shipment_pdfshipments',
                    'expected_models' => 'Magento\\Sales\\Model\\Order\\Shipment',
                  ],
                  'sales_order_shipment_print' =>
                  [
                    'label' => 'Sales Shipments',
                    'group_name' => 'sales_shipments',
                    'action' => 'print',
                    'controller_action' => 'sales_order_shipment_print',
                    'expected_models' => 'Magento\\Sales\\Model\\Order\\Shipment',
                    'post_dispatch' => 'ActionPrint',
                  ],
                  'sales_shipment_print' =>
                  [
                    'label' => 'Sales Shipments',
                    'group_name' => 'sales_shipments',
                    'action' => 'print',
                    'controller_action' => 'sales_shipment_print',
                    'post_dispatch' => 'ActionPrint',
                  ],
                  'sales_order_shipment_email' =>
                  [
                    'label' => 'Sales Shipments',
                    'group_name' => 'sales_shipments',
                    'action' => 'email',
                    'controller_action' => 'sales_order_shipment_email',
                    'expected_models' => 'Magento\\Sales\\Model\\Order\\Shipment',
                    'skip_on_back' => 'sales_shipment_view',
                  ],
                  'sales_order_shipment_addTrack' =>
                  [
                    'label' => 'Sales Shipments',
                    'group_name' => 'sales_shipments',
                    'action' => 'save',
                    'controller_action' => 'sales_order_shipment_addTrack',
                    'expected_models' => 'Magento\\Sales\\Model\\Order\\Shipment\\Track',
                  ],
                  'sales_creditmemo_view' =>
                  [
                    'label' => 'Sales Credit Memos',
                    'group_name' => 'sales_creditmemos',
                    'action' => 'view',
                    'controller_action' => 'sales_creditmemo_view',
                    'expected_models' => 'Magento\\Sales\\Model\\Order\\Creditmemo',
                  ],
                  'sales_order_creditmemo_view' =>
                  [
                    'label' => 'Sales Credit Memos',
                    'group_name' => 'sales_creditmemos',
                    'action' => 'view',
                    'controller_action' => 'sales_order_creditmemo_view',
                    'expected_models' => 'Magento\\Sales\\Model\\Order\\Creditmemo',
                  ],
                  'sales_order_creditmemo_save' =>
                  [
                    'label' => 'Sales Credit Memos',
                    'group_name' => 'sales_creditmemos',
                    'action' => 'save',
                    'controller_action' => 'sales_order_creditmemo_save',
                    'expected_models' =>
                    [
                      'Magento\\Sales\\Model\\Order\\Creditmemo' => [],
                      'Magento\\Sales\\Model\\Order\\Creditmemo\\Comment' => []
                    ],
                    'skip_on_back' => 'sales_order_view',
                  ],
                  'sales_order_creditmemo_addComment' =>
                  [
                    'label' => 'Sales Credit Memos',
                    'group_name' => 'sales_creditmemos',
                    'action' => 'save',
                    'controller_action' => 'sales_order_creditmemo_addComment',
                    'expected_models' => 'Magento\\Sales\\Model\\Order\\Creditmemo\\Comment',
                  ],
                  'sales_creditmemo_pdfcreditmemos' =>
                  [
                    'label' => 'Sales Credit Memos',
                    'group_name' => 'sales_creditmemos',
                    'action' => 'export',
                    'controller_action' => 'sales_creditmemo_pdfcreditmemos',
                    'expected_models' => 'Magento\\Sales\\Model\\Order\\Creditmemo',
                  ],
                  'sales_order_creditmemo_print' =>
                  [
                    'label' => 'Sales Credit Memos',
                    'group_name' => 'sales_creditmemos',
                    'action' => 'print',
                    'controller_action' => 'sales_order_creditmemo_print',
                    'expected_models' => 'Magento\\Sales\\Model\\Order\\Creditmemo',
                    'post_dispatch' => 'ActionPrint',
                  ],
                  'sales_order_creditmemo_email' =>
                  [
                    'label' => 'Sales Credit Memos',
                    'group_name' => 'sales_creditmemos',
                    'action' => 'email',
                    'controller_action' => 'sales_order_creditmemo_email',
                    'expected_models' => 'Magento\\Sales\\Model\\Order\\Creditmemo',
                    'skip_on_back' => 'sales_creditmemo_view',
                  ],
                  'checkout_agreement_edit' =>
                  [
                    'label' => 'Checkout Terms and Conditions',
                    'group_name' => 'sales_agreement',
                    'action' => 'view',
                    'controller_action' => 'checkout_agreement_edit',
                    'expected_models' => 'Magento\\CheckoutAgreements\\Model\\Agreement',
                  ],
                  'checkout_agreement_save' =>
                  [
                    'label' => 'Checkout Terms and Conditions',
                    'group_name' => 'sales_agreement',
                    'action' => 'save',
                    'controller_action' => 'checkout_agreement_save',
                    'expected_models' => 'Magento\\CheckoutAgreements\\Model\\Agreement',
                    'skip_on_back' => 'checkout_agreement_edit',
                  ],
                  'checkout_agreement_delete' =>
                  [
                    'label' => 'Checkout Terms and Conditions',
                    'group_name' => 'sales_agreement',
                    'action' => 'delete',
                    'controller_action' => 'checkout_agreement_delete',
                    'expected_models' => 'Magento\\CheckoutAgreements\\Model\\Agreement',
                  ],
                  'adminhtml_user_role_editrole' =>
                  [
                    'label' => 'Admin Permission Roles',
                    'group_name' => 'adminhtml_permission_roles',
                    'action' => 'view',
                    'controller_action' => 'adminhtml_user_role_editrole',
                    'expected_models' => 'Magento\\Authorization\\Model\\Role',
                  ],
                  'adminhtml_user_role_saverole' =>
                  [
                    'label' => 'Admin Permission Roles',
                    'group_name' => 'adminhtml_permission_roles',
                    'action' => 'save',
                    'controller_action' => 'adminhtml_user_role_saverole',
                    'expected_models' => 'Magento\\Authorization\\Model\\Role',
                    'skip_on_back' => 'user_role_editrole',
                  ],
                  'adminhtml_user_role_delete' =>
                  [
                    'label' => 'Admin Permission Roles',
                    'group_name' => 'adminhtml_permission_roles',
                    'action' => 'delete',
                    'controller_action' => 'adminhtml_user_role_delete',
                    'expected_models' => 'Magento\\Authorization\\Model\\Role',
                  ],
                  'adminhtml_user_edit' =>
                  [
                    'label' => 'Admin Permission Users',
                    'group_name' => 'adminhtml_permission_users',
                    'action' => 'view',
                    'controller_action' => 'adminhtml_user_edit',
                    'expected_models' => 'Magento\\User\\Model\\User',
                  ],
                  'adminhtml_user_save' =>
                  [
                    'label' => 'Admin Permission Users',
                    'group_name' => 'adminhtml_permission_users',
                    'action' => 'save',
                    'controller_action' => 'adminhtml_user_save',
                    'expected_models' => 'Magento\\User\\Model\\User',
                  ],
                  'adminhtml_user_role_delete' =>
                  [
                    'label' => 'Admin Permission Users',
                    'group_name' => 'adminhtml_permission_users',
                    'action' => 'delete',
                    'controller_action' => 'adminhtml_user_delete',
                    'expected_models' => 'Magento\\User\\Model\\User',
                  ],
                  'adminhtml_system_store_editWebsite' =>
                  [
                    'label' => 'Manage Websites',
                    'group_name' => 'adminhtml_system_websites',
                    'action' => 'view',
                    'controller_action' => 'adminhtml_system_store_editWebsite',
                    'expected_models' => 'Magento\\Store\\Model\\Website',
                  ],
                  'adminhtml_system_store_save' =>
                  [
                    'label' => 'Manage Websites',
                    'group_name' => 'adminhtml_system_websites',
                    'action' => 'save',
                    'controller_action' => 'adminhtml_system_store_save',
                    'expected_models' =>
                    [
                      'Magento\\Store\\Model\\Store' => [],
                      'Magento\\Store\\Model\\Website' => []
                    ],
                  ],
                  'adminhtml_system_store_deleteWebsitePost' =>
                  [
                    'label' => 'Manage Websites',
                    'group_name' => 'adminhtml_system_websites',
                    'action' => 'delete',
                    'controller_action' => 'adminhtml_system_store_deleteWebsitePost',
                    'expected_models' => 'Magento\\Store\\Model\\Website',
                  ],
                  'adminhtml_system_store_editStore' =>
                  [
                    'label' => 'Manage Stores',
                    'group_name' => 'adminhtml_system_store_groups',
                    'action' => 'view',
                    'controller_action' => 'adminhtml_system_store_editStore',
                    'expected_models' => 'Magento\\Store\\Model\\Store',
                  ],
                  'adminhtml_system_store_deleteStorePost' =>
                  [
                    'label' => 'Manage Stores',
                    'group_name' => 'adminhtml_system_store_groups',
                    'action' => 'delete',
                    'controller_action' => 'adminhtml_system_store_deleteStorePost',
                    'expected_models' => 'Magento\\Store\\Model\\Store',
                  ],
                  'adminhtml_system_store_deleteGroupPost' =>
                  [
                    'label' => 'Manage Store Views',
                    'group_name' => 'adminhtml_system_stores',
                    'action' => 'delete',
                    'controller_action' => 'adminhtml_system_store_deleteGroupPost',
                    'expected_models' => 'Magento\\Store\\Model\\Store',
                  ],
                  'adminhtml_system_store_editGroup' =>
                  [
                    'label' => 'Manage Store Views',
                    'group_name' => 'adminhtml_system_stores',
                    'action' => 'view',
                    'controller_action' => 'adminhtml_system_store_editGroup',
                    'expected_models' => 'Magento\\Store\\Model\\Store',
                  ],
                  'adminhtml_system_design_save' =>
                  [
                    'label' => 'Manage Design',
                    'group_name' => 'adminhtml_system_design',
                    'action' => 'save',
                    'controller_action' => 'adminhtml_system_design_save',
                    'expected_models' => 'Magento\\Theme\\Model\\Design',
                  ],
                  'adminhtml_system_design_delete' =>
                  [
                    'label' => 'Manage Design',
                    'group_name' => 'adminhtml_system_design',
                    'action' => 'delete',
                    'controller_action' => 'adminhtml_system_design_delete',
                    'expected_models' => 'Magento\\Theme\\Model\\Design',
                  ],
                  'adminhtml_system_currency_saveRates' =>
                  [
                    'label' => 'Manage Currency Rates',
                    'group_name' => 'adminhtml_system_currency',
                    'action' => 'save',
                    'controller_action' => 'adminhtml_system_currency_saveRates',
                    'post_dispatch' => 'SystemCurrencySave',
                  ],
                  'adminhtml_email_template_save' =>
                  [
                    'label' => 'Transactional Emails',
                    'group_name' => 'adminhtml_email_template',
                    'action' => 'save',
                    'controller_action' => 'adminhtml_email_template_save',
                    'expected_models' => 'Magento\\Email\\Model\\Template',
                  ],
                  'adminhtml_email_template_edit' =>
                  [
                    'label' => 'Transactional Emails',
                    'group_name' => 'adminhtml_email_template',
                    'action' => 'edit',
                    'controller_action' => 'adminhtml_email_template_edit',
                    'expected_models' => 'Magento\\Email\\Model\\Template',
                  ],
                  'adminhtml_email_template_delete' =>
                  [
                    'label' => 'Transactional Emails',
                    'group_name' => 'adminhtml_email_template',
                    'action' => 'delete',
                    'controller_action' => 'adminhtml_email_template_delete',
                    'expected_models' => 'Magento\\Email\\Model\\Template',
                  ],
                  'adminhtml_system_variable_save' =>
                  [
                    'label' => 'Custom Variables',
                    'group_name' => 'adminhtml_system_variable',
                    'action' => 'save',
                    'controller_action' => 'adminhtml_system_variable_save',
                    'expected_models' => 'Magento\\Variable\\Model\\Variable',
                    'skip_on_back' => 'adminhtml_system_variable_edit',
                  ],
                  'adminhtml_system_variable_edit' =>
                  [
                    'label' => 'Custom Variables',
                    'group_name' => 'adminhtml_system_variable',
                    'action' => 'view',
                    'controller_action' => 'adminhtml_system_variable_edit',
                    'expected_models' => 'Magento\\Variable\\Model\\Variable',
                  ],
                  'adminhtml_system_variable_delete' =>
                  [
                    'label' => 'Custom Variables',
                    'group_name' => 'adminhtml_system_variable',
                    'action' => 'delete',
                    'controller_action' => 'adminhtml_system_variable_delete',
                    'expected_models' => 'Magento\\Variable\\Model\\Variable',
                  ],
                  'backup_index_create' =>
                  [
                    'label' => 'System Backups',
                    'group_name' => 'backups',
                    'action' => 'create',
                    'controller_action' => 'backup_index_create'
                  ],
                  'backup_index_massDelete' =>
                  [
                    'label' => 'System Backups',
                    'group_name' => 'backups',
                    'action' => 'massDelete',
                    'controller_action' => 'backup_index_massDelete'
                  ],
                  'backup_index_rollback' =>
                  [
                    'label' => 'System Backups',
                    'group_name' => 'backups',
                    'action' => 'rollback',
                    'controller_action' => 'backup_index_rollback'
                  ],
                  'tax_tax_ajaxDelete' =>
                  [
                    'label' => 'Customer Tax Classes',
                    'group_name' => 'tax_customer_tax_classes',
                    'action' => 'delete',
                    'controller_action' => 'tax_tax_ajaxDelete',
                    'post_dispatch' => 'TaxClassDelete',
                    'expected_models' => 'Magento\\Tax\\Model\\ClassModel',
                  ],
                  'tax_tax_ajaxSave' =>
                  [
                    'label' => 'Customer Tax Classes',
                    'group_name' => 'tax_customer_tax_classes',
                    'action' => 'save',
                    'controller_action' => 'tax_tax_ajaxSave',
                    'post_dispatch' => 'TaxClassSave',
                    'expected_models' => 'Magento\\Tax\\Model\\ClassModel',
                  ],
                  'tax_rule_edit' =>
                  [
                    'label' => 'Tax Rules',
                    'group_name' => 'tax_rules',
                    'action' => 'view',
                    'controller_action' => 'tax_rule_edit',
                    'expected_models' => 'Magento\\Tax\\Model\\Calculation\\Rule',
                  ],
                  'tax_rule_save' =>
                  [
                    'label' => 'Tax Rules',
                    'group_name' => 'tax_rules',
                    'action' => 'save',
                    'controller_action' => 'tax_rule_save',
                    'expected_models' => 'Magento\\Tax\\Model\\Calculation\\Rule',
                    'skip_on_back' => 'tax_rule_edit',
                  ],
                  'tax_rule_delete' =>
                  [
                    'label' => 'Tax Rules',
                    'group_name' => 'tax_rules',
                    'action' => 'delete',
                    'controller_action' => 'tax_rule_delete',
                    'expected_models' => 'Magento\\Tax\\Model\\Calculation\\Rule',
                  ],
                  'tax_rate_edit' =>
                  [
                    'label' => 'Tax Rates',
                    'group_name' => 'tax_rates',
                    'action' => 'view',
                    'controller_action' => 'tax_rate_edit',
                    'expected_models' => 'Magento\\Tax\\Model\\Calculation\\Rate',
                  ],
                  'tax_rate_save' =>
                  [
                    'label' => 'Tax Rates',
                    'group_name' => 'tax_rates',
                    'action' => 'save',
                    'controller_action' => 'tax_rate_save',
                    'expected_models' => 'Magento\\Tax\\Model\\Calculation\\Rate',
                  ],
                  'tax_rate_importPost' =>
                  [
                    'label' => 'Tax Rates',
                    'group_name' => 'tax_rates',
                    'action' => 'import',
                    'controller_action' => 'tax_rate_importPost',
                    'post_dispatch' => 'TaxRatesImport',
                    'expected_models' => 'Magento\\Tax\\Model\\Calculation\\Rate',
                  ],
                  'tax_rate_exportPost' =>
                  [
                    'label' => 'Tax Rates',
                    'group_name' => 'tax_rates',
                    'action' => 'export',
                    'controller_action' => 'tax_rate_exportPost',
                    'expected_models' => 'Magento\\Tax\\Model\\Calculation\\Rate',
                  ],
                  'tax_rate_delete' =>
                  [
                    'label' => 'Tax Rates',
                    'group_name' => 'tax_rates',
                    'action' => 'delete',
                    'controller_action' => 'tax_rate_delete',
                    'expected_models' => 'Magento\\Tax\\Model\\Calculation\\Rate',
                  ],
                  'adminhtml_sitemap_edit' =>
                  [
                    'label' => 'XML Sitemap',
                    'group_name' => 'google_sitemap',
                    'action' => 'view',
                    'controller_action' => 'adminhtml_sitemap_edit',
                    'expected_models' => 'Magento\\Sitemap\\Model\\Sitemap',
                  ],
                  'adminhtml_sitemap_save' =>
                  [
                    'label' => 'XML Sitemap',
                    'group_name' => 'google_sitemap',
                    'action' => 'save',
                    'controller_action' => 'adminhtml_sitemap_save',
                    'expected_models' => 'Magento\\Sitemap\\Model\\Sitemap',
                  ],
                  'adminhtml_sitemap_delete' =>
                  [
                    'label' => 'XML Sitemap',
                    'group_name' => 'google_sitemap',
                    'action' => 'delete',
                    'controller_action' => 'adminhtml_sitemap_delete',
                    'expected_models' => 'Magento\\Sitemap\\Model\\Sitemap',
                  ],
                  'adminhtml_sitemap_generate' =>
                  [
                    'label' => 'XML Sitemap',
                    'group_name' => 'google_sitemap',
                    'action' => 'save',
                    'controller_action' => 'adminhtml_sitemap_generate',
                    'expected_models' => 'Magento\\Sitemap\\Model\\Sitemap',
                  ],
                  'adminhtml_widget_instance_edit' =>
                  [
                    'label' => 'Widget',
                    'group_name' => 'widget_instance',
                    'action' => 'view',
                    'controller_action' => 'adminhtml_widget_instance_edit',
                    'expected_models' => 'Magento\\Widget\\Model\\Widget\\Instance',
                  ],
                  'adminhtml_widget_instance_save' =>
                  [
                    'label' => 'Widget',
                    'group_name' => 'widget_instance',
                    'action' => 'save',
                    'controller_action' => 'adminhtml_widget_instance_save',
                    'expected_models' => 'Magento\\Widget\\Model\\Widget\\Instance',
                    'skip_on_back' => 'adminhtml_widget_instance_edit',
                  ],
                  'adminhtml_widget_instance_delete' =>
                  [
                    'label' => 'Widget',
                    'group_name' => 'widget_instance',
                    'action' => 'delete',
                    'controller_action' => 'adminhtml_widget_instance_delete',
                    'expected_models' => 'Magento\\Widget\\Model\\Widget\\Instance',
                  ],
                  'adminhtml_cache_massEnable' =>
                  [
                    'label' => 'Cache Management',
                    'group_name' => 'cache_management',
                    'action' => 'save',
                    'controller_action' => 'adminhtml_cache_massEnable',
                    'post_dispatch' => 'SaveCacheSettings',
                  ],
                  'adminhtml_cache_massDisable' =>
                  [
                    'label' => 'Cache Management',
                    'group_name' => 'cache_management',
                    'action' => 'save',
                    'controller_action' => 'adminhtml_cache_massDisable',
                    'post_dispatch' => 'SaveCacheSettings',
                  ],
                  'adminhtml_cache_massRefresh' =>
                  [
                    'label' => 'Cache Management',
                    'group_name' => 'cache_management',
                    'action' => 'save',
                    'controller_action' => 'adminhtml_cache_massRefresh',
                    'post_dispatch' => 'SaveCacheSettings',
                  ],
                  'adminhtml_cache_cleanImages' =>
                  [
                    'label' => 'Cache Management',
                    'group_name' => 'cache_management',
                    'action' => 'clean',
                    'controller_action' => 'adminhtml_cache_cleanImages',
                  ],
                  'adminhtml_cache_cleanMedia' =>
                  [
                    'label' => 'Cache Management',
                    'group_name' => 'cache_management',
                    'action' => 'clean',
                    'controller_action' => 'adminhtml_cache_cleanMedia',
                  ],
                  'adminhtml_cache_cleanStaticFiles' =>
                  [
                    'label' => 'Cache Management',
                    'group_name' => 'cache_management',
                    'action' => 'clean',
                    'controller_action' => 'adminhtml_cache_cleanStaticFiles',
                  ],
                  'adminhtml_cache_flushSystem' =>
                  [
                    'label' => 'Cache Management',
                    'group_name' => 'cache_management',
                    'action' => 'flush',
                    'controller_action' => 'adminhtml_cache_flushSystem',
                  ],
                  'adminhtml_cache_flushAll' =>
                  [
                    'label' => 'Cache Management',
                    'group_name' => 'cache_management',
                    'action' => 'flush',
                    'controller_action' => 'adminhtml_cache_flushAll',
                  ],
                  'adminhtml_paypal_reports_details' =>
                  [
                    'label' => 'PayPal Settlement Reports',
                    'group_name' => 'paypal_settlement_reports',
                    'action' => 'view',
                    'controller_action' => 'adminhtml_paypal_reports_details',
                    'expected_models' => 'Magento\\Paypal\\Model\\Report\\Settlement\\Row',
                  ],
                  'adminhtml_paypal_reports_fetch' =>
                  [
                    'label' => 'PayPal Settlement Reports',
                    'group_name' => 'paypal_settlement_reports',
                    'action' => 'fetch',
                    'controller_action' => 'adminhtml_paypal_reports_fetch',
                    'expected_models' => 'Magento\\Paypal\\Model\\Report\\Settlement',
                  ]
                ];
    }
}
