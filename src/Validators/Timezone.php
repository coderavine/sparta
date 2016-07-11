<?php
namespace Sparta\Validators;

/**
 * Timezone Class
 *
 * The field under validation must be a valid timezone identifier according
 * to the timezone_identifiers_list PHP function.
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
        'YOUR_MESSAGE_KEY' => 'your message content',
    ];

    /**
     * Timezone constructor.
     *
     * @param array $options validator options
     */
    public function __construct($options = [])
    {
        // Handle validator arguments over here
    }


    /**
     * Validate given input
     *
     * @param mixed $input
     *
     * @return bool
     */
    public function isValid($input)
    {
        try {
            new \DateTimeZone($input);
        } catch (\Exception $e) {
            return false;
        }

        return true;
    }
}
