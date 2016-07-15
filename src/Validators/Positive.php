<?php

namespace Sparta\Validators;

class Positive extends AbstractValidator
{
    /**
     * Class error messages.
     *
     * @var string
     */
    protected $classMessage = [
        'invalid_data' => 'The input is not a positive number',
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
        if (empty($input) || !is_numeric($input) || $input < 0) {
            $this->errors[] = $this->message('invalid_data');

            return false;
        }

        return true;
    }
}
