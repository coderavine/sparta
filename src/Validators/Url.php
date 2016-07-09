<?php
namespace Sparta\Validators;

/**
 * Validation Class
 *
 * @package Sparta
 * @author  Mohammed Ashour <ashoms0a@gmail.com>
 * @link    http://www.coderavine.com/
 */
class Url extends AbstractValidator
{
    /**
     * @var string
     */
    protected $classMessage = [
        'INVALID_URL' => '%s is not considered as a valid URL',
    ];

    /**
     * Check to see if the given input is a valid Url
     *
     * @param mixed $input
     *
     * @return boolean
     */
    public function isValid($input)
    {
        if (!filter_var($input, FILTER_VALIDATE_URL)) {
            $this->errors[] = sprintf($this->message('INVALID_URL'), $input);
            return false;
        }
        return true;
    }
}
