<?php

namespace Sparta\Validators;

use DateTime;

/**
 * Validation Class.
 *
 * @author  Mohammed Ashour <ashoms0a@gmail.com>
 *
 * @link    http://www.coderavine.com/
 */
class Date extends AbstractValidator
{
    /**
     * Default format that will be used when nothing has
     * been specified yet.
     *
     * @var string
     */
    const DEFAULT_FORMAT = 'Y-m-d';

    /**
     * @var string
     */
    protected $classMessage = [
        'invalid_data' => '%s does not seem to be a valid date',
    ];

    /**
     * Date constructor.
     *
     * @param array $options
     */
    public function __construct($options = [])
    {
        $options = $this->normalizeArguments($options);

        if (array_key_exists('format', $options)) {
            $this->setFormat($options['format']);
        } elseif (!empty($options)) {
            $this->setFormat(array_shift($options));
        }
    }

    /**
     * Set date format.
     *
     * @param string $format
     */
    public function setFormat($format)
    {
        $this->options['format'] = $format;
    }

    /**
     * Get date format.
     *
     * @return string
     */
    public function getFormat()
    {
        return (empty($this->options['format'])) ? self::DEFAULT_FORMAT : $this->options['format'];
    }

    /**
     * Validate given data.
     *
     * @param mixed $input
     *
     * @return bool
     */
    public function isValid($input)
    {
        if ($input instanceof DateTime) {
            return true;
        }

        $date = DateTime::createFromFormat($this->getFormat(), $input);
        $errors = DateTime::getLastErrors();
        if ($errors['warning_count'] > 0 || $errors['error_count'] > 0) {
            $this->errors[] = sprintf($this->message('invalid_data'), $input, $this->getFormat());

            return false;
        }

        return true;
    }
}
