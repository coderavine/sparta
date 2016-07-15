<?php

namespace Sparta\Validators;

/**
 * Validation Class.
 *
 * @author  Mohammed Ashour <ashoms0a@gmail.com>
 *
 * @link    http://www.coderavine.com/
 */
class NotEmpty extends AbstractValidator
{
    /**
     * @var string
     */
    protected $classMessage = [
        'invalid_data' => 'Input is required and cannot be empty',
    ];

    /**
     * Return true of the given input is not empty, otherwise false.
     *
     * @param $input
     *
     * @return bool
     */
    public function isValid($input)
    {
        if (empty($input)) {
            $this->errors[] = $this->message('invalid_data');

            return false;
        }

        return true;
    }
}
