<?php
use Sparta\Validators\Boolean;

/**
 * Boolean Validator Testing Class
 *
 * @package Sparta
 * @author  Mohammed Ashour <ashoms0a@gmail.com>
 * @link    http://www.coderavine.com/
 */
class BooleanTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var Boolean
     */
    protected $validator;

    /**
     * Setup testing environment
     */
    public function setUp()
    {
        $this->validator = new Boolean();
    }

    /**
     * Ensure that validator behaves as expected
     *
     * @return void
     */
    public function testBasicBehavior()
    {
        $this->assertTrue($this->validator->isValid(false));
        $this->assertTrue($this->validator->isValid(true));
        $this->assertFalse($this->validator->isValid(1));
        $this->assertFalse($this->validator->isValid(null));
        $this->assertFalse($this->validator->isValid('string'));
        $this->assertFalse($this->validator->isValid(12.5));
    }

    /**
     * Ensure that we get no error messages before running validation
     */
    public function testGetEmptyErrorMessagesBeforeRunningValidation()
    {
        $this->assertEquals([], $this->validator->errors());
    }

    /**
     * Ensure that we get no error messages before running validation
     */
    public function testGetErrorMessagesAfterValidationFailure()
    {
        $this->validator->isValid('coderavine');
        $this->assertCount(1, $this->validator->errors());
    }


}
