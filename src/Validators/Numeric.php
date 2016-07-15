<?php

namespace Sparta\Validators;

/**
 * Validation Class.
 *
 * @author  Mohammed Ashour <ashoms0a@gmail.com>
 *
 * @link    http://www.coderavine.com/
 */
class Numeric extends AbstractValidator
{
    /**
     * @var string
     */
    protected $classMessage = [
        'invalid_data' => 'Input is not considered as a valid numeric.',
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
        if (!is_numeric($input)) {
            $this->errors[] = sprintf($this->message('invalid_data'));

            return false;
        }

        return true;
    }
}
