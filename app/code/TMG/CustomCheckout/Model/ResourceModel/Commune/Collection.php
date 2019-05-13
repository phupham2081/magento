<?php
/**
 * Created by PhpStorm.
 * User: phupham
 * Date: 26/04/2019
 * Time: 11:12
 */

namespace TMG\CustomCheckout\Model\ResourceModel\Commune;


use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class Collection extends AbstractCollection
{
    protected $_idFieldName = "commune_id";
    public function _construct()
    {
        $this->_init('TMG\CustomCheckout\Model\Commune','TMG\CustomCheckout\Model\ResourceModel\Commune');
    }

}