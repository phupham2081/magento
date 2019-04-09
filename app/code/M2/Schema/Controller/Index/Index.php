<?php
/**
 * Created by PhpStorm.
 * User: phupham
 * Date: 13/03/2019
 * Time: 09:02
 */

namespace M2\Schema\Controller\Index;


use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;
use PDepend\Util\Log;
use Psr\Log\LoggerInterface;

class Index extends Action
{
    protected $resultPage;
    protected $_logger;
    protected $_newDataModel;

    public function __construct(
        Context $context,
        PageFactory $pageFactory,
        LoggerInterface $logger,
        \M2\Schema\Model\NewDataTableFactory $newData
    )
    {
        $this->_newDataModel = $newData;
        $this->_logger = $logger;
        $this->resultPage = $pageFactory;
        parent::__construct($context);
    }

    public function execute()
    {
        //Using factory
        $model = $this->_newDataModel->create();

        //Using object Manager
//        $model = $this->_objectManager->create("M2\Schema\Model\NewDataTable");

        //add record
//        try {
//            $model->addData([
//                'title' => "This is my schema",
//                'content' => "This is my content",
//                'status' => true,
//                'sort_order' => 20
//            ])->save();
//        } catch (\Exception $e) {
//            echo $e->getMessage();
//        }

        //Get all records
        $news = $model->getCollection()->getData();

        //Delele record
        //$model->load(1)->delete();

        //Update record
//        $data = $model->load(1);
//        $data->setTitle("Good good")
//             ->setContent("Good good")
//             ->save();

        //select
//        $data = $model->getCollection()->addFieldToSelect(['id','title','status'])
//                                        ->addFieldToFilter('id',['eq' => 1] );
//        eq ==> ==
//        gt ==> >
//        lt ==> <
//        neq ==> !=
//        gteq ==> >=
//        lteq ==> <=
        var_dump($news);
        echo "<h1>Insert Success</h1>";
        return $this->resultPage->create();
    }
}