<?php
use Sparta\Validators\Email;

/**
 * Validation Class
 *
 * @package Sparta
 * @author  Mohammed Ashour <ashoms0a@gmail.com>
 * @link    http://www.coderavine.com/
 */
class EmailTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Ensures that valid emails pass validation
     *
     * @return void
     * @dataProvider getDataProvider
     */
    public function testBasicBehavior($email, $expected)
    {
        $validator = new Email();
        $this->assertEquals($expected, $validator->isValid($email));
    }

    /**
     * Ensure that error message can be retrieved after validation failure
     *
     * @return void
     */
    public function testGetErrorMessagesAfterFailure()
    {
        $validator = new Email();
        $validator->isValid('notvalidemail');
        $this->assertCount(1, $validator->errors());
    }

    /**
     * Ensures that errors() method returns expected default value
     *
     * @return void
     */
    public function testGetErrorMessages()
    {
        $validator = new Email();
        $validator->isValid('1');
        $this->assertCount(1, $validator->errors());
    }

    /**
     * Basic Behavior test Data provider
     *
     * @return array
     *
     * @codeCoverageIgnore
     */
    public function getDataProvider()
    {
        return [
            ['test.test@gmail.com', true],
            ['test@gmail.com', true],
            ['test-test@gmail.com.us', true],
            ['', false],
            ['test', false],
            ['@domain.com', false],
            ['test test@domain.com', false],
            ['.test@domain.com', false],
            ['test.@domain.com', false],
            ['test.test.@domain.com', false],
            ['"test%test@domain.com', false],
            ['test+domain.com', false],
            ['test.domain.com', false],
            ['test @domain.com', false],
            ['test@ domain.com', false],
            ['test @ domain.com', false],
            ['test..123@example.com', false],
        ];
    }
}
