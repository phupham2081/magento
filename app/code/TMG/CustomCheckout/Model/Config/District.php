<?php
/**
 * Created by PhpStorm.
 * User: phupham
 * Date: 26/04/2019
 * Time: 11:16
 */

namespace TMG\CustomCheckout\Model\Config;


use Magento\Framework\Data\OptionSourceInterface;
use TMG\CustomCheckout\Model\DistrictFactory;

class District implements OptionSourceInterface
{
    protected $_district;

    public function __construct(DistrictFactory $districtFactory)
    {
        $this->_district = $districtFactory;
    }

    public function toOptionArray()
    {
        $districtModel = $this->_district->create();
        $districts = $districtModel->getCollection()->getData();
        foreach ($districts as $district){
            $result[] = [
                'value' => $district['district_id'],
                'label' => __($district['name'])
            ];
        }
        return $result;
    }
}