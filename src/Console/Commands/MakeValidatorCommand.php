<?php

namespace Sparta\Console\Commands;

use Sparta\Console\Generators\ValidatorGenerator;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * MakeValidatorCommand Class.
 *
 * @author  Mohammed Ashour <ashoms0a@gmail.com>
 *
 * @link    http://www.coderavine.com/
 */
class MakeValidatorCommand extends Command
{
    /**
     * The console command name.
     * This command is used in order to create a new validator.
     *
     * @var string
     */
    protected $name = 'generate:validator';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new Validator class';

    /**
     * Command arguments list.
     *
     * @var array
     */
    protected $arguments = [
        [
            'name' => 'name',
            'description' => 'Name of validator class to create',
            'mode' => InputArgument::REQUIRED,
        ],
    ];

    /**
     * Command Options List.
     *
     * @var array
     */
    protected $options = [
        [
            'name' => 'with-unit-.php_cs',
            'description' => '',
            'mode' => InputOption::VALUE_NONE,
        ],
    ];

    /**
     * generate:validator command configurations.
     */
    protected function configure()
    {
        // Set command name & description
        $this->setName($this->name)
            ->setDescription($this->description);

        // Add the generate command arguments
        foreach ($this->arguments as $argument) {
            $this->addArgument(
                $argument['name'],
                $argument['mode'],
                $argument['description']
            );
        }

        // Add the generate command options
        foreach ($this->options as $option) {
            $this->addOption(
                $option['name'],
                null,
                $option['mode'],
                $option['description']
            );
        }
    }

    /**
     * Execute the command.
     *
     * @param InputInterface  $input
     * @param OutputInterface $output
     *
     * @return int|null|void
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        // Get the name and options of the new validator to be generated
        if (null === $input->getArgument('name')) {
            throw new \RuntimeException('The validator name must be provided.');
        }
        $name = $input->getArgument('name');
        $option = $input->getOption('with-unit-.php_cs');

        // Create the validator generator object passing to it the name & option
        $generator = new ValidatorGenerator();
        $generator->generate($name, $option);

        // Show the result in the console 
        $message = $name.' has been created successfully';
        $output->writeln('<info>'.$message.' </info>');
    }
}
