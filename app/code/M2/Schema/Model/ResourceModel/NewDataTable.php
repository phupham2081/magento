<?php
/**
 * Created by PhpStorm.
 * User: phupham
 * Date: 12/03/2019
 * Time: 17:40
 */

namespace M2\Schema\Model\ResourceModel;


use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class NewDataTable extends AbstractDb
{
    public function _construct()
    {
        $this->_init('new_data_table', 'id');
    }
}