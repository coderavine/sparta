<?php
namespace Sparta\Validators;

use Sparta\Exceptions\InvalidValidatorArguments;

/**
 * Callback Class
 *
 * @package  Sparta\Validators
 * @author  Mohammed Ashour <ashoms0a@gmail.com>
 * @link    http://www.coderavine.com/
 */
class Callback extends AbstractValidator
{

    /**
     * Class error messages
     *
     * @var string
     */
    protected $classMessage = [
        'invalid_data' => 'given data is not valid',
    ];

    /**
     * Callback constructor.
     *
     * @param array $options validator options
     *
     * @throws InvalidValidatorArguments
     */
    public function __construct($options = null)
    {
        if (is_callable($options)) {
            $this->options = ['callback' => $options];
        } else {
            throw new InvalidValidatorArguments('No callback given');
        }
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
        $callback = $this->options['callback'];
        $args = $this->normalizeArguments($input);
        try {
            if (!call_user_func_array($callback, $args)) {
                return false;
            }
        } catch (\Exception $e) {
            return false;
        }

        return true;
    }
}
