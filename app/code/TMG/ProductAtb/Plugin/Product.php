<?php
/**
 * Created by PhpStorm.
 * User: phupham
 * Date: 29/03/2019
 * Time: 14:52
 */

namespace TMG\ProductAtb\Plugin;


class Product
{
    public function afterGetPrice(\Magento\Catalog\Model\Product $subject, $result)
    {
        return $result +1000;
    }
}