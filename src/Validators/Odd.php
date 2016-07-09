<?php
namespace Sparta\Validators;

class Odd extends AbstractValidator
{

    /**
     * Class error messages
     *
     * @var string
     */
    protected $classMessage = [
        'INVALID_ODD' => 'Given input is not an odd number',
    ];

    /**
     * Odd constructor.
     *
     * @param array $options validator options
     */
    public function __construct($options = [])
    {
        // Handle validator arguments over here
    }


    /**
     * Validate given input
     *
     * @param mixed $input
     *
     * @return bool
     */
    public function isValid($input)
    {
        if (!is_integer($input) || empty($input) || ($input % 2) == 0) {
            $this->errors[] = $this->message('INVALID_ODD');
            return false;
        }

        return true;
    }
}
