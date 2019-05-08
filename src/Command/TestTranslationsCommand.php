<?php

namespace App\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;
use Symfony\Contracts\Translation\TranslatorInterface;

class TestTranslationsCommand extends Command
{
    protected static $defaultName = 'app:test-translations';

    private $translator;
    public function __construct(TranslatorInterface $translator)
    {
        $this->translator = $translator;

        parent::__construct();
    }


    protected function configure()
    {
        $this
            ->setDescription('Add a short description for your command')
            ->addArgument('arg1', InputArgument::OPTIONAL, 'Argument description')
            ->addOption('option1', null, InputOption::VALUE_NONE, 'Option description')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $io = new SymfonyStyle($input, $output);

        $firstMessage = $this->translator->trans('Symfony is great', [], 'messages');
        $secondMessage = $this->translator->trans('Symfony is great', [], 'my.messages');

        $io->success($firstMessage);
        $io->success($secondMessage);
    }
}
