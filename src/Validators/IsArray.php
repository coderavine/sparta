<?php
namespace Sparta\Validators;


/**
 * Class IsArray
 *
 * @package Sparta\Validators
 * @author  Mohammed Ashour <ashoms0a@gmail.com>
 * @link    http://www.coderavine.com/
 */
class IsArray extends AbstractValidator
{
    /**
     * Class error messages
     *
     * @var string
     */
    protected $classMessage = [
        'INVALID_ARRAY' => '%s is not a valid array.',
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
        if (!is_array($input)) {
            $this->errors[] = sprintf($this->message('INVALID_ARRAY'), $input);
            return false;
        }

        return true;
    }
}
