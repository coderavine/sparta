<?php

namespace Sparta\Validators;

/**
 * Class AbstractValidator.
 *
 * @author  Mohammed Ashour <ashoms0a@gmail.com>
 *
 * @link    http://www.coderavine.com/
 */
abstract class AbstractValidator implements ValidatorInterface
{
    /**
     * Validation error messages.
     *
     * @var array
     */
    protected $errors = [];

    /**
     * Validation options.
     *
     * @var
     */
    protected $options;

    /**
     * Custom error messages.
     *
     * @var
     */
    protected $messages = [];

    /**
     * @var
     */
    protected $classMessage;

    /**
     * Validate given data.
     *
     * @param mixed $input
     *
     * @return bool
     */
    abstract public function isValid($input);

    /**
     * If validation failed, this should return the failure reason.
     *
     * @return array list of error messages
     */
    public function errors()
    {
        return $this->errors;
    }

    /**
     * Set your custom messages.
     *
     * @param array $messages
     */
    public function setMessages($messages = [])
    {
        $this->messages = $messages;
    }

    /**
     * Get error message by key.
     *
     * @param string $key
     *
     * @return mixed
     */
    public function message($key)
    {
        if (isset($this->messages) && array_key_exists($key, $this->messages)) {
            return $this->messages[$key];
        } elseif (array_key_exists($key, $this->classMessage)) {
            return $this->classMessage[$key];
        }

        return '';
    }

    /**
     * Create an array of arguments.
     *
     * @param string /array $options
     *
     * @return array
     */
    protected function normalizeArguments($options)
    {
        return (!is_array($options)) ? func_get_args() : $options;
    }
}
