<?php

namespace Sparta\Validators;

/**
 * Validation Class.
 *
 * @author  Mohammed Ashour <ashoms0a@gmail.com>
 *
 * @link    http://www.coderavine.com/
 */
class Integer extends AbstractValidator
{
    /**
     * @var string
     */
    protected $classMessage = [
        'invalid_data' => '%s is not a valid integer',
    ];

    /**
     * Validate if the given input is a valid integer.
     *
     * @param $input
     *
     * @return bool
     */
    public function isValid($input)
    {
        if (!is_integer($input)) {
            $this->errors[] = sprintf($this->message('invalid_data'), $input);

            return false;
        }

        return true;
    }
}
