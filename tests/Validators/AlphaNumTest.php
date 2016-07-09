<?php
use Sparta\Validators\AlphaNum;

/**
 * Validation Class
 *
 * @package Sparta
 * @author  Mohammed Ashour <ashoms0a@gmail.com>
 * @link    http://www.coderavine.com/
 */
class AlphaNumTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Validator instance
     *
     * @var AlphaNum
     */
    protected $validator;

    /**
     * Setup test environment
     */
    public function setUp()
    {
        $this->validator = new AlphaNum();
    }

    /**
     * Test for valid string
     *
     * @dataProvider getStringProvider
     *
     * @param $input
     * @param $allowWhitespace
     * @param $expected
     */
    public function testBasicBehavior($input, $allowWhitespace, $expected)
    {
        if ($allowWhitespace) {
            $this->validator->enableWhitespace();
        }

        $this->assertEquals($expected, $this->validator->isValid($input));
    }

    /**
     * Ensure that errors return an empty array when no validation is ran
     *
     * @return void
     */
    public function testGetDefaultErrorMessages()
    {
        $this->assertEquals([], $this->validator->errors());
    }

    /**
     * Ensure that errors return an array with error message list for failed validation
     *
     * @return void
     */
    public function testGetErrorMessages()
    {
        $this->validator->isValid('string with whitespace not allowed should fail by default');
        $this->assertCount(1, $this->validator->errors());
    }

    /**
     * Ensure that whitespace is disabled by default
     *
     * @return void
     */
    public function testWhitespaceDisabledByDefault()
    {
        $this->assertEquals(false, $this->validator->isWhitespaceEnabled());
    }

    public function testEnableWhitespaceViaConstructor()
    {
        $validator = new AlphaNum('enableWhitespace');
        $this->assertTrue($validator->isWhitespaceEnabled());

        $validator2 = new AlphaNum(['enableWhitespace' => true]);
        $this->assertTrue($validator2->isWhitespaceEnabled());
    }

    /**
     *  Test enabling whitespace
     *
     * @return void
     */
    public function testEnableWhitespace()
    {
        $this->assertFalse($this->validator->isWhitespaceEnabled());
        $this->validator->enableWhitespace();
        $this->assertTrue($this->validator->isWhitespaceEnabled());
    }

    /**
     * Ensure that we get no error messages before running validation
     */
    public function testGetEmptyErrorMessagesBeforeRunningValidation()
    {
        $validator = new AlphaNum();
        $this->assertEquals([], $validator->errors());
    }

    /**
     * Set test data
     *
     * @codeCoverageIgnore
     */
    public function getStringProvider()
    {
        return [
            ['This is a basic string with whitespace enabled', ['enableWhitespace' => true], true],
            ['This is a basic string with whitespace enabled', 'enableWhitespace', true],
            ['This is a basic string with whitespace enabled', true, true],
            ['thisisastringwithoutwhitespce', true, true],
            ['thisisastringwithoutwhitespce', false, true],
            ['This is a basic string with whitespace and number 12332y3287', true, true],
            ['thisisastringwithoutwhitespceandwithnumber232322', true, true],
            ['This is a basic string with whitespace and number 12332y3287', false, false],
            ['This is a basic string with whitespace', false, false],
            ['thisisastringwithoutwhitespce', false, true],
        ];
    }
}
