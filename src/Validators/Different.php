<?php
namespace Sparta\Validators;

/**
 * Different Class
 *
 * @package  Sparta\Validators
 * @author  Mohammed Ashour <ashoms0a@gmail.com>
 * @link    http://www.coderavine.com/
 */
/**
 * Class Different
 * @package Sparta\Validators
 */
class Different extends AbstractValidator
{

    /**
     * Class error messages
     *
     * @var string
     */
    protected $classMessage = [
        'INVALID_DATA' => 'The two fields are not different',
    ];

    /**
     * Different constructor.
     *
     * @param array $options validator options
     */
    public function __construct($options = [])
    {
        $options = $this->normalizeArguments($options);

        if (array_key_exists('from', $options)) {
            $this->options['from'] = $options['from'];
        } else {
            $this->options['from'] = array_shift($options);
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
        if ($input <> $this->getFom()) {
            $this->errors[] = $this->message('INVALID_DATA');

            return false;
        }

        return true;
    }

    /**
     * @param $from
     */
    public function setFrom($from)
    {
        $this->options['from'] = $from;
    }

    /**
     * @return null
     */
    public function getFom()
    {
        return (isset($this->options['from'])) ? $this->options['from'] : null;
    }
}
