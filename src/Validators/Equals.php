<?php
namespace Sparta\Validators;

use Sparta\Exceptions\InvalidValidatorArguments;

/**
 * Class Equals
 *
 * @package Sparta\Validators
 * @author  Mohammed Ashour <ashoms0a@gmail.com>
 * @link    http://www.coderavine.com/
 */
class Equals extends AbstractValidator
{
    /**
     * Error messages
     *
     * @var string
     */
    protected $classMessage = [
        'NOT_EQUAL' => '%s does not equal to %s',
        'MISSING_COMPARE_VALUE' => 'Value to compare with is missing',
    ];

    /**
     * Equals constructor.
     *
     * @param array $options
     *
     */
    public function __construct($options = [])
    {
        $options = $this->normalizeArguments($options);

        if (array_key_exists('to', $options)) {
            $this->setTo($options['to']);
        } elseif (!empty($options)) {
            $this->setTo(array_shift($options));
        }
    }

    /**
     * @param mixed $input
     *
     * @return bool|void
     *
     * @throws InvalidValidatorArguments
     */
    public function isValid($input)
    {
        if (empty($this->getTo())) {
            throw new InvalidValidatorArguments($this->message('MISSING_COMPARE_VALUE'));
        }

        if ($input <> $this->getTo()) {
            $this->errors[] = sprintf(
                $this->message('NOT_EQUAL'), $input, $this->getTo()
            );
            return false;
        }

        return true;
    }

    /**
     * Set the value to compare input to
     *
     * @return mixed
     */
    public function getTo()
    {
        return (isset($this->options['to'])) ? $this->options['to'] : null;
    }

    /**
     * Get the value used in the comparison
     *
     * @param mixed $to
     */
    public function setTo($to)
    {
        $this->options['to'] = $to;
    }


}
