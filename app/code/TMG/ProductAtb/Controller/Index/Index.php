<?php
/**
 * Created by PhpStorm.
 * User: phupham
 * Date: 28/03/2019
 * Time: 13:35
 */

namespace TMG\ProductAtb\Controller\Index;


use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;

class Index extends Action
{
    protected $_resultPage;
    public function __construct(
        Context $context,
        PageFactory $pageFactory
    )
    {
        $this->_resultPage = $pageFactory;
        parent::__construct($context);
    }

    public function execute()
    {
        return $this->_resultPage->create();
    }
}