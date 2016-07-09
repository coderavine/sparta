<?php
namespace Sparta\Validators;

use Sparta\Exceptions\InvalidValidatorArguments;

/**
 * Contains Class
 *
 * @package Sparta
 * @author  Mohammed Ashour <ashoms0a@gmail.com>
 * @link    http://www.coderavine.com/
 */
class Contains extends AbstractValidator
{

    /**
     * Class error messages
     *
     * @var string
     */
    protected $classMessage = [
        'MISSING_NEEDLE' => 'Please provide the data to look for.',
        'NEEDLE_NOT_FOUND' => '%s does not contain %s'
    ];

    /**
     * Contains constructor.
     *
     * @param array $options
     *
     */
    public function __construct($options = [])
    {
        $options = $this->normalizeArguments($options);

        if (array_key_exists('needle', $options)) {
            $this->options['needle'] = $options['needle'];
        } else {
            $this->options['needle'] = array_shift($options);
        }
    }

    /**
     * Set the value to look for in provided input
     *
     * @param $containValue
     */
    public function setNeedle($containValue)
    {
        $this->options['needle'] = $containValue;
    }

    /**
     * Get needle
     *
     * @return mixed
     */
    public function getNeedle()
    {
        return (isset($this->options['needle'])) ? $this->options['needle'] : null;
    }

    /**
     * Validate given data.
     *
     * @param mixed $input
     *
     * @return boolean
     *
     * @throws \Sparta\Exceptions\InvalidValidatorArguments
     */
    public function isValid($input)
    {
        if (!isset($this->options['needle'])) {
            throw new InvalidValidatorArguments(
                $this->message('MISSING_ARGUMENTS')
            );
        }

        if (is_array($input)) {
            return in_array($this->getNeedle(), $input);
        }

        if (mb_stripos($input, $this->getNeedle(), 0, mb_detect_encoding($input, null, true))) {
            return true;
        }

        $this->errors[] = sprintf($this->message('NEEDLE_NOT_FOUND'), $input, $this->getNeedle());
        return false;
    }
}
