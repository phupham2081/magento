<?php
/**
 * Created by PhpStorm.
 * User: phupham
 * Date: 22/04/2019
 * Time: 13:57
 */

namespace TMG\AddBlock\Observer;


use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;

class ChangeDisplayText implements ObserverInterface
{
    public function execute(Observer $observer)
    {
        $displayText = $observer->getData('mp_text');
        echo $displayText->getText() . " - Event </br>";
        $displayText->setText('Execute event successfully.');

        return $this;
    }
}