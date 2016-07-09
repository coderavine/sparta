<?php
use Sparta\Validators\Odd;

/**
 * Odd Class
 *
 * @package Sparta
 * @author  Mohammed Ashour <ashoms0a@gmail.com>
 * @link    http://www.coderavine.com/
 */
class OddTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @var Odd
     */
    public $validator;

    /**
     * Setup testing environment
     */
    public function setUp()
    {
        $this->validator = new Odd();
    }

    /**
     * Test validator Odd basic behavior
     *
     * @dataProvider getDataProvider
     *
     * @param $input
     * @param $expected
     */
    public function testBasicBehavior($input, $expected)
    {
        $this->assertEquals($expected, $this->validator->isValid($input));
    }

    /**
     * Ensure that we get no error messages before running validation
     */
    public function testGetDefaultErrorMessages()
    {
        $this->assertEquals([], $this->validator->errors());
    }

    /**
     * Ensure that we get no error messages before running validation
     */
    public function testGetErrorMessagesAfterFailure()
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
            [1, true],
            [3, true],
            [15, true],
            ['test', false],
            [4, false],
            [null, false],
            ['', false],
            [[], false],
            [0, false]
        ];
    }
}
