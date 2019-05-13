<?php
/**
 * Created by PhpStorm.
 * User: phupham
 * Date: 26/04/2019
 * Time: 08:55
 */

namespace TMG\CustomCheckout\Model\ResourceModel\Province;


use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class Collection extends AbstractCollection
{
    protected $_idFieldName = 'province_id';

    public function _construct()
    {
        $this->_init('TMG\CustomCheckout\Model\Province','TMG\CustomCheckout\Model\ResourceModel\Province');
    }
}