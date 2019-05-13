<?php
/**
 * Created by PhpStorm.
 * User: phupham
 * Date: 26/04/2019
 * Time: 11:15
 */

namespace TMG\CustomCheckout\Model;


use Magento\Framework\Model\AbstractModel;

class Commune extends AbstractModel
{
    public function _construct()
    {
        $this->_init('TMG\CustomCheckout\Model\ResourceModel\Commune');
    }
}