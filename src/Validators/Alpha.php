<?php

namespace Sparta\Validators;

/**
 * Class Alpha.
 *
 * @author  Mohammed Ashour <ashoms0a@gmail.com>
 *
 * @link    http://www.coderavine.com/
 */
class Alpha extends AbstractValidator
{
    /**
     * Allow whitespace.
     *
     * @var bool
     */
    protected $allowWhitespace = false;

    /**
     * Class error messages.
     *
     * @var string
     */
    protected $classMessage = [
        'invalid_data' => '%s is not a valid alphabetic string',
    ];

    /**
     * Alpha constructor.
     *
     * @param array $options
     */
    public function __construct($options = null)
    {
        $options = $this->normalizeArguments($options);

        if (array_key_exists('enableWhitespace', $options)) {
            $this->enableWhitespace();
        } else {
            if (array_shift($options) == 'enableWhitespace') {
                $this->enableWhitespace();
            }
        }
    }

    /**
     * Check if the given value is valid Alpha.
     *
     * @param mixed $input
     *
     * @return bool
     */
    public function isValid($input)
    {
        if (!preg_match($this->getPattern(), $input)) {
            $this->errors[] = sprintf($this->message('invalid_data'), $input);

            return false;
        }

        return true;
    }

    /**
     * Enable whitespace.
     */
    public function enableWhitespace()
    {
        $this->allowWhitespace = true;
    }

    /**
     * Is whitespace enabled.
     *
     * @return bool
     */
    public function isWhitespaceEnabled()
    {
        return ($this->allowWhitespace) ? true : false;
    }

    /**
     * Get validation pattern.
     *
     * @return string
     */
    protected function getPattern()
    {
        $pattern = '/^([a-zA-Z';
        if ($this->isWhitespaceEnabled()) {
            $pattern .= '\s';
        }
        $pattern .= '])+$/i';

        return $pattern;
    }
}
