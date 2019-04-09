<?php
/**
 * Created by PhpStorm.
 * User: phupham
 * Date: 22/03/2019
 * Time: 09:08
 */

namespace M2\Staff\Console;


use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class TestCli extends Command
{
    protected function configure()
    {
        $this->setName("test:cli");
        $this->setDescription("Test new cli");
        parent::configure();
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $output->writeln("Good Bye");
    }
}