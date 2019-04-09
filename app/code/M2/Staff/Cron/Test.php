<?php
/**
 * Created by PhpStorm.
 * User: phupham
 * Date: 25/03/2019
 * Time: 15:52
 */

namespace M2\Staff\Cron;


class Test
{
    public function execute()
    {
        $writer = new \Zend\Log\Writer\Stream(BP . 'var/log/cron.log');
        $logger = new \Zend\Log\Logger();
        $logger->addWriter($writer);
        $logger->info(__METHOD__);
        return $this;
    }
}