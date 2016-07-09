<?php
use Sparta\Console\Commands\MakeValidatorCommand;
use Symfony\Component\Console\Application;
use Symfony\Component\Console\Tester\CommandTester;

/**
 * Class MakeValidatorCommandTest.php
 *
 * @package ${NAMESPACE}
 * @author  Mohammed Ashour <ashoms0a@gmail.com>
 * @link    http://www.coderavine.com/
 */
class MakeValidatorCommandTest extends PHPUnit_Framework_TestCase
{
<<<<<<< HEAD
    /**
     * @var string
     */
    protected $validatorFile = __DIR__ . '/../../../src/Validators/Foo.php';
    /**
     * @var string
     */
    protected $validatorTestFile = __DIR__ . '/../../Validators/FooTest.php';

    /**
     *
     */
=======
    protected $validatorFile = __DIR__ . '/../../../src/Validators/Foo.php';

>>>>>>> origin/master
    public function testExecuteGenerateValidatorCommand()
    {
        $application = new Application();
        $application->add(new MakeValidatorCommand());

        $command = $application->find('generate:validator');
        $commandTester = new CommandTester($command);
        $commandTester->execute([
            'command' => $command->getName(),
            'name' => 'Foo',
<<<<<<< HEAD
            '--with-unit-test' => true,
=======
>>>>>>> origin/master
        ]);
        $this->assertRegExp('/Foo/', $commandTester->getDisplay());
    }

<<<<<<< HEAD
    /**
     *
     */
=======
>>>>>>> origin/master
    protected function tearDown()
    {
        if (file_exists($this->validatorFile)) {
            unlink($this->validatorFile);
        }
<<<<<<< HEAD

        if (file_exists($this->validatorTestFile)) {
            unlink($this->validatorTestFile);
        }
    }

    /**
     *
     */
=======
    }

>>>>>>> origin/master
    protected function setUp()
    {
        if (file_exists($this->validatorFile)) {
            unlink($this->validatorFile);
        }
<<<<<<< HEAD
        if (file_exists($this->validatorTestFile)) {
            unlink($this->validatorTestFile);
        }
=======
>>>>>>> origin/master
    }
}
