<?php

namespace Sparta\Validators;

/**
 * Class Required.
 *
 * @author  Mohammed Ashour <ashoms0a@gmail.com>
 *
 * @link    http://www.coderavine.com/
 */
class Required extends AbstractValidator
{
    /**
     * Class error messages.
     *
     * @var string
     */
    protected $classMessage = [
        'invalid_data' => 'Attribute is required and cannot be empty.',
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
        if (empty($input)) {
            $this->errors[] = sprintf($this->message('invalid_data'));

            return false;
        }

        return true;
    }
}
