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

    /**
     * @var string
     */
    protected $validatorFile = __DIR__ . '/../../../src/Validators/Foo.php';
    /**
     * @var string
     */
    protected $validatorTestFile = __DIR__ . '/../../Validators/FooTest.php';
        
    public function testExecuteGenerateValidatorCommand()
    {
        $application = new Application();
        $application->add(new MakeValidatorCommand());

        $command = $application->find('generate:validator');
        $commandTester = new CommandTester($command);
        $commandTester->execute([
            'command' => $command->getName(),
            'name' => 'Foo',

            '--with-unit-.php_cs' => true,

        ]);
        $this->assertRegExp('/Foo/', $commandTester->getDisplay());
    }


    /**
     *
     */

    protected function tearDown()
    {
        if (file_exists($this->validatorFile)) {
            unlink($this->validatorFile);
        }


        if (file_exists($this->validatorTestFile)) {
            unlink($this->validatorTestFile);
        }
    }




    protected function setUp()
    {
        if (file_exists($this->validatorFile)) {
            unlink($this->validatorFile);
        }

        if (file_exists($this->validatorTestFile)) {
            unlink($this->validatorTestFile);
        }

    }
}
