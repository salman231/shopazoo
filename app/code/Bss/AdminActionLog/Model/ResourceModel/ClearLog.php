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

class ClearLog
{
	protected $helper;

    protected $resources;

    /**
     * ClearLog constructor.
     * @param \Bss\AdminActionLog\Helper\Data $helper
     * @param \Magento\Framework\App\ResourceConnection $resources
     */
    public function __construct(
    	\Bss\AdminActionLog\Helper\Data $helper,
        \Magento\Framework\App\ResourceConnection $resources
    ) {
        $this->helper = $helper;
        $this->resources = $resources;
    }

    /**
     *
     */
    public function Delete()
    {
    	$connection= $this->resources->getConnection();
        $days = $this->helper->getTimeClearLog();
        $days = 0;
        $currentDate = time() - (3600 * 24 * (int)$days);
        $currentDate = date('Y-m-d', $currentDate);

        $actionlog = $this->resources->getTableName('bss_admin_action_log');
        $loginlog = $this->resources->getTableName('bss_admin_login_log');
        $visitlog = $this->resources->getTableName('bss_admin_visit_log');
        $visitlogdetail = $this->resources->getTableName('bss_admin_visit_detail_log');
        $condition = ['created_at < ?' => $currentDate];
        $connection->delete($actionlog, $condition);
        $connection->delete($loginlog, $condition);
        $sql = $connection->select()
                ->from(['vs'=> $visitlog],['id'])
                ->joinLeft(
                        ['vsd'=>$visitlogdetail],
                        'vs.session_id = vsd.session_id',
                        ['vsdid'=>'vsd.id']
                        )
                ->where('vs.session_start < ?', $currentDate);

        $result = $connection->query($sql);

        $visitId = [];
        $visitDId = [];
        while ($row = $result->fetch()) {
            $data[] = $row['id'];
            $visitId[] = $row['id'];
            $visitDId[] = $row['vsdid'];
        }
        if (!empty($visitId) && !empty($visitDId)) {
            array_unique($visitId);
            array_unique($visitDId);
            $condition_visit = ['id IN(?)' => $visitId];
            $condition_visitd = ['id IN(?)' => $visitDId];
            $connection->delete($visitlog, $condition_visit);
            $connection->delete($visitlogdetail, $condition_visitd);
        }
    }

    /**
     * @param $session_id
     */
    public function deleteBySessionId($session_id)
    {
        $connection= $this->resources->getConnection();
        $active = $this->resources->getTableName('bss_admin_active_log');
        $condition = ['session_id = ?' => $session_id];
        $connection->delete($active, $condition);
    }
}
