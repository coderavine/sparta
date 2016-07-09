<?php
use Sparta\Validators\Ip;

/**
 * Validation Class
 *
 * @package Sparta
 * @author  Mohammed Ashour <ashoms0a@gmail.com>
 * @link    http://www.coderavine.com/
 */
class IpTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Ensure that validator behaves as expected
     *
     * @return void
     */
    public function testBasicBehavior()
    {
        $validator = new Ip();
        $this->assertTrue($validator->isValid('1.2.3.4'));
        $this->assertTrue($validator->isValid('10.0.0.1'));
        $this->assertTrue($validator->isValid('255.255.255.255'));
        $this->assertFalse($validator->isValid('0.0.0.256'));
        $this->assertFalse($validator->isValid('1.2.3.4.5'));
    }

    /**
     * Ensure that we get no error messages before running validation
     */
    public function testGetEmptyErrorMessagesBeforeRunningValidation()
    {
        $validator = new Ip();
        $this->assertEquals([], $validator->errors());
    }

    /**
     * Ensure that we get no error messages before running validation
     */
    public function testGetErrorMessagesAfterValidationFailure()
    {
        $validator = new Ip();
        $validator->isValid('coderavine');
        $this->assertCount(1, $validator->errors());
    }

}
