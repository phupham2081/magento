<?php
/**
 * Created by PhpStorm.
 * User: phupham
 * Date: 22/03/2019
 * Time: 09:08
 */

namespace M2\Staff\Console;


use Magento\Framework\ObjectManager\ObjectManager;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class TestCli extends Command
{
    protected $_objectManager;
    public function _construct(ObjectManager $objectManager)
    {
        $this->_objectManager = $objectManager;
    }

    protected function configure()
    {
        $this->setName("test:cli");
        $this->setDescription("Test new cli");
        parent::configure();
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $manager = $this->_objectManager();
        $object  = $manager->create('M2\Staff\Model\Example');
        $message = $object->getHelloMessage();
        $output->writeln(
            $message
        );
    }
}