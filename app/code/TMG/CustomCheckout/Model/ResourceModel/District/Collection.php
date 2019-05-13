<?php
/**
 * Created by PhpStorm.
 * User: phupham
 * Date: 26/04/2019
 * Time: 11:09
 */

namespace TMG\CustomCheckout\Model\ResourceModel\District;


use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class Collection extends AbstractCollection
{
    protected $_idFieldName = 'district_id';
    public function _construct()
    {
        $this->_init('TMG\CustomCheckout\Model\District','TMG\CustomCheckout\Model\ResourceModel\District');
    }
}