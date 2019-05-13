<?php
/**
 * Created by PhpStorm.
 * User: phupham
 * Date: 16/03/2019
 * Time: 15:20
 */

namespace M2\Staff\Controller\Adminhtml\Index;


use M2\Staff\Model\StaffFactory;
use Magento\Backend\App\Action;
use Psr\Log\LoggerInterface;

class Save extends Action
{
    const ADMIN_RESOURCE = "M2_Staff::staff_save";
    protected $_staffModel;
    protected $_logger;

    public function __construct(Action\Context $context,StaffFactory $staffModel,LoggerInterface $logger)
    {
        $this->_logger = $logger;
        $this->_staffModel = $staffModel;
        parent::__construct($context);
    }

    public function execute()
    {
        $request = $this->getRequest();
        if ($request->getPost()){
            $model = $this->_staffModel->create();
            $staffId = $request->getParam("id");
            $formRequest = $request->getPostValue();
            $isDelete = 0;
            $urlRedirect = "*/*/add";
            if ($staffId) {
                $model->load($staffId);
                $urlRedirect = "*/*/edit/id/". $model->getId();
                if (isset($formRequest["avatar"]["delete"])){
                    $isDelete = $formRequest["avatar"]["delete"];
                }
                unset($formRequest["avatar"]);
            }
            $model->setData($formRequest);
            $fileRequest = $request->getFiles()->toArray();
            //Upload avatar
            if ($fileRequest['avatar']['name']){
                $imageHelper = $this->_objectManager->get('M2\Staff\Helper\Image');
                $imageFile = $imageHelper->uploadImage("avatar");
                if ($imageFile){
                    if ($isDelete == 1){
                        $imageHelper->removeImage($model->getAvatar());
                    }
                    $model->setAvatar("staff/$imageFile");
                } else {
                    //Upload fail
                    $this->messageManager->addError(__("Can not upload avatar, Please try again."));
                    $this->_getSession()->setFormData($formRequest);
                    return $this->_redirect($urlRedirect);
                }
            } else {
                if (!$staffId){
                    $this->messageManager->addErrorMessage(__("You must upload staff avatar"));
                    $this->_getSession()->setFormData($formRequest);
                    return $this->_redirect($urlRedirect);
                }
            }
            try {
                $model->save();
//                $this->_eventManager->dispatch("staff_testevent",["staff" => $model]);
                $this->messageManager->addSuccess(__("The staff information has been saved"));
                if ($request->getParam("back")){
                    return $this->_redirect("*/*/edit",["id" => $model->getId()]);
                }
                return $this->_redirect("*/*/");
            } catch (\Exception $e) {
                $this->messageManager->addError(__("Something went wrong while saving the staff."));
                $this->_logger->info($e->getMessage());
                return $this->_redirect($urlRedirect);
            }
        }
    }
}