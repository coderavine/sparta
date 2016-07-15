<?php

namespace Sparta;

/**
 * RuleParsingSyntaxAware Class.
 *
 * @author  Mohammed Ashour <ashoms0a@gmail.com>
 *
 * @link    http://www.coderavine.com/
 */
class RuleParsingSyntaxAware
{
    /**
     * Default rules delimiter.
     */
    const DEFAULT_RULES_DELIMITER = '|';

    /**
     * Default rule and arguments delimiter.
     */
    const DEFAULT_VALIDATOR_ARGUMENTS_DELIMITER = ':';

    /**
     * Default arguments delimiter.
     */
    const DEFAULT_ARGUMENTS_DELIMITER = ',';

    /**
     * Default argument key/value delimiter.
     */
    const DEFAULT_ARGUMENT_KEYVALUE_DELIMITER = '=';

    /**
     * Rule delimiter.
     *
     * @var string
     */
    protected $rulesDelimiter;

    /**
     *  Rule and Arguments delimiter.
     *
     * @var string
     */
    protected $validatorArgumentsDelimiter;

    /**
     *  Arguments delimiter.
     *
     * @var string
     */
    protected $argumentsDelimiter;

    /**
     * Arguments key/value separator.
     *
     * @var string
     */
    protected $argumentKeyValueDelimiter;

    /**
     * Get arguments delimiter.
     *
     * @return string
     */
    public function getArgumentsDelimiter()
    {
        return (empty($this->argumentsDelimiter)) ? self::DEFAULT_ARGUMENTS_DELIMITER : $this->argumentsDelimiter;
    }

    /**
     * Set arguments delimiter.
     *
     * @param string $argumentsDelimiter
     */
    public function setArgumentsDelimiter($argumentsDelimiter)
    {
        $this->argumentsDelimiter = $argumentsDelimiter;
    }

    /**
     * Get argument ke/value delimiter.
     *
     * @return string
     */
    public function getArgumentKeyValueDelimiter()
    {
        return (empty($this->argumentKeyValueDelimiter)) ? self::DEFAULT_ARGUMENT_KEYVALUE_DELIMITER : $this->argumentKeyValueDelimiter;
    }

    /**
     * Set argument ke/value delimiter.
     *
     * @param string $argumentKeyValueDelimiter
     */
    public function setArgumentKeyValueDelimiter(
        $argumentKeyValueDelimiter
    ) {
        $this->argumentKeyValueDelimiter = $argumentKeyValueDelimiter;
    }

    /**
     * Get rules delimiter.
     *
     * @return string
     */
    public function getRulesDelimiter()
    {
        return (empty($this->rulesDelimiter)) ? self::DEFAULT_RULES_DELIMITER : $this->rulesDelimiter;
    }

    /**
     * Set rule delimiter.
     *
     * @param string $rulesDelimiter
     */
    public function setRulesDelimiter($rulesDelimiter)
    {
        $this->rulesDelimiter = $rulesDelimiter;
    }

    /**
     * Get validator arguments delimiter.
     *
     * @return string
     */
    public function getValidatorArgumentsDelimiter()
    {
        return (empty($this->validatorArgumentsDelimiter)) ? self::DEFAULT_VALIDATOR_ARGUMENTS_DELIMITER : $this->validatorArgumentsDelimiter;
    }

    /**
     * Set validator arguments delimiter.
     *
     * @param string $validatorArgumentsDelimiter
     */
    public function setValidatorArgumentsDelimiter($validatorArgumentsDelimiter)
    {
        $this->validatorArgumentsDelimiter = $validatorArgumentsDelimiter;
    }
}
