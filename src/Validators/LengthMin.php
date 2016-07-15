<?php

namespace Sparta\Validators;

use Sparta\Exceptions\InvalidValidatorArguments;
use Sparta\Utility;

/**
 * Class Min.
 *
 * @author  Mohammed Ashour <ashoms0a@gmail.com>
 *
 * @link    http://www.coderavine.com/
 */
class LengthMin extends Length
{
    /**
     * Error messages.
     *
     * @var string
     */
    protected $classMessage = [
        'invalid_data' => 'The length of the provided input %d should be more than specified length %d.',
    ];

    public function __construct($options = [])
    {
        parent::__construct($options);
    }

    /**
     * Ensure that given input comply with the specified rule.
     *
     * @param mixed $input
     *
     * @return bool
     *
     * @throws InvalidValidatorArguments
     */
    public function isValid($input)
    {
        if (empty($this->getLength())) {
            throw new InvalidValidatorArguments(
                $this->message('missing_arguments')
            );
        }

        $length = Utility::stringLength($input, $this->getEncoding());
        if ($length < $this->getLength()) {
            $this->errors[] = sprintf(
                $this->message('invalid_data'), $length, $this->getLength()
            );

            return false;
        }

        return true;
    }
}
