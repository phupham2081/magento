<?php


namespace Thienminh\Training\Controller\Index;


use Magento\Framework\App\Action\Action;

class Example extends Action
{
    protected $title;

    public function execute()
    {

        echo $this->setTitle('I');
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