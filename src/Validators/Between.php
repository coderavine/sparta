<?php
namespace Sparta\Validators;

use Sparta\Exceptions\InvalidValidatorArguments;

/**
 * Class Between
 *
 * @package Sparta\Validators
 * @author  Mohammed Ashour <ashoms0a@gmail.com>
 * @link    http://www.coderavine.com/
 */
class Between extends AbstractValidator
{
    const INCLUSIVE = true;

    /**
     * Error messages
     *
     * @var string
     */
    protected $classMessage = [
        'MISSING_ARGUMENTS' => 'Both min & max have to be provided.',
        'OUT_OF_RANGE' => '%s does not fall between %d and %d.',
    ];

    /**
     * Between constructor.
     *
     * @param array $options
     *
     */
    public function __construct($options = [])
    {
        $options = $this->normalizeArguments($options);

        if (array_key_exists('min', $options)) {
            $this->options['min'] = $options['min'];
        } else {
            $this->options['min'] = array_shift($options);
        }

        if (array_key_exists('max', $options)) {
            $this->options['max'] = $options['max'];
        } else {
            if (!empty($options)) {
                $this->options['max'] = array_shift($options);
            }
        }

        //TODO: fix the issue when passing both min and max with keys
        if (array_key_exists('inclusive', $options)) {
            $this->options['inclusive'] = $options['inclusive'];
        } else {
            if (!empty($options)) {
                $this->options['inclusive'] = array_shift($options);
            }
        }

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
        if (!isset($this->options['min']) || !isset($this->options['max'])) {
            throw new InvalidValidatorArguments(
                $this->message('MISSING_ARGUMENTS')
            );
        }

        if ($this->getInclusive() == true) {
            if ($input < $this->getMin() || $input > $this->getMax()) {
                $this->errors[] = sprintf(
                    $this->message('OUT_OF_RANGE'), $input, $this->getMin(), $this->getMax()
                );
                return false;
            }
        } else {
            if ($input <= $this->getMin() || $input >= $this->getMax()) {
                $this->errors[] = sprintf(
                    $this->message('OUT_OF_RANGE'), $input, $this->getMin(), $this->getMax()
                );
                return false;
            }
        }

        return true;
    }

    /**
     * @param mixed $min
     */
    public function setMin($min)
    {
        $this->options['min'] = $min;
    }

    /**
     * @param mixed $max
     */
    public function setMax($max)
    {
        $this->options['max'] = $max;
    }

    /**
     * Get minimum value
     *
     * @return int
     */
    public function getMin()
    {
        return (isset($this->options['min'])) ? $this->options['min'] : null;
    }

    /**
     * Get maximum value
     *
     * @return int
     */
    public function getMax()
    {
        return (isset($this->options['max'])) ? $this->options['max'] : null;
    }

    /**
     * @return mixed
     */
    public function getInclusive()
    {
        return $this->options['inclusive'];
    }

    /**
     * @param mixed $inclusive
     */
    public function setInclusive($inclusive)
    {
        $this->options['inclusive'] = $inclusive;
    }

}
