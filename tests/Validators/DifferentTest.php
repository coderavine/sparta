<?php
use Sparta\Validators\Different;

/**
 * Different Class
 *
 * @package Sparta
 * @author  Mohammed Ashour <ashoms0a@gmail.com>
 * @link    http://www.coderavine.com/
 */
class DifferentTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @var Different
     */
    public $validator;

    /**
     * Setup testing environment
     */
    public function setUp()
    {
        $this->validator = new Different();
    }


    /**
     * Test validator Different basic behavior
     *
     * @dataProvider getDifferentDataProvider
     *
     * @param $compareTo
     * @param $input
     * @param $expected
     */
    public function testBasicBehavior($compareTo, $input, $expected)
    {
        $validator = new Different($compareTo);
        $this->assertEquals($expected, $validator->isValid($input));
    }

    /**
     * Ensure that we can set and get field to compare with
     * using validator setter/getter methods
     */
    public function testGetComparedToField()
    {
        $this->assertNull($this->validator->getFom());
        $this->validator->setFrom('value1');
        $this->assertEquals('value1', $this->validator->getFom());
    }

    /**
     * Ensure that we get no error messages before running validation
     */
    public function testGetErrorMessagesBeforeRunningValidation()
    {
        $validator = new Different();
        $this->assertEquals([], $validator->errors());
    }

    /**
     * Ensure that we get no error messages before running validation
     */
    public function testGetErrorMessagesAfterValidationFailure()
    {
        $validator = new Different(1);
        $validator->isValid(1);
        $this->assertCount(1, $validator->errors());
    }

    /**
     * Ensure that validator throws exception when we have missing arguments
     *
     * @expectedException \Sparta\Exceptions\InvalidValidatorArguments
     */
    public function testThatValidatorThrowsExceptionWhenRequiredArgumentsAreMissing()
    {
        $validator = new Different();
        $validator->isValid(1);
    }


    /**
     * Setup some .php_cs data for basic behavior .php_cs
     */
    public function getDifferentDataProvider()
    {
        return [
            ['test', 'test', false],
            [1, 1, false],
            ['value1', 'value2', true],
            [['from' => 'value1'], 'value2', true]
        ];
    }
}
