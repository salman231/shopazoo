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
namespace Bss\AdminActionLog\Controller\Adminhtml\Config;

class Revert extends \Magento\Backend\App\Action
{
    protected $resultPageFactory;

    protected $revertConfig;

    /**
     * Revert constructor.
     * @param \Magento\Backend\App\Action\Context $context
     * @param \Bss\AdminActionLog\Model\ResourceModel\RevertConfig $revertConfig
     * @param \Magento\Framework\View\Result\PageFactory $resultPageFactory
     */
    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        \Bss\AdminActionLog\Model\ResourceModel\RevertConfig $revertConfig,
        \Magento\Framework\View\Result\PageFactory $resultPageFactory
    ) {
        parent::__construct($context);
        $this->resultPageFactory = $resultPageFactory;
        $this->revertConfig = $revertConfig;
    }

    /**
     * @return $this
     */
    public function execute()
    {
        $id = $this->getRequest()->getParam('id');

        if ($id) {
            $this->revertConfig->revertConfig($id);
            $this->messageManager->addSuccessMessage(__('Revert success.'));
        } else {
            $this->messageManager->addError(__('This log no exists.'));
        }

        $this->revertConfig->revertConfig($id);

        $resultRedirect = $this->resultRedirectFactory->create();
        return $resultRedirect->setPath('bssadmin/actionlog/detail',['id' =>$id]);
    }

}
