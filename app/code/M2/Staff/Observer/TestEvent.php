<?php
/**
 * Created by PhpStorm.
 * User: phupham
 * Date: 20/03/2019
 * Time: 13:44
 */

namespace M2\Staff\Observer;


use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;
use Psr\Log\LoggerInterface;

class TestEvent implements ObserverInterface
{
    protected $_logger;

    public function __construct(LoggerInterface $logger)
    {
        $this->_logger = $logger;
    }

    public function execute(Observer $observer)
    {
//        $model = $observer->getStaff();
//        var_dump($model->get());exit();
//        $this->_logger->info("Staff name: ".$model->getName());
    }
}