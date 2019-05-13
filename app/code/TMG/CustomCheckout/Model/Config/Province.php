<?php
/**
 * Created by PhpStorm.
 * User: phupham
 * Date: 26/04/2019
 * Time: 09:07
 */

namespace TMG\CustomCheckout\Model\Config;

use Magento\Framework\Data\OptionSourceInterface;
use TMG\CustomCheckout\Model\ProvinceFactory;

class Province implements OptionSourceInterface
{
    protected $_province;

    public function __construct(ProvinceFactory $provinceFactory)
    {
        $this->_province = $provinceFactory;
    }

    public function toOptionArray()
    {
        $result = [];
        $provinceModel = $this->_province->create();

        $provinces = $provinceModel->getCollection()->getData();

        foreach ($provinces as $id => $province){
            $result[] = [
                    'value' => $province['province_id'],
                    'label' => __($province['name'])
                ];
        }
        return $result;
    }
}