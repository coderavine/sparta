<?php
namespace Sparta\Validators;

/**
 * Validation Class
 *
 * @package Sparta
 * @author  Mohammed Ashour <ashoms0a@gmail.com>
 * @link    http://www.coderavine.com/
 */
class FloatNumber extends AbstractValidator
{

    /**
     * @var string
     */
    protected $classMessage = [
        'INVALID_FLOAT' => '%s is not a valid float.',
    ];


    /**
     * Validate given data.
     *
     * @param mixed $input
     *
     * @return boolean
     */
    public function isValid($input)
    {
        if (!is_float($input)) {
            $this->errors[] = sprintf($this->message('INVALID_FLOAT'), $input);
            return false;
        }
        return true;
    }
}
