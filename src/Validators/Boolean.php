<?php

namespace Sparta\Validators;

/**
 * Validation Class.
 *
 * @author  Mohammed Ashour <ashoms0a@gmail.com>
 *
 * @link    http://www.coderavine.com/
 */
class Boolean extends AbstractValidator
{
    /**
     * @var string
     */
    protected $classMessage = [
        'invalid_data' => '%s is not a valid boolean.',
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
        $isBoolean = (is_bool($input)) ? true : false;
        if ($isBoolean == false) {
            $this->errors[] = sprintf($this->message('invalid_data'), $input);
        }

        return $isBoolean;
    }
}
