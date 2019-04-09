<?php
/**
 * Created by PhpStorm.
 * User: phupham
 * Date: 15/03/2019
 * Time: 16:12
 */

namespace M2\Staff\Model\Config;


use Magento\Framework\Option\ArrayInterface;

class Status implements ArrayInterface
{
    const ENABLE = 1;
    const DISABLE = 0;
    public function toOptionArray()
    {
        return [
            self::ENABLE => __("Enabled"),
            self::DISABLE => __("Disabled")
        ];
    }
}