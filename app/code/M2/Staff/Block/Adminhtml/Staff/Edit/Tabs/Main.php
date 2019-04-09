<?php
/**
 * Created by PhpStorm.
 * User: phupham
 * Date: 15/03/2019
 * Time: 10:32
 */

namespace M2\Staff\Block\Adminhtml\Staff\Edit\Tabs;



use M2\Staff\Model\Config\Status;
use Magento\Backend\Block\Widget\Form\Generic;
use Magento\Backend\Block\Widget\Tab\TabInterface;

class Main extends Generic implements TabInterface
{
    protected $_coreRegistry;
    protected $_staffStatus;
    protected $_configEditor;

    public function __construct(
        \Magento\Backend\Block\Template\Context $context,
        \Magento\Framework\Registry $registry,
        \Magento\Framework\Data\FormFactory $formFactory,
        Status $staffStatus,
        array $data = []
    )
    {
        $this->_coreRegistry = $registry;
        $this->_staffStatus = $staffStatus;
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
            "base_fieldset",
            ["legend" => __("General Information"), "class" => "fieldset-wide"]
        );

        $fieldset->addField(
            "name",
            "text",
            [
                "name" => "name",
                "label" => __("Name"),
                "required" => true
            ]
        );
        $fieldset->addField(
            "email",
            "text",
            [
                "name" => "email",
                "label" => __("Email"),
                "required" => true
            ]
        );
        $fieldset->addField(
            "phone",
            "text",
            [
                "name" => "phone",
                "label" => __("Phone"),
                "required" => true
            ]
        );
        $fieldset->addField(
            "position",
            "text",
            [
                "name" => "position",
                "label" => __("Position"),
                "required" => true
            ]
        );
        $fieldset->addField(
            "status",
            "select",
            [
                "name" => "status",
                "label" => __("Status"),
                "required" => true,
                "options" => $this->_staffStatus->toOptionArray()
            ]
        );

        if($model){
            if ($model->getId()) {
                $fieldset->addField(
                    "id",
                    "hidden",
                    [
                        "name" => "id"
                    ]
                );
            }
            $data = $model->getData();
            $form->setValues($data);
        }
        $this->setForm($form);
        return parent::_prepareForm();
    }
    public function getTabLabel(){
        return __("Main Information");
    }
    public function getTabTitle(){
        return __("Main Information");
    }
    public function canShowTab(){
        return true;
    }
    public function isHidden(){
        return true;
    }

}