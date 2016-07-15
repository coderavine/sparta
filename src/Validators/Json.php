<?php
/**
 * Class Json.php.
 *
 * @author  Mohammed Ashour <ashoms0a@gmail.com>
 *
 * @link    http://www.coderavine.com/
 */

namespace Sparta\Validators;

class Json extends AbstractValidator
{
    /**
     * Class error messages.
     *
     * @var string
     */
    protected $classMessage = [
        'invalid_data' => '%s is not considered as a valid Json',
    ];

    /**
     * Validate given data.
     *
     * @param mixed $input
     *
     * @return bool
     */
    public function isValid($input)
    {
        if (!is_string($input) || empty($input)) {
            $this->errors[] = sprintf($this->message('invalid_data'), $input);

            return false;
        }

        json_decode($input);
        if (json_last_error() === JSON_ERROR_NONE) {
            return true;
        } else {
            $this->errors[] = sprintf($this->message('invalid_data'), $input);

            return false;
        }
    }
}
