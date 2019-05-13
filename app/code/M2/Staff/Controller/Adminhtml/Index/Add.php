<?php
/**
 * Created by PhpStorm.
 * User: phupham
 * Date: 15/03/2019
 * Time: 09:09
 */

namespace M2\Staff\Controller\Adminhtml\Index;


use Magento\Backend\App\Action;
use Magento\Framework\View\Result\PageFactory;

class Add extends Action
{
    const ADMIN_RESOURCE = "M2_Staff::staff_save";
    protected $_pageFactory;

    public function __construct(
        Action\Context $context,
        PageFactory $pageFactory
    )
    {
        $this->_pageFactory = $pageFactory;
        parent::__construct($context);
    }

    public function execute()
    {
        return $this->_forward('edit');
    }
}
