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
namespace Bss\AdminActionLog\Convert;

class FineDiffReplaceOp extends \Bss\AdminActionLog\Convert\FineDiffOp
{
    /**
     * FineDiffReplaceOp constructor.
     * @param $fromLen
     * @param $text
     */
    public function __construct($fromLen, $text)
    {
        $this->fromLen = $fromLen;
        $this->text = $text;
    }

    /**
     * @return mixed
     */
    public function getFromLen()
    {
        return $this->fromLen;
    }

    /**
     * @return int
     */
    public function getToLen()
    {
        return strlen($this->text);
    }

    /**
     * @return mixed
     */
    public function getText()
    {
        return $this->text;
    }

    /**
     * @return string
     */
    public function getOpcode() {

        if ( $this->fromLen === 1 ) {
            $del_opcode = 'd';
        } else {
            $del_opcode = "d{$this->fromLen}";
        }

        $to_len = strlen($this->text);
        if ( $to_len === 1 ) {
            return "{$del_opcode}i:{$this->text}";
        }
        
        return "{$del_opcode}i{$to_len}:{$this->text}";
    }
}