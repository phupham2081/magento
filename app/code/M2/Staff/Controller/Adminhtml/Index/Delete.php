<?php
/**
 * Created by PhpStorm.
 * User: phupham
 * Date: 18/03/2019
 * Time: 15:19
 */

namespace M2\Staff\Controller\Adminhtml\Index;


use Magento\Backend\App\Action;

class Delete extends Action
{
    const ADMIN_RESOURCE = "M2_Staff::staff_delete";

    public function execute()
    {
        $staffId = $this->getRequest()->getParam("id");
        $imageHelper = $this->_objectManager->get("M2\Staff\Helper\Image");
        if ($staffId) {
            $staffModel = $this->_objectManager->get("M2\Staff\Model\Staff");
            $staffModel->load($staffId);
            if ($staffModel->getId()){
                $imageHelper->removeImage($staffModel->getAvatar());
                $staffModel->delete();
                $this->messageManager->addSuccess(__("This staff has been deleted"));
                return $this->_redirect("*/*/");
            } else {
                $this->messageManager->addError(__("This staff no longer exist"));
                return $this->_redirect("*/*/");
            }

        } else {
            $this->messageManager->addError(__("We can not find any id to delete"));
            return $this->_redirect("*/*/");
        }
    }
}