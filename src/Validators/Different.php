<?php
namespace Sparta\Validators;

/**
 * Different Class
 *
 * This validator will make sure that the given field is different from
 * another provider field
 *
 * @package  Sparta\Validators
 * @author  Mohammed Ashour <ashoms0a@gmail.com>
 * @link    http://www.coderavine.com/
 */
class Different extends AbstractValidator
{

    /**
     * Class error messages
     *
     * @var string
     */
    protected $classMessage = [
        'invalid_data' => 'The two fields are not different',
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
        if ($input == $this->getFom()) {
            $this->errors[] = $this->message('invalid_data');

            return false;
        }

        return true;
    }

    /**
     * Set the field to be compared with the input
     *
     * @param $from
     */
    public function setFrom($from)
    {
        $this->options['from'] = $from;
    }

    /**
     * Get the field to be compared with the main input
     *
     * @return null
     */
    public function getFom()
    {
        return (isset($this->options['from'])) ? $this->options['from'] : null;
    }
}
