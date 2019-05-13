<?php
/**
 * Created by PhpStorm.
 * User: phupham
 * Date: 15/03/2019
 * Time: 10:32
 */

namespace M2\Staff\Block\Adminhtml\Staff\Edit;



use M2\Staff\Model\Config\Status;
use Magento\Backend\Block\Widget\Form\Generic;
use Magento\Cms\Model\Wysiwyg\Config;

class Form extends Generic
{
    protected $_coreRegistry;
    protected $_staffStatus;
    protected $_configEditor;

    public function __construct(
        \Magento\Backend\Block\Template\Context $context,
        \Magento\Framework\Registry $registry,
        \Magento\Framework\Data\FormFactory $formFactory,
        Config $config,
        Status $staffStatus,
        array $data = []
    )
    {
        $this->_configEditor = $config;
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

        $form = $this->_formFactory->create([
            "data" => [
                "id" => "edit_form",
                "action" => $this->getData("action"),
                "method" => "post",
                "enctype" => "multipart/form-data"
            ]
        ]);

        $form->setHtmlIdPrefix("staff_");
        $form->setUseContainer(true);
        $this->setForm($form);
        return parent::_prepareForm();
    }
}