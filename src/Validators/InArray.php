<?php
namespace Sparta\Validators;

use Sparta\Exceptions\InvalidValidatorArguments;

/**
 * Validation Class
 *
 * @package Sparta
 * @author  Mohammed Ashour <ashoms0a@gmail.com>
 * @link    http://www.coderavine.com/
 */
class InArray Extends AbstractValidator
{
    /**
     * @var string
     */
    protected $message = '';

    /**
     * @var string
     */
    protected $classMessage = [
        'INVALID_VALUE' => '%s should be one of the values [%s]',
        'INVALID_ARGUMENTS' => 'You need to provide the haystack',
    ];


    /**
     * Ip validator constructor.
     *
     * @param array $options
     *
     */
    public function __construct($options = [])
    {
        $options = $this->normalizeArguments($options);

        if (array_key_exists('haystack', $options)) {
            $this->setHaystack($options['haystack']);
        } elseif (!empty($options)) {
            $this->setHaystack($options);
        }
    }

    /**
     * Set Haystack
     *
     * @param $haystack
     */
    public function setHaystack($haystack)
    {
        $this->options['haystack'] = $haystack;
    }

    /**
     * Get Haystack
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
                $this->message('INVALID_ARGUMENTS')
            );
        }

        if (!in_array($input, $this->getHaystack())) {
            $this->errors[] = sprintf($this->message, $input, implode($this->getHaystack()));
            return false;
        }

        return true;
    }
}
