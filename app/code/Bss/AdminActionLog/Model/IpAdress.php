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

class IpAdress
{
    protected $request;

    /**
     * IpAdress constructor.
     * @param \Magento\Framework\App\RequestInterface $request
     */
    public function __construct(\Magento\Framework\App\RequestInterface $request) {
        $this->request = $request;
    }

    /**
     * @return string
     */
    public function getIpAdress()
    {
        $ipaddress = '';
        if ($this->request->getServer('HTTP_CLIENT_IP')) {
            $ipaddress = $this->request->getServer('HTTP_CLIENT_IP');
        } else if ($this->request->getServer('HTTP_X_FORWARDED_FOR')) {
            $ipaddress = $this->request->getServer('HTTP_X_FORWARDED_FOR');
        } else if ($this->request->getServer('HTTP_X_FORWARDED')) {
            $ipaddress = $this->request->getServer('HTTP_X_FORWARDED');
        } else if ($this->request->getServer('HTTP_FORWARDED_FOR')) {
            $ipaddress = $this->request->getServer('HTTP_FORWARDED_FOR');
        } else if ($this->request->getServer('HTTP_FORWARDED')) {
            $ipaddress = $this->request->getServer('HTTP_FORWARDED');
        } else if ($this->request->getServer('REMOTE_ADDR')) {
            $ipaddress = $this->request->getServer('REMOTE_ADDR');
        } else {
            $ipaddress = 'UNKNOWN';
        }

        return $ipaddress;
    }
}
