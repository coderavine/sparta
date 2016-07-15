<?php
use Sparta\Validators\Regex;

/**
 * Regex Class
 *
 * @package Sparta
 * @author  Mohammed Ashour <ashoms0a@gmail.com>
 * @link    http://www.coderavine.com/
 */
class RegexTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @var Regex
     */
    public $validator;

    /**
     * Setup testing environment
     */
    public function setUp()
    {
        $this->validator = new Regex();
    }


    /**
     * Test validator Regex basic behavior
     *
     * @param $pattern
     * @param $input
     * @param $expected
     *
     * @dataProvider getRegexDataProvider
     */
    public function testBasicBehavior($pattern, $input, $expected)
    {
        $this->validator->setPattern($pattern);
        $this->assertEquals($expected, $this->validator->isValid($input));
    }

    /**
     * Ensure that regex format can be passed via validator constructor method
     *
     */
    public function testCanPassPatternToClassConstructor()
    {
        $validator = new Regex(['pattern' => '/\w{4}/']);
        $this->assertTrue($validator->isValid('nice'));
    }

    /**
     * Ensure that validator throws exception when regex pattern is missing
     *
     * @expectedException Sparta\Exceptions\InvalidValidatorArguments
     */
    public function testThatValidatorThrowsErrorWhenRegexPatternIsMissing()
    {
        $validator = new Regex();
        $validator->isValid('nice');
    }

    /**
     * Ensure that we can get and set pattern using setter/getter
     * methods
     */
    public function testSetGetPattern()
    {
        $this->assertNull($this->validator->getPattern());
        $this->validator->setPattern('/^[a-z]$/');
        $this->assertEquals('/^[a-z]$/', $this->validator->getPattern());
    }

    /**
     * Ensure that we get no error messages before running validation
     */
    public function testGetErrorMessagesBeforeRunningValidation()
    {
        $validator = new Regex();
        $this->assertEquals([], $validator->errors());
    }

    /**
     * Ensure that we get no error messages before running validation
     */
    public function testGetErrorMessagesAfterValidationFailure()
    {
        $validator = new Regex('/[0-9]/');
        $this->assertFalse($validator->isValid('string'));
        $this->assertCount(1, $validator->errors());
    }

    /**
     *
     */
    public function getRegexDataProvider()
    {
        return [
            ['/\d{3}[-.]?\d{3}[-.]?\d{4}/', '444-555-1234', true],
            ['/\w{4}/', 'beer', true],
            ['/test(er|ing|ed|s)?/', 'testing', true],
            ['/test(er|ing|ed|s)?/', 'random', false],
            ['/test(er|ing|ed|s)?/', [], false],
        ];
    }
}
