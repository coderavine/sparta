<?php

namespace Sparta\Validators;

/**
 * Accepted Class.
 *
 * @author  Mohammed Ashour <ashoms0a@gmail.com>
 *
 * @link    http://www.coderavine.com/
 */
class Accepted extends AbstractValidator
{
    /**
     * List of allowed values.
     *
     * @var array
     */
    protected $allowedValues = ['yes', 'on', '1', 1, true, 'true'];

    /**
     * Class error messages.
     *
     * @var string
     */
    protected $classMessage = [
        'invalid_data' => '%s is not a valid value',
    ];

    /**
     * Validate given input.
     *
     * @param mixed $input
     *
     * @return bool
     */
    public function isValid($input)
    {
        if (!in_array($input, $this->allowedValues, true)) {
            $this->errors[] = sprintf(
                $this->message('invalid_data'), is_numeric($input) ? (string) $input : $input
            );

            return false;
        }

        return true;
    }
}
