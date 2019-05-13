<?php
/**
 * Created by PhpStorm.
 * User: phupham
 * Date: 15/03/2019
 * Time: 10:32
 */

namespace M2\Staff\Block\Adminhtml\Staff;


use Magento\Backend\Block\Widget\Form\Container;

class Edit extends Container
{

    protected function _construct()
    {
        $this->_blockGroup = "M2_Staff";
        $this->_controller = 'adminhtml_staff';
        $this->_objectId = "id";
        parent::_construct();
        $this->buttonList->add(
            "saveandcontinue",
            [
                'label' => __('Save And Continue'),
                'class' => 'save',
                'data_attribute' => [
                    'mage-init' => [
                        'button' => [
                            'event' => 'saveAndContinue',
                            'target' => '#edit_form'
                        ]
                    ],
                ]
            ],
            -100
        );
    }

    protected function _getSaveAndContinueUrl()
    {
        return $this->getUrl("staff/*/save", ["_current" => true, "back" => "edit", "active_tab" => ""]);
    }
}