<?php

namespace Sparta\Validators;

class Negative extends AbstractValidator
{
    /**
     * Class error messages.
     *
     * @var string
     */
    protected $classMessage = [
        'invalid_data' => 'The given input is not a valid negative number.',
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
        if (empty($input) || !is_numeric($input) || $input >= 0) {
            $this->errors[] = $this->message('invalid_data');

            return false;
        }

        return true;
    }
}
