<?php
namespace Sparta\Validators;

/**
 * Class Required
 *
 * @package Sparta\Validators
 * @author  Mohammed Ashour <ashoms0a@gmail.com>
 * @link    http://www.coderavine.com/
 */
class Required extends AbstractValidator
{

    /**
     * Class error messages
     *
     * @var string
     */
    protected $classMessage = [
        'MISSING_REQUIRED_INPUT' => 'Attribute is required and cannot be empty.',
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
        if (empty($input)) {
            $this->errors[] = sprintf($this->message('MISSING_REQUIRED_INPUT'));
            return false;
        }

        return true;
    }
}
