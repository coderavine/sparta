<?php
namespace Sparta\Validators;

/**
 * Class AlphaNum
 *
 * @package Sparta\Validators
 * @author  Mohammed Ashour <ashoms0a@gmail.com>
 * @link    http://www.coderavine.com/
 */
class AlphaNum extends AbstractValidator
{
    /**
     * @var string
     */
    protected $classMessage = [
        'INVALID_ALPHA_NUM' => '%s should only contain numbers and alphabetic characters.',
    ];

    /**
     * AlphaNum constructor.
     *
     * @param array $options
     */
    public function __construct($options = [])
    {
        $options = $this->normalizeArguments($options);

        if (array_key_exists('enableWhitespace', $options)) {
            $this->enableWhitespace();
        } elseif (!empty($options)) {
            if (array_shift($options) == 'enableWhitespace') {
                $this->enableWhitespace();
            }
        }
    }

    /**
     * Check if the given input is a valid string.
     *
     * @param $input
     *
     * @return boolean
     */
    public function isValid($input)
    {
        if (!preg_match($this->getPattern(), $input)) {
            $this->errors[] = sprintf($this->message('INVALID_ALPHA_NUM'), $input);
            return false;
        }
        return true;
    }


    /**
     * Enable whitespace
     */
    public function enableWhitespace()
    {
        $this->options['enableWhitespace'] = true;
    }

    /**
     * Is whitespace enabled
     *
     * @return bool
     */
    public function isWhitespaceEnabled()
    {
        return (isset($this->options['enableWhitespace'])) ? true : false;
    }

    /**
     * Get validation pattern
     *
     * @return string
     */
    protected function getPattern()
    {
        $pattern = '/^([a-zA-Z0-9';
        if ($this->isWhitespaceEnabled()) {
            $pattern .= '\s';
        }
        $pattern .= '])+$/i';

        return $pattern;
    }
}
