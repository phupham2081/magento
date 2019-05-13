<?php
/**
 * Created by PhpStorm.
 * User: phupham
 * Date: 19/03/2019
 * Time: 10:52
 */

namespace M2\Staff\Controller\Adminhtml\Index;

use M2\Staff\Model\ResourceModel\Staff\CollectionFactory;
use Magento\Backend\App\Action;
use Magento\Ui\Component\MassAction\Filter;

class MassEnable extends Action
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
        foreach ($collection as $item) {
            $item->setStatus(1);
            $item->save();
        }
        $this->messageManager->addSuccess("Status has been enabled");
        return $this->_redirect("*/*/");
    }
}