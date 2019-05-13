<?php
/**
 * Created by PhpStorm.
 * User: phupham
 * Date: 28/03/2019
 * Time: 10:34
 */

namespace TMG\ProductAtb\Block;


use Magento\Framework\View\Element\Template;
use Magento\Theme\Block\Html\Header\Logo;

class IsHomePage extends Template
{
    protected $_logo;

    public function __construct(Template\Context $context,Logo $logo, array $data = [])
    {
        $this->_logo = $logo;
        parent::__construct($context, $data);
    }

    public function isHomePage()
    {
        return $this->_logo->isHomePage();
    }
}