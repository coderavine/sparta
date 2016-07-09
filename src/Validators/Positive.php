<?php
namespace Sparta\Validators;

class Positive extends AbstractValidator
{

    /**
     * Class error messages
     *
     * @var string
     */
    protected $classMessage = [
        'INVALID_POSITIVE' => 'The input is not a positive number',
    ];

    /**
     * Positive constructor.
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

        if (empty($input) || !is_numeric($input) || $input < 0) {
            $this->errors[] = $this->message('INVALID_POSITIVE');
            return false;
        }

        return true;
    }
}
