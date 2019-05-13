<?php
/**
 * Created by PhpStorm.
 * User: phupham
 * Date: 26/04/2019
 * Time: 11:13
 */

namespace TMG\CustomCheckout\Model\ResourceModel;


use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class Commune extends AbstractDb
{
    public function _construct()
    {
        $this->_init('commune','commune_id');
    }
}