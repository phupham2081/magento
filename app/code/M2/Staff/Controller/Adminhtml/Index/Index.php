<?php
/**
 * Created by PhpStorm.
 * User: phupham
 * Date: 13/03/2019
 * Time: 14:00
 */

namespace M2\Staff\Controller\Adminhtml\Index;


use M2\Staff\Model\StaffFactory;
use Magento\Backend\App\Action;
use Magento\Framework\View\Result\PageFactory;

class Index extends Action
{
    protected $_pageFactory;
    protected $_staffModel;

    public function __construct(
        Action\Context $context,
        PageFactory $pageFactory,
        StaffFactory $staffFactory
    )
    {
        $this->_staffModel = $staffFactory;
        $this->_pageFactory = $pageFactory;
        parent::__construct($context);
    }

    public function execute()
    {
        $resultPage = $this->_pageFactory->create();
        $resultPage->getConfig()->getTitle()->prepend(__("Staff Manager"));
        $model = $this->_staffModel->create();
//        $model->addData([
//            "name" => "Pham Phu",
//            "email" => "phupham@gmail.com",
//            "phone" => "0977300000",
//            "position" => "Dev",
//            "avatar" => "staff/1.jpg",
//            "status" => true
//        ])->save();
        return $resultPage;
    }
}