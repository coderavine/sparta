<?php

namespace Sparta\Validators;

class Odd extends AbstractValidator
{
    /**
     * Class error messages.
     *
     * @var string
     */
    protected $classMessage = [
        'invalid_data' => 'Given input is not an odd number',
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
        if (!is_integer($input) || empty($input) || ($input % 2) == 0) {
            $this->errors[] = $this->message('invalid_data');

            return false;
        }

        return true;
    }
}
