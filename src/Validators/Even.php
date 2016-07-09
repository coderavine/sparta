<?php
namespace Sparta\Validators;

class Even extends AbstractValidator
{

    /**
     * Class error messages
     *
     * @var string
     */
    protected $classMessage = [
        'INVALID_EVEN' => 'The given value is not an even number.',
    ];

    /**
     * Even constructor.
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
        if (!is_integer($input) || empty($input) || ($input % 2) != 0) {
            $this->errors[] = $this->message('INVALID_EVEN');
            return false;
        }

        return true;
    }
}
