<?php
use Sparta\Validators\FloatNumber;
/**
 * Validation Class
 *
 * @package Sparta
 * @author  Mohammed Ashour <ashoms0a@gmail.com>
 * @link    http://www.coderavine.com/
 */
class FloatNumberTest extends \PHPUnit_Framework_TestCase
{
    public function testIfFloatNumberCanBeValidated()
    {
        $validator = new FloatNumber();
        $this->assertTrue($validator->isValid(12.4));
        $this->assertTrue($validator->isValid(-313.4));
    }

    /**
     * Ensure that we get no error messages before running validation
     */
    public function testGetEmptyErrorMessagesBeforeRunningValidation()
    {
        $validator = new FloatNumber();
        $this->assertEquals([], $validator->errors());
    }

    /**
     * Ensure that we get no error messages before running validation
     */
    public function testGetErrorMessagesAfterValidationFailure()
    {
        $validator = new FloatNumber();
        $validator->isValid(1);
        $this->assertCount(1, $validator->errors());
    }
}
