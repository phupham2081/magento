<?php
/**
 * Created by PhpStorm.
 * User: phupham
 * Date: 15/03/2019
 * Time: 10:32
 */

namespace M2\Staff\Block\Adminhtml\Staff\Edit\Tabs;


use Magento\Backend\Block\Widget\Form\Generic;
use Magento\Backend\Block\Widget\Tab\TabInterface;

class Avatar extends Generic implements TabInterface
{
    protected $_coreRegistry;

    public function __construct(
        \Magento\Backend\Block\Template\Context $context,
        \Magento\Framework\Registry $registry,
        \Magento\Framework\Data\FormFactory $formFactory,
        array $data = []
    )
    {
        $this->_coreRegistry = $registry;
        parent::__construct($context, $registry, $formFactory, $data);
    }

    protected function _construct()
    {
        $this->setId("staff_form");
        $this->setTitle(__("Staff Information"));
        parent::_construct();
    }

    protected function _prepareForm()
    {
        $model = $this->_coreRegistry->registry("staff");
        $form = $this->_formFactory->create();
        $fieldset = $form->addFieldset(
            "avatar_fieldset",
            ["legend" => __("General Information"), "class" => "fieldset-wide"]
        );

        $fieldset->addField(
            "avatar",
            "image",
            [
                "name" => "avatar",
                "label" => __("Avatar"),
                "required" => true
            ]
        );

        if($model){
            $data = $model->getData();
            $form->setValues($data);
        }
        $this->setForm($form);
        return parent::_prepareForm();
    }
    public function getTabLabel(){
        return __("Avatar Information");
    }
    public function getTabTitle(){
        return __("Avatar Information");
    }
    public function canShowTab(){
        return true;
    }
    public function isHidden(){
        return true;
    }

}