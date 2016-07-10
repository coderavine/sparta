<?php
namespace Sparta;

/**
 * Class RuleParser
 *
 * @package Sparta
 * @author  Mohammed Ashour <ashoms0a@gmail.com>
 * @link    http://www.coderavine.com/
 */
class RuleParser extends RuleParsingSyntaxAware
{

    protected $data;
    /**
     * Validators bag
     *
     * @var array
     */
    protected $attributeValidatorsBag;

    /**
     * Rules Bag
     *
     * @var RulesBag
     */
    private $rulesBag;

    /**
     * Argument Parser
     *
     * @var ArgumentParser
     */
    private $argumentParser;

    /**
     * RuleParser constructor.
     *
     * @param array $data
     */
    public function __construct($data = [])
    {
        $this->rulesBag = new RulesBag();
        $this->argumentParser = new ArgumentParser($data);
        $this->argumentParser->setArgumentsDelimiter($this->getDefaultArgumentsDelimiter());
        $this->argumentParser->setKeyValueDelimiter($this->getDefaultArgumentKeyValueDelimiter());
        $this->setData($data);
    }

    /**
     * Parser the given validation rules and  generate the proper rules bag
     *
     * @param array $rulesList
     * @param bool $getRuleBags if set, an instance of RuleBag will be
     *                           returned to caller
     * @param bool $getRuleBags if set, an instance of RuleBag will be returned to caller
     *
     * @return bool|\Sparta\RulesBag
     */
    public function run($rulesList, $getRuleBags = true)
    {
        $rulesList = $this->normalizeRulesFormat($rulesList);
        foreach ($rulesList as $attribute => $rules) {

            $this->clearAttributeValidatorsBag();

            foreach ($rules as $rule) {
                $this->resolve($rule);
            }

            $this->rulesBag->add(
                $attribute,
                $this->getAttributeValidatorsBag()
            );
        }

        return ($getRuleBags) ? $this->rulesBag : true;
    }

    /**
     * Parse a given rule into a validator name and arguments list
     *
     * @param string $rule
     *
     * @return void
     */
    public function resolve($rule)
    {
        if (empty($rule) || !is_string($rule)) {
            return;
        }

        $arguments = null;
        $ruleSegments = explode($this->getDefaultValidatorArgumentsDelimiter(), $rule);
        $validatorName = $ruleSegments[0];
        if (isset($ruleSegments[1])) {
            $arguments = $this->parseArguments($ruleSegments[1]);
        }
        $this->addValidatorToBag($validatorName, $arguments);
    }

    /**
     * Parse given argument input into a proper format
     *
     * @param mixed $input
     *
     * @return array
     */
    public function parseArguments($input)
    {
        $this->argumentParser->run($input);

        return $this->argumentParser->all();
    }

    /**
     * @return \Sparta\RulesBag
     */
    public function getRulesBag()
    {
        return $this->rulesBag;
    }

    /**
     * Add a validator to validators bag
     *
     * @param string $name
     * @param mixed $arguments
     */
    protected function addValidatorToBag($name, $arguments = null)
    {
        if (!isset($this->attributeValidatorsBag[$name])) {
            $validator = new ValidationElement();
            $validator->setName($this->normalizeName($name));
            $validator->setArguments($arguments);
            $this->attributeValidatorsBag[$name] = $validator;
        }
    }

    /**
     * Get attribute's validator bag
     *
     * @return array
     */
    public function getAttributeValidatorsBag()
    {
        return (!empty($this->attributeValidatorsBag)) ? $this->attributeValidatorsBag : null;
    }

    /**
     * Clear current attribute's validators bag
     *
     * @return void
     */
    public function clearAttributeValidatorsBag()
    {
        $this->attributeValidatorsBag = [];
    }

    /**
     * Generate a list of all rules to be run.
     *
     * @param $rules
     *
     * @return array a list of all rules to be run
     */
    protected function normalizeRulesFormat($rules)
    {
        $rulesList = [];

        foreach ($rules as $attribute => $rulesString) {
            if (!is_array($rulesString)) {
                $validatorsList = explode($this->getDefaultRulesDelimiter(), $rulesString);
            } else {
                $validatorsList = $rulesString;
            }
            $rulesList[$attribute] = $validatorsList;
        }

        return $rulesList;
    }

    /**
     * Get validator class name
     *
     * @param $name
     *
     * @return string
     */
    public function normalizeName($name)
    {
        $name = ucwords(str_replace('_', ' ', $name));

        return str_replace(' ', '', $name);
    }

    /**
     * @return mixed
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * @param mixed $data
     */
    public function setData($data)
    {
        $this->data = $data;
    }
}
