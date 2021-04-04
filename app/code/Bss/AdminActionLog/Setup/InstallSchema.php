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
namespace Bss\AdminActionLog\Setup;

use Magento\Framework\Setup\InstallSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;

class InstallSchema implements InstallSchemaInterface
{
    /**
     * @param SchemaSetupInterface $setup
     * @param ModuleContextInterface $context
     */
    public function install(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
        $installer = $setup;
        $installer->startSetup();

        $table = $installer->getConnection()
            ->newTable($installer->getTable('bss_admin_action_log'))
            ->addColumn('id', \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER, null, [
                'identity'  => true,
                'unsigned'  => true,
                'nullable'  => false,
                'primary'   => true,
                ], 'Log Id')
            ->addColumn(
                'created_at',
                \Magento\Framework\DB\Ddl\Table::TYPE_TIMESTAMP,
                null,
                ['nullable' => false, 'default' => \Magento\Framework\DB\Ddl\Table::TIMESTAMP_INIT],
                'Created At'
            )
            ->addColumn('group_action', \Magento\Framework\DB\Ddl\Table::TYPE_TEXT, 255, [
                'nullable'  => false,
                'default'   => null,
                ], 'Group Action')
            ->addColumn('info', \Magento\Framework\DB\Ddl\Table::TYPE_TEXT, '64k', [
                'nullable'  => false,
                'default'   => null,
                ], 'Info Item')
            ->addColumn('action_type', \Magento\Framework\DB\Ddl\Table::TYPE_TEXT, 255, [
                'nullable'  => false,
                'default'   => null,
                ], 'Action Type')
            ->addColumn('action_name', \Magento\Framework\DB\Ddl\Table::TYPE_TEXT, 255, [
                'nullable'  => false,
                'default'   => null,
                ], 'Action Name ')
            ->addColumn('ip_address', \Magento\Framework\DB\Ddl\Table::TYPE_TEXT, 255, [
                'nullable'  => false,
                'default'   => null,
                ], 'Ip Address')
            ->addColumn('user_id', \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER, null, [
                'nullable'  => false,
                ], 'User Id')
            ->addColumn('user_name', \Magento\Framework\DB\Ddl\Table::TYPE_TEXT, 255, [
                'nullable'  => false,
                'default'   => null,
                ], 'User Name')
            ->addColumn('result', \Magento\Framework\DB\Ddl\Table::TYPE_BOOLEAN, null, [
                'nullable'  => false,
                ], 'Result Action')
            ->addColumn('revert', \Magento\Framework\DB\Ddl\Table::TYPE_BOOLEAN, null, [
                'nullable'  => false,
                'default'   => 0,
                ], 'Revert config')
            ->addColumn('store_id', \Magento\Framework\DB\Ddl\Table::TYPE_SMALLINT, 9, [
                'nullable'  => false,
                ], 'Action Name ')
            ->setComment('Action Log');
        $installer->getConnection()->createTable($table);

        $table = $installer->getConnection()
            ->newTable($installer->getTable('bss_admin_action_detail_log'))
            ->addColumn('id', \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER, null, [
                'identity'  => true,
                'unsigned'  => true,
                'nullable'  => false,
                'primary'   => true,
                ], 'Id')
            ->addColumn('log_id', \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER, null, [
                'unsigned'  => true,
                'nullable'  => false,
                ], 'Log Id')
            ->addColumn('source_data', \Magento\Framework\DB\Ddl\Table::TYPE_TEXT, 255, [
                'nullable'  => false,
                'default'   => null,
                ], 'Lable')
            ->addColumn('old_value', \Magento\Framework\DB\Ddl\Table::TYPE_TEXT, '64k', [
                'nullable'  => false,
                ], 'Old Val')
            ->addColumn('new_value', \Magento\Framework\DB\Ddl\Table::TYPE_TEXT, '64k', [
                'nullable'  => false,
                ], 'New Value')
            ->addForeignKey(
                $installer->getFkName(
                    'admin_action_log_value',
                    'log_id',
                    'admin_action_log',
                    'id'
                ),
                'log_id',
                $installer->getTable('bss_admin_action_log'),
                'id',
                \Magento\Framework\DB\Ddl\Table::ACTION_CASCADE
            )
            ->setComment('Action Log Details');
        $installer->getConnection()->createTable($table);

        $table = $installer->getConnection()
            ->newTable($installer->getTable('bss_admin_login_log'))
            ->addColumn('id', \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER, null, [
                'identity'  => true,
                'unsigned'  => true,
                'nullable'  => false,
                'primary'   => true,
                ], 'Id')
            ->addColumn(
                'created_at',
                \Magento\Framework\DB\Ddl\Table::TYPE_TIMESTAMP,
                null,
                ['nullable' => false, 'default' => \Magento\Framework\DB\Ddl\Table::TIMESTAMP_INIT],
                'Date time'
            )
            ->addColumn('user_name', \Magento\Framework\DB\Ddl\Table::TYPE_TEXT, 255, [
                'nullable'  => false,
                'default'   => null,
                ], 'User name')
            ->addColumn('ip_address', \Magento\Framework\DB\Ddl\Table::TYPE_TEXT, 255, [
                'nullable'  => false,
                'default'   => null,
                ], 'Ip Address')
            ->addColumn('browser', \Magento\Framework\DB\Ddl\Table::TYPE_TEXT, '64k', [
                'nullable'  => false,
                ], 'Browser')
            ->addColumn('status', \Magento\Framework\DB\Ddl\Table::TYPE_SMALLINT, 6, [
                'nullable'  => false,
                ], 'Status')
            ->setComment('Login Log');
        $installer->getConnection()->createTable($table);

        $table = $installer->getConnection()
            ->newTable($installer->getTable('bss_admin_active_log'))
            ->addColumn('id', \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER, null, [
                'identity'  => true,
                'unsigned'  => true,
                'nullable'  => false,
                'primary'   => true,
                ], 'Id')
            ->addColumn('created_at', \Magento\Framework\DB\Ddl\Table::TYPE_DATETIME, null,
                [], 'Created at')
            ->addColumn('ip_address', \Magento\Framework\DB\Ddl\Table::TYPE_TEXT, 255, [
                'nullable'  => false,
                'default'   => null,
                ], 'Ip Address')
            ->addColumn('session_id', \Magento\Framework\DB\Ddl\Table::TYPE_TEXT, 255, [
                'nullable'  => false,
                'default'   => null,
                ], 'Session Id')
            ->addColumn('user_name', \Magento\Framework\DB\Ddl\Table::TYPE_TEXT, 255, [
                'nullable'  => false,
                'default'   => null,
                ], 'User name')
            ->addColumn('name', \Magento\Framework\DB\Ddl\Table::TYPE_TEXT, 255, [
                'nullable'  => false,
                'default'   => null,
                ], 'Name')
            ->addColumn('recent_activity',\Magento\Framework\DB\Ddl\Table::TYPE_DATETIME, null,
                [],'Recent Activity')
            ->addIndex($installer->getIdxName('bss_admin_action_log', ['session_id']), ['session_id'])
            ->setComment('Active Sessions');

        $installer->getConnection()->createTable($table);

        $table = $installer->getConnection()
            ->newTable($installer->getTable('bss_admin_visit_log'))
            ->addColumn('id', \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER, null, [
                'identity'  => true,
                'unsigned'  => true,
                'nullable'  => false,
                'primary'   => true,
                ], 'Id')
            ->addColumn('ip_address', \Magento\Framework\DB\Ddl\Table::TYPE_TEXT, 255, [
                'nullable'  => false,
                'default'   => null,
                ], 'Ip Address')
            ->addColumn('user_name', \Magento\Framework\DB\Ddl\Table::TYPE_TEXT, 255, [
                'nullable'  => false,
                'default'   => null,
                ], 'User name')
            ->addColumn('name', \Magento\Framework\DB\Ddl\Table::TYPE_TEXT, 255, [
                'nullable'  => false,
                'default'   => null,
                ], 'Name')
            ->addColumn('session_id', \Magento\Framework\DB\Ddl\Table::TYPE_TEXT, 255, [
                'nullable'  => false,
                'default'   => null,
                ], 'Session Id')
            ->addColumn('session_start', \Magento\Framework\DB\Ddl\Table::TYPE_DATETIME, null,
                [],'Session Start')
            ->addColumn('session_end', \Magento\Framework\DB\Ddl\Table::TYPE_DATETIME, null,
                [], 'Session End')
            ->setComment('Visit Page');
        $installer->getConnection()->createTable($table);

        $table = $installer->getConnection()
            ->newTable($installer->getTable('bss_admin_visit_detail_log'))
            ->addColumn('id', \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER, null, [
                'identity'  => true,
                'unsigned'  => true,
                'nullable'  => false,
                'primary'   => true,
                ], 'Id')
            ->addColumn('session_id', \Magento\Framework\DB\Ddl\Table::TYPE_TEXT, 255, [
                'nullable'  => false,
                'default'   => null,
                ], 'Session Id')
            ->addColumn('page_name', \Magento\Framework\DB\Ddl\Table::TYPE_TEXT, 255, [
                'nullable'  => false,
                'default'   => null,
                ], 'Page Name')
            ->addColumn('page_url', \Magento\Framework\DB\Ddl\Table::TYPE_TEXT, 255, [
                'nullable'  => false,
                'default'   => null,
                ], 'Url pf Page')
            ->addColumn('stay_duration', \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER, null, [
                'nullable'  => false,
                ], 'Stay Duration')
            ->setComment('Visit Detail');
        $installer->getConnection()->createTable($table);
        $installer->endSetup();
    }
}
