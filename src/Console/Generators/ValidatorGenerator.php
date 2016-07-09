<?php
namespace Sparta\Console\Generators;

use RuntimeException;

/**
 * Class ValidatorGenerator
 *
 * @package Sparta\Generators
 * @author  Mohammed Ashour <ashoms0a@gmail.com>
 * @link    http://www.coderavine.com/
 */
class ValidatorGenerator
{
    /**
     * Validators namespace
     */
    const VALIDATORS_NAMESPACE = 'Sparta\\Validators';

    /**
     * Generate the new validator class
     *
     * @param $validatorName
     * @param $option
     */
    public function generate($validatorName, $option)
    {
        $validatorFileName = 'src/Validators/' . $validatorName . '.php';
        $templateFile = 'src/Console/Generators/templates/validator.template';

        if (null != $option) {
            $testValidatorFileName = 'tests/Validators/' . $validatorName . 'Test.php';
            $testTemplateFile = 'src/Console/Generators/templates/testValidator.template';
        }

        if (isset($validatorFileName) && file_exists($validatorFileName)) {
            throw new RuntimeException(sprintf('Validator "%s" already exists', $validatorName));
        }

        if (isset($testValidatorFileName) && file_exists($testValidatorFileName)) {
            throw new RuntimeException(sprintf('Test file for validator "%s" already exists', $validatorName));
        }

        $parameters = [
            'namespace' => self::VALIDATORS_NAMESPACE,
            'validator' => $validatorName,
        ];

        $this->renderFile($templateFile, $validatorFileName, $parameters);
        if (null != $option) {
            $this->renderFile($testTemplateFile, $testValidatorFileName, $parameters);
        }

    }

    /**
     * Render validator/validator test template
     *
     * @param $template
     * @param $target
     * @param $parameters
     *
     * @return int
     */
    public function renderFile($template, $target, $parameters)
    {
        if (!is_dir(dirname($target))) {
            mkdir(dirname($target), 0777, true);
        }

        return file_put_contents($target, $this->render($template, $parameters));
    }

    /**
     * Generate the new validator class and its test class
     *
     * @param $template
     * @param $parameters
     *
     * @return string
     */
    protected function render($template, $parameters)
    {
        $fileContent = file_get_contents($template);
        if (!empty($fileContent)) {
            $fileContent = str_ireplace('%DummyNamespace%', $parameters['namespace'], $fileContent);
            $fileContent = str_ireplace('%DummyValidator%', $parameters['validator'], $fileContent);
        }
        return $fileContent;
    }
}
