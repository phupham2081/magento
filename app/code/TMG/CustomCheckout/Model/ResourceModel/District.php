<?php
/**
 * Created by PhpStorm.
 * User: phupham
 * Date: 26/04/2019
 * Time: 10:55
 */

namespace TMG\CustomCheckout\Model\ResourceModel;


use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class District extends AbstractDb
{
    public function _construct()
    {
        $this->_init('district','district_id');
    }
}