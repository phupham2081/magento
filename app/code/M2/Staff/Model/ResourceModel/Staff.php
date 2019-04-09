<?php
/**
 * Created by PhpStorm.
 * User: phupham
 * Date: 13/03/2019
 * Time: 14:53
 */

namespace M2\Staff\Model\ResourceModel;


use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class Staff extends AbstractDb
{
    protected function _construct()
    {
        $this->_init('staff', 'id');
    }
}