<?php

namespace Sparta\Validators;

/**
 * Validation Class.
 *
 * @author  Mohammed Ashour <ashoms0a@gmail.com>
 *
 * @link    http://www.coderavine.com/
 */
class Email extends AbstractValidator
{
    /**
     * @var string
     */
    protected $classMessage = [
        'invalid_data' => '%s is not a valid email.',
    ];

    /**
     * Validate if the given input is a valid email address.
     *
     * @param $input
     *
     * @return bool
     */
    public function isValid($input)
    {
        if (!filter_var($input, FILTER_VALIDATE_EMAIL)) {
            $this->errors[] = sprintf($this->message('invalid_data'), $input);

            return false;
        }

        return true;
    }
}
