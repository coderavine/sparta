<?php

namespace Sparta\Validators;

use Sparta\Exceptions\InvalidValidatorArguments;

/**
 * Class IsInstanceOf.
 *
 * @author  Mohammed Ashour <ashoms0a@gmail.com>
 *
 * @link    http://www.coderavine.com/
 */
class IsInstanceOf extends AbstractValidator
{
    /**
     * Class error messages.
     *
     * @var string
     */
    protected $classMessage = [
        'invalid_data' => '%s in not an instance of %s',
    ];

    /**
     * IsInstanceOf constructor.
     *
     * @param array $options
     */
    public function __construct($options = [])
    {
        $options = $this->normalizeArguments($options);

        if (array_key_exists('class', $options)) {
            $this->setClass($options['class']);
        } elseif (!empty($options)) {
            $this->setClass(array_shift($options));
        }
    }

    /**
     * Validate given data.
     *
     * @param mixed $input
     *
     * @return bool
     *
     * @throws \Sparta\Exceptions\InvalidValidatorArguments
     */
    public function isValid($input)
    {
        if (empty($this->getClass())) {
            throw new InvalidValidatorArguments($this->message('missing_arguments'));
        }

        if ($input instanceof $this->options['class']) {
            return true;
        }

        $this->errors[] = $this->message('invalid_data');

        return false;
    }

    /**
     * Get class name.
     *
     * @return mixed
     */
    public function getClass()
    {
        return (isset($this->options['class'])) ? $this->options['class'] : null;
    }

    /**
     * Set class name.
     *
     * @param mixed $class
     */
    public function setClass($class)
    {
        $this->options['class'] = $class;
    }
}
