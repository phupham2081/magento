<?php
/**
 * Created by PhpStorm.
 * User: phupham
 * Date: 21/03/2019
 * Time: 13:58
 */

namespace M2\Staff\Block\Adminhtml\Staff\Widget;




use M2\Staff\Model\ResourceModel\Staff\CollectionFactory;
use Magento\Framework\ObjectManagerInterface;
use Magento\Framework\UrlInterface;
use Magento\Framework\View\Element\Template;
use Magento\Widget\Block\BlockInterface;

class Posts extends Template implements BlockInterface
{
    protected $_staffModel;
    protected $_template = "widget/posts.phtml";

    public function __construct(
        Template\Context $context,
        CollectionFactory $staffFactory,
        array $data = [])
    {
        $this->_staffModel = $staffFactory;
        parent::__construct($context, $data);
    }

    protected function _beforeToHtml()
    {
        $ids = explode(",",$this->getData("recordshow"));
        $model = $this->_staffModel->create();
        $staffs = $model->addFieldToFilter("status",["eq" => true])
                        ->addFieldToFilter("id",["in" => $ids])
                        ->getData();
        $this->setData("staffs",$staffs);
        $mediaUrl = $this->_storeManager->getStore()->getBaseUrl(UrlInterface::URL_TYPE_MEDIA);
        $this->setData("url",$mediaUrl);
        return parent::_beforeToHtml();
    }

    protected function getBaseUrlMedia()
    {
        $mediaUrl = $this->_storeManager->getStore()->getBaseUrl(UrlInterface::URL_TYPE_MEDIA);
        return $mediaUrl;
    }

}