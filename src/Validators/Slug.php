<?php
namespace Sparta\Validators;

/**
 * Validation Class
 *
 * @package Sparta
 * @author  Mohammed Ashour <ashoms0a@gmail.com>
 * @link    http://www.coderavine.com/
 */

class Slug extends AbstractValidator
{
    const PATTERN = '/^([-a-z0-9_-])+$/i';


    /**
     * @var string
     */
    protected $classMessage = [
        'INVALID_SLUG' => '%s is not a valid slug.',
    ];

    /**
     * Validate if a given input is a valid slug
     *
     * @param mixed $input
     *
     * @return boolean
     */
    public function isValid($input)
    {
        if (!preg_match(self::PATTERN, $input)) {
            $this->errors[] = sprintf($this->message('INVALID_SLUG'), $input);
            return false;
        }
        return true;
    }
}
