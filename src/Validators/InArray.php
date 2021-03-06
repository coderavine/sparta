<?php

namespace Sparta\Validators;

use Sparta\Exceptions\InvalidValidatorArguments;

/**
 * Validation Class.
 *
 * @author  Mohammed Ashour <ashoms0a@gmail.com>
 *
 * @link    http://www.coderavine.com/
 */
class InArray extends AbstractValidator
{
    /**
     * @var string
     */
    protected $message = '';

    /**
     * @var string
     */
    protected $classMessage = [
        'invalid_data' => '%s should be one of the values [%s]',
    ];

    /**
     * Ip validator constructor.
     *
     * @param array $options
     */
    public function __construct($options = [])
    {
        $options = $this->normalizeArguments($options);

        if (array_key_exists('haystack', $options)) {
            $this->setHaystack($options['haystack']);
        } elseif (!empty($options)) {
            $haystack = $options;
            $options = array_shift($options);
            if (is_array($options)) {
                $this->setHaystack($options);
            } else {
                $this->setHaystack($haystack);
            }
        }
    }

    /**
     * Set Haystack.
     *
     * @param $haystack
     */
    public function setHaystack($haystack)
    {
        $this->options['haystack'] = $haystack;
    }

    /**
     * Get Haystack.
     *
     * @return array $haystack
     */
    public function getHaystack()
    {
        return (isset($this->options['haystack'])) ? $this->options['haystack'] : null;
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
        if (!is_array($this->getHaystack())) {
            throw  new InvalidValidatorArguments(
                $this->message('missing_arguments')
            );
        }

        if (!in_array($input, $this->getHaystack(), true)) {
            $this->errors[] = sprintf($this->message('invalid_data'), $input, implode($this->getHaystack()));

            return false;
        }

        return true;
    }
}
