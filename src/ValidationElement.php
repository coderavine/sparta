<?php
namespace Sparta;

/**
 * Class Rule
 *
 * @package Sparta
 * @author  Mohammed Ashour <ashoms0a@gmail.com>
 * @link    http://www.coderavine.com/
 */
class ValidationElement
{

    /**
     * Validator name
     *
     * @var string
     */
    protected $name;

    /**
     * Validator's arguments list
     *
     * @var array
     */
    protected $arguments;

    /**
     * Validation Element constructor.
     *
     * @param string $name
     * @param null   $arguments
     */
    public function __construct($name = '', $arguments = null)
    {
        $this->name = $name;
        $this->arguments = $arguments;
    }

    /**
     * Get validator's arguments
     *
     * @return mixed
     */
    public function getArguments()
    {
        return $this->arguments;
    }

    /**
     * Set the validator's arguments
     *
     * @param mixed $arguments
     *
     * @return void
     */
    public function setArguments($arguments)
    {
        $this->arguments = $arguments;
    }

    /**
     * Get validator's name
     *
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set the validator name
     *
     * @param mixed $name
     *
     * @return void
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * Check if the current validator has arguments
     *
     * @return bool
     */
    public function hasArguments()
    {
        return (count($this->arguments)) ? true : false;
    }
}
