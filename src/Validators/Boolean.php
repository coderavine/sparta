<?php
namespace Sparta\Validators;

/**
 * Validation Class
 *
 * @package Sparta
 * @author  Mohammed Ashour <ashoms0a@gmail.com>
 * @link    http://www.coderavine.com/
 */
class Boolean extends AbstractValidator
{
    /**
     * @var string
     */
    protected $classMessage = [
        'INVALID_BOOLEAN' => '%s is not a valid boolean.',
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
        $isBoolean = (is_bool($input)) ? true : false;
        if ($isBoolean == false) {
            $this->errors[] = sprintf($this->message('INVALID_BOOLEAN'), $input);
        }
        return $isBoolean;
    }
}
