<?php
/**
 * Created by PhpStorm.
 * User: phupham
 * Date: 12/03/2019
 * Time: 17:44
 */

namespace M2\Schema\Model\ResourceModel\NewDataTable;


use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class Collection extends AbstractCollection
{
    public function _construct()
    {
        $this->_init('M2\Schema\Model\NewDataTable','M2\Schema\Model\ResourceModel\NewDataTable');
    }
}