<?php
/**
 * Created by PhpStorm.
 * User: phupham
 * Date: 12/03/2019
 * Time: 17:18
 */

namespace M2\Schema\Model;


use Magento\Framework\Model\AbstractModel;

class NewDataTable extends AbstractModel
{
    public function _construct()
    {
        $this->_init('M2\Schema\Model\ResourceModel\NewDataTable');
    }
}