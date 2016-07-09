<?php
namespace Sparta;

    /**
     * Class RuleParsingTrait.php
     *
     * @package Sparta
     * @author  Mohammed Ashour <ashoms0a@gmail.com>
     * @link    http://www.coderavine.com/
     */
/**
 * Class RuleParsingSyntaxAware
 *
 * @package Sparta
 * @author  Mohammed Ashour <ashoms0a@gmail.com>
 * @link    http://www.coderavine.com/
 */
Class RuleParsingSyntaxAware
{

    const DEFAULT_RULES_DELIMITER = '|';
    const DEFAULT_VALIDATOR_ARGUMENTS_DELIMITER = ':';
    const DEFAULT_ARGUMENTS_DELIMITER = ',';
    const DEFAULT_ARGUMENT_KEYVALUE_DELIMITER = '=';

    /**
     * @var
     */
    protected $delimitersOverrideFile;
    /**
     * @var
     */
    protected $overrides;
    /**
     * Default rule separator
     *
     * @var string
     */
    protected $defaultRulesDelimiter;

    /**
     * Default separator between validator and arguments list
     *
     * @var string
     */
    protected $defaultValidatorArgumentsDelimiter;

    /**
     * Default arguments separator
     *
     * @var string
     */
    protected $defaultArgumentsDelimiter;

    /**
     * Default arguments key/value separator
     *
     * @var string
     */
    protected $defaultArgumentKeyValueDelimiter;


    /**
     * Get arguments delimiter
     *
     * @return string
     */
    public function getDefaultArgumentsDelimiter()
    {
        return (empty($this->defaultArgumentsDelimiter)) ? self::DEFAULT_ARGUMENTS_DELIMITER : $this->defaultArgumentsDelimiter;
    }

    /**
     * Set arguments delimiter
     *
     * @param string $defaultArgumentsDelimiter
     *
     * @return void
     */
    public function setDefaultArgumentsDelimiter($defaultArgumentsDelimiter)
    {
        $this->defaultArgumentsDelimiter = $defaultArgumentsDelimiter;
    }

    /**
     * Get argument ke/value delimiter
     *
     * @return string
     */
    public function getDefaultArgumentKeyValueDelimiter()
    {
        return (empty($this->defaultArgumentKeyValueDelimiter)) ? self::DEFAULT_ARGUMENT_KEYVALUE_DELIMITER : $this->defaultArgumentKeyValueDelimiter;
    }

    /**
     * Set argument ke/value delimiter
     *
     * @param string $defaultArgumentKeyValueDelimiter
     *
     * @return void
     */
    public function setDefaultArgumentKeyValueDelimiter(
        $defaultArgumentKeyValueDelimiter
    ) {
        $this->defaultArgumentKeyValueDelimiter = $defaultArgumentKeyValueDelimiter;
    }

    /**
     * Get rules delimiter
     *
     * @return string
     */
    public function getDefaultRulesDelimiter()
    {
        return (empty($this->defaultRulesDelimiter)) ? self::DEFAULT_RULES_DELIMITER : $this->defaultRulesDelimiter;
    }

    /**
     * Set rule delimiter
     *
     * @param string $defaultRulesDelimiter
     *
     * @return void
     */
    public function setDefaultRulesDelimiter($defaultRulesDelimiter)
    {
        $this->defaultRulesDelimiter = $defaultRulesDelimiter;
    }

    /**
     * Get validator arguments delimiter
     *
     * @return string
     */
    public function getDefaultValidatorArgumentsDelimiter()
    {
        return (empty($this->defaultValidatorArgumentsDelimiter)) ? self::DEFAULT_VALIDATOR_ARGUMENTS_DELIMITER : $this->defaultValidatorArgumentsDelimiter;
    }

    /**
     * Set validator arguments delimiter
     *
     * @param string $defaultValidatorArgumentsDelimiter
     *
     * @return void
     */
    public function setDefaultValidatorArgumentsDelimiter($defaultValidatorArgumentsDelimiter)
    {
        $this->defaultValidatorArgumentsDelimiter = $defaultValidatorArgumentsDelimiter;
    }
}
