<?php
namespace Sparta;

use Sparta\Exceptions\MissingParameterException;

/**
 * Class Argument
 *
 * @package Sparta
 * @author  Mohammed Ashour <ashoms0a@gmail.com>
 * @link    http://www.coderavine.com/
 */
class ArgumentParser
{
    /**
     * Default arguments delimiter
     */
    const DEFAULT_ARGUMENTS_DELIMITER = ',';

    /**
     * Default argument Key/Value delimiter
     */
    const DEFAULT_KEY_VALUE_DELIMITER = '=';

    /**
     * Arguments list
     *
     * @var array
     */
    private $arguments = [];

    /**
     * Arguments delimiter
     *
     * @var string
     */
    private $argumentsDelimiter;

    /**
     * Argument Key/Value delimiter
     *
     * @var
     */
    private $keyValueDelimiter;

    /**
     * Run parser on given input
     *
     * @param mixed $input
     *
     * @throws MissingParameterException
     */
    public function run($input)
    {
        if (empty($input)) {
            throw new MissingParameterException('No argument string has been provided to parse');
        }
        $this->clearArguments();
        $arguments = explode($this->getArgumentsDelimiter(), $input);
        if (is_array($arguments)) {
            foreach ($arguments as $argument) {
                $this->add($argument);
            }
        }
    }

    /**
     * Add argument key/value to the arguments list
     *
     * @param $input
     */
    private function add($input)
    {
        $key = null;
        $value = null;
        $segments = explode($this->getKeyValueDelimiter(), $input);
        $key = $segments[0];
        if (isset($segments[1])) {
            $value = $segments[1];
        }
        if (!is_null($value)) {
            $this->arguments[$key] = $value;
        } else {
            $this->arguments[] = $key;
        }
    }

    /**
     * Set argument key/value delimiter
     *
     * @param string $delimiter
     */
    public function setKeyValueDelimiter($delimiter)
    {
        $this->keyValueDelimiter = $delimiter;
    }

    /**
     * Get argument key/value delimiter
     *
     * @return string
     */
    public function getKeyValueDelimiter()
    {
        return (empty($this->keyValueDelimiter)) ? self::DEFAULT_KEY_VALUE_DELIMITER : $this->keyValueDelimiter;
    }

    /**
     * Set arguments delimiter
     *
     * @param string $delimiter
     */
    public function setArgumentsDelimiter($delimiter)
    {
        $this->argumentsDelimiter = $delimiter;
    }

    /**
     * Get arguments delimiter
     *
     * @return mixed
     */
    public function getArgumentsDelimiter()
    {
        return (empty($this->argumentsDelimiter)) ? self::DEFAULT_ARGUMENTS_DELIMITER : $this->argumentsDelimiter;
    }

    /**
     * Clear arguments list by setting it to an empty array
     */
    protected function clearArguments()
    {
        $this->arguments = [];
    }

    /**
     * Get all arguments
     *
     * @return array
     */
    public function all()
    {
        return $this->arguments;
    }

    /**
     * @param $key
     *
     * @return mixed|null
     */
    public function get($key)
    {
        if ($this->has($key)) {
            return $this->arguments[$key];
        }
        return null;
    }

    /**
     * @param $key
     *
     * @return bool
     */
    public function has($key)
    {
        if (array_key_exists($key, $this->arguments)) {
            return true;
        }
        return false;
    }

    /**
     * Get total number of arguments
     *
     * @return int
     */
    public function count()
    {
        return count($this->arguments);
    }

}
