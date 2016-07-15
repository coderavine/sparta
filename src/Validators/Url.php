<?php

namespace Sparta\Validators;

/**
 * Validation Class.
 *
 * @author  Mohammed Ashour <ashoms0a@gmail.com>
 *
 * @link    http://www.coderavine.com/
 */
class Url extends AbstractValidator
{
    /**
     * @var string
     */
    protected $classMessage = [
        'invalid_url' => '%s is not considered as a valid URL',
    ];

    /**
     * Check to see if the given input is a valid Url.
     *
     * @param mixed $input
     *
     * @return bool
     */
    public function isValid($input)
    {
        if (!filter_var($input, FILTER_VALIDATE_URL)) {
            $this->errors[] = sprintf($this->message('invalid_url'), $input);

            return false;
        }

        return true;
    }
}
