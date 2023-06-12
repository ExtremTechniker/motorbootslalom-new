<?php

namespace App\Command;

use App\Repository\VeranstaltungRepository;
use App\Service\StartingOrderManager;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

#[AsCommand(
    name: 'mbs:generate-starting-order',
    description: 'Add a short description for your command',
)]
class MbsGenerateStartingOrderCommand extends Command
{
    public function __construct(protected VeranstaltungRepository $veranstaltungRepository,
                                protected StartingOrderManager $startingOrderManager,
                                string $name = null)
    {
        parent::__construct($name);
    }

    protected function configure(): void
    {
        $this
            ->addArgument('event', InputArgument::REQUIRED, 'Argument description')
            ->addOption('boat', 'b', InputArgument::IS_ARRAY | InputOption::VALUE_OPTIONAL, 'List of Boats', ["ME", "M1", "M2", "M3", "M4", "M5", "M6", "M7"])
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);
        $event = $input->getArgument('event');
        $boat = $input->getOption('boat');

        $this->startingOrderManager->generateAndPersist($event);

        return Command::SUCCESS;
    }
}
