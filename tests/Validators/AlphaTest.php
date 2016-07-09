<?php

use Sparta\Validators\Alpha;

/**
 * Validation Class
 *
 * @package Sparta
 * @author  Mohammed Ashour <ashoms0a@gmail.com>
 * @link    http://www.coderavine.com/
 */
class AlphaTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Validator instance
     *
     * @var Alpha
     */
    protected $validator;

    /**
     * Setup test environment
     */
    public function setUp()
    {
        $this->validator = new Alpha();
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

    public function testEnableWhitespaceViaConstructor()
    {
        $validator = new Alpha('enableWhitespace');
        $this->assertTrue($validator->isWhitespaceEnabled());

        $validator2 = new Alpha(['enableWhitespace' => true]);
        $this->assertTrue($validator2->isWhitespaceEnabled());
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
            ['This is a basic string with whitespace disbaled', false, false],
            ['thisisastringwithoutwhitespce', true, true],
            ['thisisastringwithoutwhitespce', false, true],
            ['This is a basic string with whitespace and number 12332y3287', true, false],
            ['thisisastringwithoutwhitespceandwithnumber232322', false, false],
            ['This is a basic string with whitespace and number 12332y3287', true, false],
            ['This is a basic string with whitespace', false, false],
        ];
    }
}
