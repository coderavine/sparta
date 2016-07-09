<?php
use Sparta\Validators\Required;

/**
 * Class RequiredTest.php
 *
 * @package Sparta
 * @author  Mohammed Ashour <ashoms0a@gmail.com>
 * @link    http://www.coderavine.com/
 */
class RequiredTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Ensure that validator behave as expected
     */
    public function testBasicBehavior()
    {
        $validation = new Required();
        $this->assertTrue($validation->isValid('string'));
        $this->assertTrue($validation->isValid([1, 2, 3]));
        $this->assertFalse($validation->isValid(''));
        $this->assertFalse($validation->isValid('0'));
        $this->assertFalse($validation->isValid(null));
        $this->assertFalse($validation->isValid([]));
        $this->assertFalse($validation->isValid(0));
        $this->assertFalse($validation->isValid(false));
    }

    /**
     *
     */
    public function testGetDefaultErrorMessages()
    {
        $validator = new Required();
        $this->assertEquals([], $validator->errors());
    }

    /**
     *
     */
    public function testGetErrorMessagesAfterFailure()
    {
        $validator = new Required();
        $validator->isValid(null);
        $this->assertCount(1, $validator->errors());
    }

}
