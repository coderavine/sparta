<?php
namespace Sparta\Validators;

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
        'YOUR_MESSAGE_KEY' => 'your message content',
    ];

    /**
     * Callback constructor.
     *
     * @param array $options validator options
     */
    public function __construct($options = [])
    {
        if (is_callable($options)) {
            $this->options = ['callback' => $options];
        }
    }


    /**
     * Validate given input
     *
     * @param mixed $input
     * @return bool
     * @throws \Exception
     */
    public function isValid($input)
    {
        $callback = $this->options['callback'];
        if (empty($callback)) {
            throw new \Exception('No callback given');
        }
        $args = [$input];

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
