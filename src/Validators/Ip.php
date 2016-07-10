<?php
namespace Sparta\Validators;

/**
 * Validation Class
 *
 * @package Sparta
 * @author  Mohammed Ashour <ashoms0a@gmail.com>
 * @link    http://www.coderavine.com/
 */
class Ip extends AbstractValidator
{
    /**
     * @var string
     */
    protected $classMessage = [
        'INVALID_IP' => '%s is not considered as a valid IP address.',
    ];

    /**
     * Validate if the given input is a valid IP address
     *
     * @param mixed $input
     *
     * @return bool
     */
    public function isValid($input)
    {
        if (!filter_var($input, FILTER_VALIDATE_IP)) {
            $this->errors[] = sprintf($this->message('INVALID_IP'), $input);
            return false;
        }
        return true;
    }

}
