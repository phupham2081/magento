<?php
/**
 * Created by PhpStorm.
 * User: phupham
 * Date: 28/03/2019
 * Time: 09:18
 */

namespace TMG\ProductAtb\Block\Widget;


use Magento\Framework\View\Element\Template;
use Magento\Widget\Block\BlockInterface;

class Posts extends Template implements BlockInterface
{
    protected $_template = "widget/post.phtml";
}