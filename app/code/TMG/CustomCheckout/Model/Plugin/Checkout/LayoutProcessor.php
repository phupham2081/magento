<?php
/**
 * Created by PhpStorm.
 * User: phupham
 * Date: 25/04/2019
 * Time: 13:54
 */

namespace TMG\CustomCheckout\Model\Plugin\Checkout;

use TMG\CustomCheckout\Model\Config\Commune;
use TMG\CustomCheckout\Model\Config\District;
use TMG\CustomCheckout\Model\Config\Province;

class LayoutProcessor
{
    protected $_province;
    protected $_district;
    protected $_commune;

    public function __construct(Province $province,District $district,Commune $commune)
    {
        $this->_province = $province;
        $this->_district = $district;
        $this->_commune = $commune;
    }

    public function afterProcess(\Magento\Checkout\Block\Checkout\LayoutProcessor $subject,
                                 array  $jsLayout)
    {
        $jsLayout['components']['checkout']['children']['steps']['children']['shipping-step']['children']['shippingAddress']['children']['shipping-address-fieldset']['children']['province_id'] = [
            'component' => 'Magento_Ui/js/form/element/select',
            'config' => [
                // customScope is used to group elements within a single form (e.g. they can be validated separately)
                'customScope' => 'shippingAddress.custom_attributes',
                'customEntry' => null,
                'template' => 'ui/form/field',
                'elementTmpl' => 'ui/form/element/select',
                'tooltip' => [
                    'description' => 'this is what the field is for',
                ],
            ],
            'dataScope' => 'shippingAddress.custom_attributes' . '.' . 'province_id',
            'label' => 'Province',
            'provider' => 'checkoutProvider',
            'sortOrder' => 0,
            'validation' => [
                'required-entry' => true
            ],
            'options' => $this->_province->toOptionArray(),
            'filterBy' => null,
            'customEntry' => null,
            'visible' => true,
        ];

        $jsLayout['components']['checkout']['children']['steps']['children']['shipping-step']['children']['shippingAddress']['children']['shipping-address-fieldset']['children']['district_id'] = [
            'component' => 'Magento_Ui/js/form/element/select',
            'config' => [
                // customScope is used to group elements within a single form (e.g. they can be validated separately)
                'customScope' => 'shippingAddress.custom_attributes',
                'customEntry' => null,
                'template' => 'ui/form/field',
                'elementTmpl' => 'ui/form/element/select',
                'tooltip' => [
                    'description' => 'this is what the field is for',
                ],
            ],
            'dataScope' => 'shippingAddress.custom_attributes' . '.' . 'district_id',
            'label' => 'District',
            'provider' => 'checkoutProvider',
            'sortOrder' => 0,
            'validation' => [
                'required-entry' => true
            ],
            'options' => $this->_district->toOptionArray(),
//            'filterBy' => [
//                'target' => '${ $.provider }:${ $.parentScope }.province_id',
//                'field' => 'province_id'
//            ],
            'filterBy' => null,
            'customEntry' => null,
            'visible' => true,
        ];

        $jsLayout['components']['checkout']['children']['steps']['children']['shipping-step']['children']['shippingAddress']['children']['shipping-address-fieldset']['children']['commune_field'] = [
            'component' => 'Magento_Ui/js/form/element/select',
            'config' => [
                // customScope is used to group elements within a single form (e.g. they can be validated separately)
                'customScope' => 'shippingAddress.custom_attributes',
                'customEntry' => null,
                'template' => 'ui/form/field',
                'elementTmpl' => 'ui/form/element/select',
                'tooltip' => [
                    'description' => 'this is what the field is for',
                ],
            ],
            'dataScope' => 'shippingAddress.custom_attributes' . '.' . 'commune_field',
            'label' => 'Commune',
            'provider' => 'checkoutProvider',
            'sortOrder' => 0,
            'validation' => [
                'required-entry' => true
            ],
            'options' => $this->_commune->toOptionArray(),
            'filterBy' => null,
            'customEntry' => null,
            'visible' => true,
        ];
        return $jsLayout;
    }
}