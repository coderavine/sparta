<?php
use Mockery as m;
use Sparta\Exceptions\ClassNotFoundException;
<<<<<<< HEAD
use Sparta\Exceptions\InvalidValidatorException;
=======
use Sparta\Exceptions\MethodNotFoundException;
>>>>>>> origin/master
use Sparta\ValidatorFactory;

/**
 * Class ValidatorFactoryTest.php
 *
 * @package ${NAMESPACE}
 * @author  Mohammed Ashour <ashoms0a@gmail.com>
 * @link    http://www.coderavine.com/
 */
class ValidatorFactoryTest extends PHPUnit_Framework_TestCase
{
    protected $translator;

    public function setUp()
    {
        $this->translator = m::mock('Sparta\\Translator');
        $this->translator->shouldReceive('load');
        $this->translator->shouldReceive('get')->atLeast(1);
    }

    /**
     * @throws ClassNotFoundException
     * @throws \Sparta\MethodNotFoundException
     */
    public function testCreateValidatorInstance()
    {
        $factory = new ValidatorFactory($this->translator);
        $this->assertInstanceOf(\Sparta\Validators\NotEmpty::class, $factory->createInstance('NotEmpty', [], []));
    }

    /**
     *
     */
    public function testGetDefaultNamespace()
    {
        $factory = new ValidatorFactory($this->translator);
        $this->assertEquals('Sparta\\Validators\\', $factory->getNamespace());
    }

    /**
     *
     */
    public function testSetGetNamespace()
    {
        $factory = new ValidatorFactory($this->translator);
        $this->assertEquals('Sparta\\Validators\\', $factory->getNamespace());
        $factory->setNamespace('New\\Namespace\\');
        $this->assertEquals('New\\Namespace\\', $factory->getNamespace());
    }

    /**
     *
     */
    public function testSetGetTranslatorInstance()
    {
        $factory = new ValidatorFactory(null);
        $factory->setTranslator($this->translator);
        $this->assertInstanceOf('Sparta\\Translator', $factory->getTranslator());
    }

    /**
     * @expectedException Sparta\Exceptions\ClassNotFoundException
     */
    public function testInvalidValidatorClassThrowException()
    {
        $this->expectException(ClassNotFoundException::class);
        $factory = new ValidatorFactory($this->translator);
        $factory->createInstance('FakeValidator', [1]);
    }

    /**
     * @throws \Sparta\Exceptions\ClassNotFoundException
<<<<<<< HEAD
     * @throws \Sparta\Exceptions\InvalidValidatorException
     */
    public function testCreatingInvalidValidatorClassThrowsException()
    {
        $this->expectException(InvalidValidatorException::class);
        $factory = new ValidatorFactory($this->translator);
        $factory->createInstance(TestInvalidValidatorClass::class, []);
=======
     * @throws \Sparta\Exceptions\MethodNotFoundException
     */
    public function testCreatingInvalidValidatorClassThrowsException()
    {
//        $this->expectException(MethodNotFoundException::class);
//        $factory = new ValidatorFactory($this->translator);
//        $factory->setNamespace('\\');
//        $factory->createInstance(TestInvalidValidatorClass::class, []);
>>>>>>> origin/master
    }
}
