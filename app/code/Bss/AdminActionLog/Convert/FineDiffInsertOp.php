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

class FineDiffInsertOp extends \Bss\AdminActionLog\Convert\FineDiffOp
{
    /**
     * FineDiffInsertOp constructor.
     * @param $text
     */
    public function __construct($text)
    {
        $this->text = $text;
    }

    /**
     * @return int
     */
    public function getFromLen()
    {
        return 0;
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
        $to_len = strlen($this->text);
        if ( $to_len === 1 ) {
            return "i:{$this->text}";
            }
        return "i{$to_len}:{$this->text}";
        }
    }