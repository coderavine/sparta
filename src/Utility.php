<?php

namespace Sparta;

/**
 * Class Utility.
 *
 * @author  Mohammed Ashour <ashoms0a@gmail.com>
 *
 * @link    http://www.coderavine.com/
 */
class Utility
{
    /**
     * Get the provided string length.
     *
     * @param string $value
     * @param string $encoding
     *
     * @return bool|int
     */
    public static function stringLength($value, $encoding = 'UTF-8')
    {
        if (!is_string($value) || empty($value)) {
            return false;
        } elseif (function_exists('mb_strlen')) {
            return mb_strlen($value, $encoding);
        }

        return strlen($value);
    }
}
