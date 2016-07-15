<?php

namespace Sparta\Validators;

/**
 * In Class.
 *
 * @author  Mohammed Ashour <ashoms0a@gmail.com>
 *
 * @link    http://www.coderavine.com/
 */
class In extends InArray
{
    /**
     * @var string
     */
    protected $classMessage = [
        'invalid_data' => '%s should be one of the values [%s]',
    ];
}
