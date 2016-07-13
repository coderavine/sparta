<?php
namespace Sparta\Validators;

/**
 * Timezone Class
 *
 * This class will validate if the given field  is  a valid timezone
 * identifier according to the timezone_identifiers_list PHP function.
 *
 * @package  Sparta\Validators
 * @author  Mohammed Ashour <ashoms0a@gmail.com>
 * @link    http://www.coderavine.com/
 */
class Timezone extends AbstractValidator
{

    /**
     * Class error messages
     *
     * @var string
     */
    protected $classMessage = [
        'invalid_timezone' => '%s is not a valid timezone',
    ];


    /**
     * Validate given input
     *
     * @param mixed $input
     *
     * @return bool
     */
    public function isValid($input)
    {
        //This throws Exception if the timezone supplied is not recognised
        // as a valid timezone
        try {
            new \DateTimeZone($input);
        } catch (\Exception $e) {
            $this->errors[] = sprintf($this->message('invalid_timezone'), $input);
            return false;
        }

        return true;
    }
}
