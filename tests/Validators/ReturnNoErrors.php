<?php
/**
 * Class ReturnNoErrors.php
 *
 * @package Validators
 * @author  Mohammed Ashour <ashoms0a@gmail.com>
 * @link    http://www.coderavine.com/
 */

namespace Sparta\Validators;


class ReturnNoErrors extends AbstractValidator
{

    /**
     * Validate given data.
     *
     * @param mixed $input
     *
     * @return bool
     */
    public function isValid($input)
    {
        return false;
    }
}
