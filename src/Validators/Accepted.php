<?php
namespace Sparta\Validators;

/**
 * Accepted Class
 *
 * @package  Sparta\Validators
 * @author  Mohammed Ashour <ashoms0a@gmail.com>
 * @link    http://www.coderavine.com/
 */
/**
 * Class Accepted
 * @package Sparta\Validators
 */
class Accepted extends AbstractValidator
{

    /**
     * @var array
     */
    protected $allowedValues = ['yes', 'on', '1', 1, true, 'true'];

    /**
     * Class error messages
     *
     * @var string
     */
    protected $classMessage = [
        'INVALID_DATA' => '%s is not a valid value',
    ];

    /**
     * Validate given input
     *
     * @param mixed $input
     *
     * @return bool
     */
    public function isValid($input)
    {
        if (!in_array($input, $this->allowedValues, true)) {
            $this->errors[] = sprintf($this->message('INVALID_DATA'), $input);

            return false;
        }

        return true;
    }
}
