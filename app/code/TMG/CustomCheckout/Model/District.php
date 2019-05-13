<?php
/**
 * Created by PhpStorm.
 * User: phupham
 * Date: 26/04/2019
 * Time: 10:53
 */

namespace TMG\CustomCheckout\Model;


use Magento\Framework\Model\AbstractModel;

class District extends AbstractModel
{
    public function _construct()
    {
        $this->_init('TMG\CustomCheckout\Model\ResourceModel\District');
    }
}
