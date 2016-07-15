<?php
use Sparta\Validators\Timezone;

/**
 * Timezone Class
 *
 * @package Sparta
 * @author  Mohammed Ashour <ashoms0a@gmail.com>
 * @link    http://www.coderavine.com/
 */
class TimezoneTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @var Timezone
     */
    public $validator;

    /**
     * Setup testing environment
     */
    public function setUp()
    {
        $this->validator = new Timezone();
    }

    /**
     * Test validator Timezone basic behavior
     *
     * @dataProvider getTimezomeDataProvider
     * @param $timezone
     * @param $expected
     */
    public function testBasicBehavior($timezone, $expected)
    {
        $this->assertEquals($expected, $this->validator->isValid($timezone));
    }

    /**
     * Ensure that we get no error messages before running validation
     */
    public function testGetErrorMessagesBeforeRunningValidation()
    {
        $validator = new Timezone();
        $this->assertEquals([], $validator->errors());
    }

    /**
     * Ensure that we get no error messages before running validation
     */
    public function testGetErrorMessagesAfterValidationFailure()
    {
        $validator = new Timezone();
        $validator->isValid('ewwewe');
        $this->assertCount(1, $validator->errors());
    }

    /**
     * Setup basic behavior test data
     */
    public function getTimezomeDataProvider()
    {
        return [
            ['Africa/Abidjan', true],
            ['America/Creston', true],
            ['Arctic/Longyearbyen', true],
            ['Asia/Colombo', true],
            ['2', false],
            ['normalString', false],
            [null, false],
        ];
    }
}
