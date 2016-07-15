<?php
use Mockery as m;
use Sparta\Exceptions\InvalidValidatorException;
use Sparta\Exceptions\MissingParameterException;
use Sparta\Validation;

/**
 * Class ValidationTest.php
 *
 * @package Sparta
 * @author  Mohammed Ashour <ashoms0a@gmail.com>
 * @link    http://www.coderavine.com/
 */
class ValidationTest extends PHPUnit_Framework_TestCase
{

    /**
     * Ensure that validation object works as intended
     *
     * @dataProvider getDataProvider
     *
     * @param $data
     * @param $rules
     * @param $expected
     *
     * @throws \Sparta\Exceptions\MissingParameterException
     */
    public function testBasicBehavior($data, $rules, $expected)
    {
        $translator = m::mock('Sparta\\Translator');
        $translator->shouldReceive('load');
        $translator->shouldReceive('get')->atLeast(1);
        $validation = new Validation($data, $rules, $translator);

        $this->assertEquals($expected, $validation->isValid(),
            'failed value: ' . implode(',', $data));
    }

    /**
     * @throws \Sparta\Exceptions\MissingParameterException
     */
    public function testRunningValidationWithoutRuleOrDataMustReturnException()
    {
        $this->expectException(MissingParameterException::class);
        $validation = new Validation();
        $validation->isValid();
    }

    public function testRunningValidationWithNonExistedValidatorClassReturnException()
    {
        $this->expectException(InvalidValidatorException::class);
        $validation = new Validation(['name' => 'coderavine'], ['name' => 'nonexistedvalidator']);
        $validation->isValid();
    }

    public function testRunningValidationWithInvaliddValidatorClassReturnException()
    {
        $this->expectException(InvalidValidatorException::class);
        $validation = new Validation(['name' => 'coderavine'], ['name' => 'test_invalid_validator_class']);
        $validation->isValid();
    }

    /**
     * @throws \Sparta\Exceptions\MissingParameterException
     */
    public function testRunningValidationWithoutAttributeRulesReturnTrue()
    {
        $data = ['name' => 'coderavine', 'attribute_with_no_rule_should_return_true' => 'no_rules'];
        $rule = ['name' => 'alpha'];
        $validation = new Validation($data, $rule);
        $this->assertTrue($validation->isValid());
    }

    /**
     * Ensure that we can set validations rule using setter method
     */
    public function testSetRulesAfterValidationObjectCreatedViaSetterMethod()
    {
        $translator = m::mock('Sparta\\Translator');
        $translator->shouldReceive('load');
        $validation = new Validation([], null, $translator);
        $validation->setRules(['name' => 'alpha']);
        $this->assertEquals(['name' => 'alpha'], $validation->getRules());
    }

    public function testGettingFieldValueFromValidationData()
    {
        $validation = new Validation(['name' => 'coderavine'], ['name' => 'alpha']);
        $this->assertEquals('coderavine', $validation->field('name'));
        $this->assertEquals(null, $validation->field('invalid-key', null));

        $validation2 = new Validation([], ['name' => 'alpha']);
        $this->assertEquals(null, $validation2->field('name', null));
    }

    /**
     * @throws \Sparta\Exceptions\MissingParameterException
     */
    public function testGetErrorsMessagesAfterValidationFailureUsingGetterMethod()
    {
        $translator = m::mock('Sparta\\Translator');
        $translator->shouldReceive('load');
        $translator->shouldReceive('get')->atLeast(1)->with('Email')->andReturn(
            ['INVALID_EMAIL' => '%s is not a valid email.']
        );
        $validation = new Validation(['email' => 'invalid email'], ['email' => 'email'], $translator);
        $validation->isValid();
        $this->assertArrayHasKey('email', $validation->getErrors());
        $this->assertCount(1, $validation->getErrors());
    }

    public function testGetAttributeErrorsWhenValidatorReturnNoErrors()
    {
        $validation = new Validation(['name' => 'coderavine'], ['name' => 'return_no_errors']);
        $this->assertEquals(false, $validation->isValid());
    }

    /**
     * Prepare some .php_cs data for basic behavior .php_cs case
     *
     * @return array
     *
     * @codeCoverageIgnore
     */
    public function getDataProvider()
    {
        return [
            [
                'data' => ['email_address' => 'coderavine@gmail.com'],
                'rules' => ['email_address' => 'email'],
                'expected' => true,
            ],
            [
                'data' => ['username' => 'coderavine12 eewwewewewe'],
                'rules' => ['username' => 'alpha|length_max:is=10'],
                'expected' => false,
            ],
            [
                'data' => ['birthday' => 'not a valid date'],
                'rules' => ['birsthday' => 'date'],
                'expected' => true,
            ],
            [
                'data' => ['temperature' => -20],
                'rules' => ['temperature' => 'positive'],
                'expected' => false,
            ],
            [
                'data' => ['accepted' => true],
                'rules' => ['accepted' => 'boolean'],
                'expected' => true,
            ],
            [
                'data' => ['string_with_no_whitespace' => 'this is string with whitespace which should fail'],
                'rules' => ['string_with_no_whitespace' => 'alpha'],
                'expected' => false,
            ],
            [
                'data' => ['even_number' => 2],
                'rules' => ['even_number' => 'even'],
                'expected' => true,
            ],
            [
                'data' => ['ip_address' => '12.10.10.100'],
                'rules' => ['ip_address' => 'ip'],
                'expected' => true,
            ]
        ];
    }
}
