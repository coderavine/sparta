<?php
use Mockery as m;
use Sparta\Exceptions\ClassNotFoundException;
use Sparta\Exceptions\InvalidValidatorException;
use Sparta\ValidatorFactory;

/**
 * Class ValidatorFactoryTest.php
 *
 * @package Sparta
 * @author  Mohammed Ashour <ashoms0a@gmail.com>
 * @link    http://www.coderavine.com/
 */
class ValidatorFactoryTest extends PHPUnit_Framework_TestCase
{
    /**
     * Translator instance
     *
     * @var \Sparta\Translator
     */
    protected $translator;

    /**
     * Setup test environment
     */
    public function setUp()
    {
        $this->translator = m::mock('Sparta\\Translator');
        $this->translator->shouldReceive('load');
        $this->translator->shouldReceive('get')->atLeast(1);
    }

    /**
     * Test basic behavior
     */
    public function testCreateValidatorInstance()
    {
        $factory = new ValidatorFactory($this->translator);
        $this->assertInstanceOf(\Sparta\Validators\NotEmpty::class, $factory->createInstance('NotEmpty', [], []));
    }

    /**
     * Ensure that factory can get default namespace
     */
    public function testGetDefaultNamespace()
    {
        $factory = new ValidatorFactory($this->translator);
        $this->assertEquals('Sparta\\Validators\\', $factory->getNamespace());
    }

    /**
     * Ensure that factory can set namespace
     */
    public function testSetGetNamespace()
    {
        $factory = new ValidatorFactory($this->translator);
        $this->assertEquals('Sparta\\Validators\\', $factory->getNamespace());
        $factory->setNamespace('New\\Namespace\\');
        $this->assertEquals('New\\Namespace\\', $factory->getNamespace());
    }

    /**
     * Ensure that we can get an instance of translator
     */
    public function testSetGetTranslatorInstance()
    {
        $factory = new ValidatorFactory(null);
        $factory->setTranslator($this->translator);
        $this->assertInstanceOf('Sparta\\Translator', $factory->getTranslator());
    }

    /**
     * Ensure that factory will throw an exception if we try to create an instance
     * of invalid validator
     *
     * @expectedException Sparta\Exceptions\ClassNotFoundException
     */
    public function testInvalidValidatorClassThrowException()
    {
        $this->expectException(ClassNotFoundException::class);
        $factory = new ValidatorFactory($this->translator);
        $factory->createInstance('FakeValidator', [1]);
    }

    /**
     * Ensure that factory throws exception when the passed class is not
     * an instance of the validator interface
     */
    public function testCreatingAnObjectFromClassThatIsNotValidValidatorThrowsException()
    {
        $this->expectException(InvalidValidatorException::class);
        $factory = new ValidatorFactory($this->translator);
        $factory->createInstance(TestInvalidValidatorClass::class, []);
    }
}
