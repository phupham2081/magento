<?php
/**
 * Created by PhpStorm.
 * User: phupham
 * Date: 26/04/2019
 * Time: 11:16
 */

namespace TMG\CustomCheckout\Model\Config;


use Magento\Framework\Data\OptionSourceInterface;
use TMG\CustomCheckout\Model\CommuneFactory;

class Commune implements OptionSourceInterface
{
    protected $_commune;

    public function __construct(CommuneFactory $communeFactory)
    {
        $this->_commune = $communeFactory;
    }

    public function toOptionArray()
    {
        $communeModel = $this->_commune->create();
        $communes = $communeModel->getCollection()->getData();
        foreach ($communes as $commune){
            $result[] = [
                'value' => $commune['commune_id'],
                'label' => __($commune['name'])
            ];
        }
        return $result;
    }
}