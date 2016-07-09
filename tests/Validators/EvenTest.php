<?php
use Sparta\Validators\Even;

/**
 * Even Class
 *
 * @package Sparta
 * @author  Mohammed Ashour <ashoms0a@gmail.com>
 * @link    http://www.coderavine.com/
 */
class EvenTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @var Even
     */
    public $validator;

    /**
     * Setup testing environment
     */
    public function setUp()
    {
        $this->validator = new Even();
    }

    /**
     * Test validator Odd basic behavior
     *
     * @dataProvider getDataProvider
     */
    public function testBasicBehavior($input, $expected)
    {
        $this->assertEquals($expected, $this->validator->isValid($input));
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
        $this->validator->isValid('rere');
        $this->assertCount(1, $this->validator->errors());
    }


    /**
     * @return array
     *
     * @codeCoverageIgnore
     */
    public function getDataProvider()
    {
        return [
            [1, false],
            [3, false],
            [15, false],
            ['test', false],
            [4, true],
            [200, true],
            [null, false],
            ['', false],
            [[], false],
            [0, false]
        ];
    }
}
