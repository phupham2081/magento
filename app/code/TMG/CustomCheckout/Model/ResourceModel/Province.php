<?php
/**
 * Created by PhpStorm.
 * User: phupham
 * Date: 26/04/2019
 * Time: 08:55
 */

namespace TMG\CustomCheckout\Model\ResourceModel;


use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class Province extends AbstractDb
{
    public function _construct()
    {
         $this->_init('province','province_id');
    }
}