<?php

namespace Sparta\Validators;

/**
 * Validation Class.
 *
 * @author  Mohammed Ashour <ashoms0a@gmail.com>
 *
 * @link    http://www.coderavine.com/
 */
class Slug extends AbstractValidator
{
    const PATTERN = '/^([-a-z0-9_-])+$/i';

    /**
     * @var string
     */
    protected $classMessage = [
        'invalid_data' => '%s is not a valid slug.',
    ];

    /**
     * Validate if a given input is a valid slug.
     *
     * @param mixed $input
     *
     * @return bool
     */
    public function isValid($input)
    {
        if (!preg_match(self::PATTERN, $input)) {
            $this->errors[] = sprintf($this->message('invalid_data'), $input);

            return false;
        }

        return true;
    }
}
