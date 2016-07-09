<?php
namespace Sparta;

use ReflectionClass;
use Sparta\Exceptions\ClassNotFoundException;
use Sparta\Exceptions\InvalidValidatorException;
use Sparta\Validators\ValidatorInterface;

/**
 * Class ValidatorFactory
 *
 * @package Sparta
 * @author  Mohammed Ashour <ashoms0a@gmail.com>
 * @link    http://www.coderavine.com/
 */
class ValidatorFactory
{
    /**
     * Default namespace used for loading all validators classes
     */
    const DEFAULT_NAMESPACE = 'Sparta\\Validators\\';

    /**
     * Validators namespace
     *
     * @var string
     */
    protected $namespace;

    /**
     * Reflection Object Instance
     *
     * @var ReflectionClass
     */
    protected $reflection;

    /**
     * An instance of application translator
     *
     * @var Translator
     */
    protected $translator;


    /**
     * ValidatorFactory constructor.
     *
     * @param null $translator
     */
    public function __construct($translator = null)
    {
        if (null != $translator) {
            $this->setTranslator($translator);
        }
    }

    /**
     * Create an instance of given validator
     *
     * @param string $validatorName
     * @param array  $arguments
     *
     * @return ValidatorInterface
     * @throws ClassNotFoundException
     * @throws InvalidValidatorException
     * @throws MethodNotFoundException
     */
    public function createInstance($validatorName, $arguments)
    {
        $validatorClassName = $this->getFullClassName($validatorName);
        if (!$this->assertIfClassExists($validatorClassName)) {
            throw new ClassNotFoundException(
                sprintf($this->translator->get('CLASS_NOT_FOUND'), $validatorName)
            );
        }

        $instance = $this->createValidatorInstance($validatorClassName, $arguments);

        if (!$instance instanceof ValidatorInterface) {
            throw new InvalidValidatorException(
                sprintf($this->translator->get('INVALID_VALIDATOR'), $validatorName));
        }

        $instance->setMessages($this->translator->get($validatorName));
        return $instance;
    }

    /**
     * @param $class
     *
     * @return string
     */
    protected function getFullClassName($class)
    {
        return $this->getNamespace() . ucfirst($class);
    }

    /**
     * Determine if a given class exists or not
     *
     * @param $class
     *
     * @return bool
     */
    protected function assertIfClassExists($class)
    {
        return (class_exists($class)) ? true : false;
    }

    /**
     * Set Translator instance
     *
     * @param Translator $translator
     */
    public function setTranslator($translator)
    {
        $this->translator = $translator;
    }

    /**
     * Set Translator instance
     *
     * @return Translator
     */
    public function getTranslator()
    {
        return $this->translator;
    }

    /**
     * Create a reflection class
     *
     * @param $className
     *
     * @return \ReflectionClass
     */
    protected function createReflectionClass($className)
    {
        return new ReflectionClass($className);
    }

    /**
     * Create an instance of the given validator and feed the required
     * information, such as options and messages, to it
     *
     * @param string $class
     * @param array  $arguments
     *
     * @return ValidatorInterface
     */
    protected function createValidatorInstance($class, $arguments)
    {
        $this->reflection = $this->createReflectionClass($class);
        if (!empty($arguments)) {
            $instance = $this->reflection->newInstanceArgs([$arguments]);
        } else {
            $instance = $this->reflection->newInstance();
        }

        return $instance;
    }

    /**
     * Get namespace
     *
     * @return string
     */
    public function getNamespace()
    {
        return (isset($this->namespace)) ? $this->namespace : self::DEFAULT_NAMESPACE;
    }

    /**
     * Set namespace
     *
     * @param string $namespace
     *
     * @return void
     */
    public function setNamespace($namespace)
    {
        $this->namespace = $namespace;
    }

}
