<?php
/**
 * Created by PhpStorm.
 * User: phupham
 * Date: 08/04/2019
 * Time: 15:46
 */

namespace TMG\ExampleTab\Cron;


class Test
{
    public function execute()
    {
        $writer = new \Zend\Log\Writer\Stream(BP . '/var/log/cron.log');
        $logger = new \Zend\Log\Logger();
        $logger->addWriter($writer);
        $logger->info("This is my cron job");
    }
}