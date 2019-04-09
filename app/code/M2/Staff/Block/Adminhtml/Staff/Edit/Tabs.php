<?php
/**
 * Created by PhpStorm.
 * User: phupham
 * Date: 21/03/2019
 * Time: 10:05
 */

namespace M2\Staff\Block\Adminhtml\Staff\Edit;

use Magento\Backend\Block\Widget\Tabs as WidgetTabs;

class Tabs extends WidgetTabs
{
    protected function _construct()
    {
        parent::_construct();
        $this->setId("staff_edit_tabs");
        $this->setDestElementId("edit_form");
        $this->setTitle(__("Staff Manager"));
    }

    protected function _beforeToHtml()
    {
        $this->addTab(
            "staff_main",
            [
                "label" => __("Main Information"),
                "title" => __("Main Information"),
                "content" => $this->getLayout()->createBlock("M2\Staff\Block\Adminhtml\Staff\Edit\Tabs\Main")->toHtml(),
                "active" => true
            ]
        );
        $this->addTab(
            "staff_avatar",
            [
                "label" => __("Avatar Information"),
                "title" => __("Avatar Information"),
                "content" => $this->getLayout()->createBlock("M2\Staff\Block\Adminhtml\Staff\Edit\Tabs\Avatar")->toHtml(),
                "active" => false
            ]
        );
        $this->addTab(
            "staff_profile",
            [
                "label" => __("Profile Information"),
                "title" => __("Profile Information"),
                "content" => $this->getLayout()->createBlock("M2\Staff\Block\Adminhtml\Staff\Edit\Tabs\Profile")->toHtml(),
                "active" => false
            ]
        );
        return parent::_beforeToHtml();
    }
}