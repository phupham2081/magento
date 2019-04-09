<?php
/**
 * Created by PhpStorm.
 * User: phupham
 * Date: 13/03/2019
 * Time: 14:54
 */

namespace M2\Staff\Model\ResourceModel\Staff;


use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class Collection extends AbstractCollection
{
    protected $_idFieldName = "id";

    protected function _construct()
    {
        $this->_init('M2\Staff\Model\Staff', 'M2\Staff\Model\ResourceModel\Staff');
    }
}