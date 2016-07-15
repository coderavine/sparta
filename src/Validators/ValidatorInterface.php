<?php

namespace Sparta\Validators;

/**
 * Validation Class.
 *
 * @author  Mohammed Ashour <ashoms0a@gmail.com>
 *
 * @link    http://www.coderavine.com/
 */
interface ValidatorInterface
{
    /**
     * Validate given data.
     *
     * @param mixed $input
     *
     * @return
     */
    public function isValid($input);

    /**
     * If validation failed, this should return the reason.
     *
     * @return array list of error messages
     */
    public function errors();
}
