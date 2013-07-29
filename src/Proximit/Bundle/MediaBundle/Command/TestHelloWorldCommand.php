<?php
namespace Proximit\Bundle\MediaBundle\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class TestHelloWorldCommand extends ContainerAwareCommand
{
    protected function configure()
    {
        $this
            ->setName('proximit:tests:helloworld')
            ->setDescription('Hello world example')
            ->addArgument(
                'name',
                InputArgument::OPTIONAL,
                'The path to store exported reservations (default: world)',
                'world'
            )
        ;
    }
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $name = strtolower($input->getArgument('name'));

        $dialog = $this->getHelperSet()->get('dialog');

        $name = $dialog->ask(
            $output,
            sprintf('Please enter your firstname (default : %s) : ' , $name),
            $name
        );

        try {
            
            $output->writeln(sprintf(
                "<info>Hello %s !</info>",
                $name
            ));

        } catch (\Exception $e) {
            $output->writeln(sprintf("<error>%s</error>", $e->getMessage()));

            return false;
        }
    }
}

?>
