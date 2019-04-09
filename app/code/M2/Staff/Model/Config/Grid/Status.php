<?php
/**
 * Created by PhpStorm.
 * User: phupham
 * Date: 14/03/2019
 * Time: 14:35
 */

namespace M2\Staff\Model\Config\Grid;


use Magento\Framework\Data\OptionSourceInterface;

class Status implements OptionSourceInterface
{
    public function toOptionArray()
    {
        $options = [
            [
                "value" => 1,
                "label" => __("Enabled"),
            ],
            [
                "value" => 0,
                "label" => __("Disabled"),
            ],
        ];
        return $options;
    }
}