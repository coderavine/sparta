<?php

namespace Sparta;

use Sparta\Exceptions\ClassNotFoundException;
use Sparta\Exceptions\InvalidValidatorException;
use Sparta\Exceptions\MissingParameterException;

/**
 * Validation Class.
 *
 * @author  Mohammed Ashour <ashoms0a@gmail.com>
 *
 * @link    http://www.coderavine.com/
 */
class Validation
{
    /**
     * Validation rules.
     *
     * @var array
     */
    protected $rules = [];

    /**
     * List of validators object for each attribute.
     *
     * @var
     */
    protected $ruleObjects;

    /**
     * Validation error messages.
     *
     * @var array
     */
    protected $errors = [];

    /**
     * List of data to be validated.
     *
     * @var array
     */
    protected $data = [];

    /**
     * Flag to indicate if validation has failed.
     *
     * @var bool
     */
    protected $failedValidation;

    /**
     * Translator instance.
     *
     * @var Translator
     */
    protected $translator = [];

    /**
     * Validator Factory.
     *
     * @var
     */
    protected $validatorFactory;

    /**
     * Validator constructor.
     *
     * @param array      $data       data to be validated
     * @param array      $rules      validation rules to be applied on the provided data
     * @param Translator $translator
     */
    public function __construct($data = [], $rules = [], $translator = null)
    {
        $this->setRules($rules);
        $this->setData($data);
        $this->setTranslationInstance($translator);
        $this->validatorFactory = new ValidatorFactory($this->getTranslator());
    }

    /**
     * Run validation rules and determine if we have valid data.
     *
     * @return bool validation result
     *
     * @throws \Sparta\Exceptions\MissingParameterException
     */
    public function isValid()
    {
        // Reset current validation status
        $this->failedValidation = false;

        // We must have both data and rules to proceed with validation
        if (empty($this->getData()) || empty($this->getRules())) {
            throw new MissingParameterException(
                $this->translator->get('rule_parser_missing_parameter')
            );
        }

        // If the rules bag has nothing, there is no need to continue
        $rulesBag = $this->getRulesBag();

        // Run attributes validation rules
        foreach ($rulesBag->attributes() as $attribute) {
            if ($rulesBag->hasRulesFor($attribute) && $this->attributeValueExistsInData($attribute)) {
                $this->runAttributeValidators($attribute, $rulesBag->getRuleFor($attribute));
            }
        }

        return $this->fails();
    }

    /**
     * Run validators list for a given attribute.
     *
     * @param string $attribute
     * @param array  $rules
     *
     * @throws \Sparta\Exceptions\InvalidValidatorException
     * @throws \Sparta\Exceptions\MethodNotFoundException
     */
    public function runAttributeValidators($attribute, $rules)
    {
        // Process list of validators for the given attribute
        foreach ($rules as $validator) {

            // Does the validator have arguments? if yes, get them
            $arguments = ($validator->hasArguments()) ? $validator->getArguments() : [];

            try {
                $validatorInstance = $this->validatorFactory->createInstance(
                    $validator->getName(),
                    $arguments
                );
            } catch (ClassNotFoundException $e) {
                throw new InvalidValidatorException(
                    sprintf($this->translator->get('invalid_validator'), $validator->getName())
                );
            } catch (InvalidValidatorException $e) {
                throw new InvalidValidatorException(
                    sprintf($this->translator->get('invalid_validator'), $validator->getName())
                );
            }

            if (!call_user_func([$validatorInstance, 'isValid'], $this->field($attribute))) {
                $this->collectAttributeErrors($attribute, $validatorInstance->errors());
                $this->failedValidation = true;
            }
        }
    }

    /**
     * Check if validation has failed or not.
     *
     * @return bool
     */
    public function fails()
    {
        return ($this->failedValidation) ? false : true;
    }

    /**
     * Check if the given attribute has value in the provided user's inputs.
     *
     * @param string $attribute
     *
     * @return bool
     */
    public function attributeValueExistsInData($attribute)
    {
        if (!array_key_exists($attribute, $this->data)) {
            return false;
        }

        return true;
    }

    /**
     * Get the value of a given field from provided user's inputs list.
     *
     * @param string $key     attribute key
     * @param mixed  $default default value to be returned if no value has been found
     *
     * @return mixed
     */
    public function field($key, $default = null)
    {
        if (empty($this->data) || !is_array($this->data)) {
            return;
        }

        if (array_key_exists($key, $this->data)) {
            return $this->data[$key];
        }

        return $default;
    }

    /**
     * Set rules list.
     *
     * @param array $rules
     */
    public function setRules($rules)
    {
        $this->rules = $rules;
    }

    /**
     * Get rules list.
     *
     * @return array
     */
    public function getRules()
    {
        return $this->rules;
    }

    /**
     * Get a list of validation error messages.
     *
     * @return mixed
     */
    public function getErrors()
    {
        return $this->errors;
    }

    /**
     * Get rules list.
     *
     * @return array
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * Get a list of validation error messages.
     *
     * @param $data
     *
     * @return mixed
     */
    public function setData($data)
    {
        $this->data = $data;
    }

    /**
     * Collect attribute errors.
     *
     * @param string $attribute attribute key/name
     * @param array  $errors
     */
    protected function collectAttributeErrors($attribute, $errors)
    {
        if (empty($errors)) {
            return;
        }

        if (isset($this->errors[$attribute])) {
            $this->errors[$attribute] = array_merge($this->errors[$attribute], $errors);
        } else {
            $this->errors[$attribute] = $errors;
        }
    }

    /**
     * Set the application translation instance.
     *
     * @param $translator
     */
    public function setTranslationInstance($translator)
    {
        if (is_null($translator)) {
            $this->translator = new Translator(__DIR__.'/lang/');
        } else {
            $this->translator = $translator;
        }
        $this->translator->load();
    }

    /**
     * Get translator.
     *
     * @return \Sparta\Translator
     */
    public function getTranslator()
    {
        return $this->translator;
    }

    /**
     * Get an instance of our rules bag which has all validation information.
     *
     * @return RulesBag
     */
    public function getRulesBag()
    {
        $ruleParser = new RuleParser($this->data);
        $ruleParser->run($this->rules);

        return $ruleParser->getRulesBag();
    }
}
