<?php
namespace Sparta\Validators;

/**
 * Validation Class
 *
 * @package Sparta
 * @author  Mohammed Ashour <ashoms0a@gmail.com>
 * @link    http://www.coderavine.com/
 */
class Integer extends AbstractValidator
{

    /**
     * @var string
     */
    protected $classMessage = [
        'INVALID_INTEGER' => '%s is not a valid integer',
        'INVALID_INTEGER_RANGE' => '%s can be only between %d and $d',
    ];

    /**
     * Validate if the given input is a valid integer.
     *
     * @param $input
     *
     * @return bool
     */
    public function isValid($input)
    {
        if (!is_integer($input)) {
            $this->errors[] = sprintf($this->message('INVALID_INTEGER'), $input);
            return false;
        }

        return true;
    }
}
