<?php
namespace Sparta\Validators;

/**
 * Regex Class
 *
 * @package  Sparta\Validators
 * @author  Mohammed Ashour <ashoms0a@gmail.com>
 * @link    http://www.coderavine.com/
 */
/**
 * Class Regex
 * @package Sparta\Validators
 */
class Regex extends AbstractValidator
{

    /**
     * Class error messages
     *
     * @var string
     */
    protected $classMessage = [
        'YOUR_MESSAGE_KEY' => 'your message content',
    ];

    /**
     * Regex constructor.
     *
     * @param array $options validator options
     */
    public function __construct($options = [])
    {
        $options = $this->normalizeArguments($options);

        if (array_key_exists('pattern', $options)) {
            $this->options['pattern'] = $options['pattern'];
        } else {
            $this->options['pattern'] = array_shift($options);
        }
    }


    /**
     * Validate given input
     *
     * @param mixed $input
     *
     * @return bool
     */
    public function isValid($input)
    {
        if (!is_string($input) && !is_numeric($input)) {
            return false;
        }

        if (!preg_match($this->getPattern(), $input)) {
            return false;
        }

        return true;
    }

    /**
     * @return null
     */
    public function getPattern()
    {
        return (isset($this->options['pattern'])) ? $this->options['pattern'] : null;
    }

    /**
     * @param $pattern
     */
    Public function setPattern($pattern)
    {
        $this->options['pattern'] = $pattern;
    }
}
