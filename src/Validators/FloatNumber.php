<?php

namespace Sparta\Validators;

/**
 * Validation Class.
 *
 * @author  Mohammed Ashour <ashoms0a@gmail.com>
 *
 * @link    http://www.coderavine.com/
 */
class FloatNumber extends AbstractValidator
{
    /**
     * @var string
     */
    protected $classMessage = [
        'invalid_data' => '%s is not a valid float.',
    ];

    /**
     * Validate given data.
     *
     * @param mixed $input
     *
     * @return bool
     */
    public function isValid($input)
    {
        if (!is_float($input)) {
            $this->errors[] = sprintf($this->message('invalid_data'), $input);

            return false;
        }

        return true;
    }
}
