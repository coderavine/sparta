<?php

namespace Sparta\Validators;

use Sparta\Exceptions\InvalidValidatorArguments;
use Sparta\Utility;

/**
 * Validation Class.
 *
 * @author  Mohammed Ashour <ashoms0a@gmail.com>
 *
 * @link    http://www.coderavine.com/
 */
class Length extends AbstractValidator
{
    /**
     *
     */
    const DEFAULT_ENCODING = 'UTF-8';

    /**
     * @var string
     */
    protected $encoding;

    /**
     * Error messages.
     *
     * @var string
     */
    protected $classMessage = [
        'invalid_data' => 'The length of the provided input %d does not equal specified length %d.',
    ];

    /**
     * Length constructor.
     *
     * @param array $options
     */
    public function __construct($options = null)
    {
        $options = $this->normalizeArguments($options);

        if (isset($options['is'])) {
            $this->setLength($options['is']);
        } elseif (!empty($options)) {
            $this->setLength(array_shift($options));
        }
    }

    /**
     * Validate given data.
     *
     * @param mixed $input
     *
     * @return bool
     *
     * @throws \Sparta\Exceptions\InvalidValidatorArguments
     */
    public function isValid($input)
    {
        if (empty($this->getLength())) {
            throw new InvalidValidatorArguments(
                $this->message('missing_arguments')
            );
        }

        $length = Utility::stringLength($input, $this->getEncoding());
        if ($length == false || $length != $this->getLength()) {
            $this->errors[] = sprintf(
                $this->message('invalid_data'), $length, $this->getLength()
            );

            return false;
        }

        return true;
    }

    /**
     * @return mixed
     */
    public function getLength()
    {
        return (isset($this->options['is'])) ? $this->options['is'] : null;
    }

    /**
     * @param mixed $length
     */
    public function setLength($length)
    {
        $this->options['is'] = $length;
    }

    /**
     * Get character set encoding.
     *
     * @return string
     */
    public function getEncoding()
    {
        return (empty($this->options['encoding'])) ? self::DEFAULT_ENCODING : $this->options['encoding'];
    }

    /**
     * Set character set encoding.
     *
     * @param string $encoding
     */
    public function setEncoding($encoding)
    {
        $this->options['encoding'] = $encoding;
    }
}
