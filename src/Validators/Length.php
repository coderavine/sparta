<?php
namespace Sparta\Validators;

use Sparta\Exceptions\InvalidValidatorArguments;
use Sparta\Utility;

/**
 * Validation Class
 *
 * @package Sparta
 * @author  Mohammed Ashour <ashoms0a@gmail.com>
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
     * Error messages
     *
     * @var string
     */
    protected $classMessage = [
        'INVALID_LENGTH' => 'The length of the provided input %d does not equal specified length %d.',
        'MISSING_ARGUMENTS' => 'Length value has not been provided',
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
     * @return boolean
     *
     * @throws \Sparta\Exceptions\InvalidValidatorArguments
     */
    public function isValid($input)
    {
        if (empty($this->getLength())) {
            throw new InvalidValidatorArguments(
                $this->message('MISSING_ARGUMENTS')
            );
        }

        $length = Utility::stringLength($input, $this->getEncoding());
        if ($length == false || $length <> $this->getLength()) {
            $this->errors[] = sprintf(
                $this->message('INVALID_LENGTH'), $length, $this->getLength()
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
     * Get character set encoding
     *
     * @return string
     */
    public function getEncoding()
    {
        return (empty($this->options['encoding'])) ? self::DEFAULT_ENCODING : $this->options['encoding'];
    }

    /**
     * Set character set encoding
     *
     * @param string $encoding
     */
    public function setEncoding($encoding)
    {
        $this->options['encoding'] = $encoding;
    }
}
