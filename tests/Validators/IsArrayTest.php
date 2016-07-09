<?php
use Sparta\Validators\IsArray;

/**
 * Class IsArrayTest.php
 *
 * @package Sparta
 * @author  Mohammed Ashour <ashoms0a@gmail.com>
 * @link    http://www.coderavine.com/
 */
class IsArrayTest extends PHPUnit_Framework_TestCase
{
    /**
     * Validator instance
     *
     * @var IsArray
     */
    protected $validator;

    /**
     *
     */
    public function setUp()
    {
        $this->validator = new IsArray();
    }

    /**
     * Ensure that validator behaves as expected
     *
     * @return void
     */
    public function testBasicBehavior()
    {
        $this->assertFalse($this->validator->isValid(12));
        $this->assertFalse($this->validator->isValid('normal string'));
        $this->assertTrue($this->validator->isValid([1, 2, 3, 4]));
        $this->assertTrue($this->validator->isValid(['key' => 'value']));
        $this->assertTrue($this->validator->isValid(['key' => 'value', 5]));
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
