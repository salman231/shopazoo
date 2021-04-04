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
namespace Bss\AdminActionLog\Model\ResourceModel;

class RevertConfig
{
    protected $actionDetail;

    protected $resources;

    /**
     * RevertConfig constructor.
     * @param \Bss\AdminActionLog\Model\ActionDetail $actionDetail
     * @param \Magento\Framework\App\ResourceConnection $resources
     */
    public function __construct(
        \Bss\AdminActionLog\Model\ActionDetail $actionDetail,
        \Magento\Framework\App\ResourceConnection $resources
    ) {
        $this->actionDetail = $actionDetail;
        $this->resources = $resources;
    }

    /**
     * @param $log_id
     */
    public function revertConfig($log_id)
    {
        $connection= $this->resources->getConnection();
        $table = $this->resources->getTableName('core_config_data');
        
        $collecttion = $this->actionDetail->getCollection()
                                ->addFieldToFilter('log_id', $log_id);
        if ($collecttion->getSize() > 0) {
            foreach ($collecttion as $log_detail) {
                $new_value = json_decode($log_detail->getNewValue(), true);
                $old_values = json_decode($log_detail->getOldValue(), true);
                foreach ($old_values as $key => $old_value) {
                    $source = explode('_scope_', $key);
                    if (!empty($source)) {
                        $path = $source[0];

                        $_scope = explode('_', $source[1]);
                        $where = [];
                        $data = ['value' => $old_value];
                        $where['scope = ?'] = $_scope[0];
                        $where['scope_id = ?'] = $_scope[1];
                        $where['path = ?'] = $path;
                        $connection->update($table, $data, $where);
                    }
                }
            }

            $log = $this->resources->getTableName('bss_admin_action_log');
            $data_log = ['revert' => 1];
            $where_log['id = ?'] = $log_id;
            $connection->update($log, $data_log, $where_log);
        }
    }
}
