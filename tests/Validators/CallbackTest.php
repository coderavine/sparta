<?php
use Sparta\Validators\Callback;

/**
 * Callback Class
 *
 * @package Sparta
 * @author  Mohammed Ashour <ashoms0a@gmail.com>
 * @link    http://www.coderavine.com/
 */
class CallbackTest extends \PHPUnit_Framework_TestCase
{

    /**
     * Test validator Callback basic behavior
     *
     */
    public function testBasicBehavior()
    {
        $validator = new Callback(function ($input) {
            return ($input == 1) ? true : false;
        });
        $this->assertTrue($validator->isValid(1));
        $this->assertFalse($validator->isValid(2));
    }

    public function testValidatorReturnsFalseWhenCallbackThrowExceptionForAnyReason()
    {
        $validator = new Callback([new TestCallable(), 'isValid']);
        $this->assertFalse($validator->isValid(1));
    }

    /**
     * @expectedException Sparta\Exceptions\InvalidValidatorArguments
     */
    public function testValidatorThrowsExceptionWhenNoValidCallbackIsProvided()
    {
        $validator = new Callback();
    }

    /**
     * Ensure that we get no error messages before running validation
     */
    public function testGetErrorMessagesBeforeRunningValidation()
    {
        $validator = new Callback(function ($input) {
            return ($input == 1) ? true : false;
        });
        $this->assertEquals([], $validator->errors());
    }

    /**
     * Ensure that we get no error messages before running validation
     */
    public function testGetErrorMessagesAfterValidationFailure()
    {
        $validator = new Callback(function ($input) {
            return ($input == 1) ? true : false;
        });

        $this->assertFalse($validator->isValid(2));
        $this->assertCount(1, $validator->errors());
    }
}

class TestCallable
{
    public function isValid($input)
    {
        throw new Exception('callback exception occurred');
    }
}