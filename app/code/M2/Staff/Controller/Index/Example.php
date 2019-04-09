<?php
/**
 * Created by PhpStorm.
 * User: phupham
 * Date: 23/03/2019
 * Time: 10:59
 */

namespace M2\Staff\Controller\Index;


use Magento\Framework\App\Action\Action;

class Example extends Action
{
    protected $title;

    public function execute()
    {
        $this->setTitle("xin chao");
        echo $this->getTitle();
    }
    public function setTitle($title)
    {
        return $this->title = $title;
    }

    public function getTitle()
    {
        return $this->title;
    }
}