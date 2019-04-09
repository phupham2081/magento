<?php
/**
 * Created by PhpStorm.
 * User: phupham
 * Date: 18/03/2019
 * Time: 16:04
 */

namespace M2\Staff\Controller\Adminhtml\Index;


use M2\Staff\Model\ResourceModel\Staff\CollectionFactory;
use Magento\Backend\App\Action;
use Magento\Ui\Component\MassAction\Filter;

class MassDelete extends Action
{
    protected $_filter;
    protected $_collectionFactory;
    public function __construct(
        Action\Context $context,
        Filter $filter,
        CollectionFactory $collectionFactory
)
    {
        $this->_filter = $filter;
        $this->_collectionFactory = $collectionFactory;
        parent::__construct($context);
    }

    public function execute()
    {
        $collectionObj = $this->_collectionFactory->create();
        $collection = $this->_filter->getCollection($collectionObj);
        $numberRecords = $collection->getSize();
        $imageHelper = $this->_objectManager->get("M2\Staff\Helper\Image");
        foreach ($collection as $item){
            $imageHelper->removeImage($item->getAvatar());
            $item->delete();
        }
        $this->messageManager->addSuccess(__("A total of %1 records has been deleted", $numberRecords));
        return $this->_redirect("*/*/");
    }
}