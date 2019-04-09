<?php
/**
 * Created by PhpStorm.
 * User: phupham
 * Date: 15/03/2019
 * Time: 09:10
 */

namespace M2\Staff\Controller\Adminhtml\Index;

use M2\Staff\Model\StaffFactory;
use Magento\Backend\App\Action;
use Magento\Framework\Registry;
use Magento\Framework\View\Result\PageFactory;


class Edit extends Action
{
    const ADMIN_RESOURCE = "M2_Staff::staff_save";
    protected $_pageFactory;
    protected $_staffModel;
    protected $_coreRegistry;

    public function __construct(
        Action\Context $context,
        PageFactory $pageFactory,
        StaffFactory $staffFactory,
        Registry $coreRegistry
    )
    {
        $this->_coreRegistry = $coreRegistry;
        $this->_staffModel = $staffFactory;
        $this->_pageFactory = $pageFactory;
        parent::__construct($context);
    }

    public function execute()
    {
        $staffId = $this->getRequest()->getParam('id');
        $model = $this->_staffModel->create();
        if ($staffId) {
            $title = "Edit staff";
            $model->load($staffId);
            if (!$model->getId()){
                $this->messageManager->addError("This staff no longer exist");
                return $this->_redirect('*/*/');
            }
        } else {
            $title = "Add new staff";
        }
        $data = $this->_getSession()->getFormData(true);
        if (!empty($data)){
            $model->setData($data);
        }
        $this->_coreRegistry->register("staff", $model);
        $resultPage = $this->_pageFactory->create();
        $resultPage->getConfig()->getTitle()->prepend(__($title));
        return $resultPage;
    }
}