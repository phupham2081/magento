<?php
/**
 * Created by PhpStorm.
 * User: phupham
 * Date: 13/03/2019
 * Time: 14:53
 */

namespace M2\Staff\Model;


use Magento\Framework\Model\AbstractModel;

class Staff extends AbstractModel
{
    protected function _construct()
    {
        $this->_init('M2\Staff\Model\ResourceModel\Staff');
    }
}