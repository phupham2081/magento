<?php
/**
 * Created by PhpStorm.
 * User: phupham
 * Date: 11/03/2019
 * Time: 11:07
 */

namespace M2\Training\Controller\Index;


use Magento\Framework\View\Result\PageFactory;
use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\Registry;

class Index extends Action
{
    protected $_pageFactory;
    protected $_coreRegistry;

    public function __construct(
        Context $context,
        PageFactory $pageFactory,
        Registry $coreRegistry
    )
    {
        $this->_coreRegistry = $coreRegistry;
        $this->_pageFactory = $pageFactory;
        parent::__construct($context);
    }

    public function execute()
    {
        $this->_coreRegistry->register('news','Mi fren id da bet');
        return $this->_pageFactory->create();
    }

}