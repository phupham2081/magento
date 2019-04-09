<?php
/**
 * Created by PhpStorm.
 * User: phupham
 * Date: 11/03/2019
 * Time: 14:11
 */

namespace M2\Training\Block;


use Magento\Framework\View\Element\Template;
use Magento\Framework\Registry;

class Training extends Template
{
    protected $_coreRegistry;

    public function __construct(
        Template\Context $context,
        array $data,
        Registry $coreRegistry
    )
    {
        $this->_coreRegistry = $coreRegistry;
        parent::__construct($context,$data);
    }

    protected function _prepareLayout()
    {
        $title = $this->_coreRegistry->registry('news');
        $this->assign('newstitle',$title);
        return parent::_prepareLayout();
    }

    public function sayHello()
    {
        return __('<h1>Hello World</h1>');
    }
}