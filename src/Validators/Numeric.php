<?php
namespace Sparta\Validators;

/**
 * Validation Class
 *
 * @package Sparta
 * @author  Mohammed Ashour <ashoms0a@gmail.com>
 * @link    http://www.coderavine.com/
 */
class Numeric extends AbstractValidator
{

    /**
     * @var string
     */
    protected $classMessage = [
        'INVALID_NUMERIC' => 'Input is not considered as a valid numeric.',
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
        if (!is_numeric($input)) {
            $this->errors[] = sprintf($this->message('INVALID_NUMERIC'));
            return false;
        }
        return true;
    }
}
