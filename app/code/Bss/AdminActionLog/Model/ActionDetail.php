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
namespace Bss\AdminActionLog\Model;
 
use Magento\Framework\Model\AbstractModel;
 
class ActionDetail extends AbstractModel
{	
	protected $_difference = null;

    /**
     *
     */
    protected function _construct()
    {
        $this->_init('Bss\AdminActionLog\Model\ResourceModel\ActionDetail');
    }

    /**
     * @return bool
     */
    public function hasDifference()
    {   
        $difference = $this->_calculateDifference();
        return !empty($difference);
    }

    /**
     * @return array|null
     */
    protected function _calculateDifference()
    {
        if ($this->_difference === null) {
            $updatedParams = $newParams = $sameParams = $difference = [];
            $_oldData = $oldData = $this->getOldValue();
            $_newData = $newData = $this->getNewValue();

            if (!is_array($oldData)) {
                $oldData = [];
            }
            if (!is_array($newData)) {
                $newData = [];
            }

            if (!$oldData && $newData) {
                $_oldData = ['_create' => true];
                $difference = $newData;
            } elseif ($oldData && !$newData) {
                $_newData = ['_delete' => true];
                $difference = $oldData;
            } elseif ($oldData && $newData) {
                $newParams = array_diff_key($newData, $oldData);
                $sameParams = array_intersect_key($oldData, $newData);
                foreach ($sameParams as $key => $value) {
                    if ($oldData[$key] != $newData[$key]) {
                        $updatedParams[$key] = $newData[$key];
                    }
                }
                $_oldData = array_intersect_key($oldData, $updatedParams);
                $difference = $_newData = array_merge($updatedParams, $newParams);
                if ($difference && !$updatedParams) {
                    $_oldData = ['_no_change' => true];
                }
            }

            $this->setOldValue($_oldData);
            $this->setNewValue($_newData);

            $this->_difference = $difference;
        }
        return $this->_difference;
    }

    /**
     *
     */
    public function cleanupData()
    {
        $this->setOldValue($this->_cleanupData($this->getOldValue()));
        $this->setNewValue($this->_cleanupData($this->getNewValue()));
    }

    /**
     * @param $data
     * @return array
     */
    protected function _cleanupData($data)
    {
        if (!$data || !is_array($data)) {
            return [];
        }
        $skipFields = ['created_at','updated_at','new_password','password','password_hash','password_confirmation'];
        $clearedData = [];

        foreach ($data as $key => $value) {
            $value = $this->_covertValue($key, $value);
            if (!in_array(
                $key,
                $skipFields
            ) && !is_array(
                $value
            ) && !is_object(
                $value
            )
            ) {
                $clearedData[$key] = $value;
            }
        }
        return $clearedData;
    }

    /**
     * @param $key
     * @param $value
     * @return string
     */
    private function _covertValue($key, $value){
        if ($key == 'category_ids'
            || $key == 'website_ids') {
            sort($value);
            return implode(',', $value);
        }
        return $value;
    }
}
