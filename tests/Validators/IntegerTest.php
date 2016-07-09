<?php
use Sparta\Validators\Integer;

/**
 * Validation Class
 *
 * @package Sparta
 * @author  Mohammed Ashour <ashoms0a@gmail.com>
 * @link    http://www.coderavine.com/
 */
class IntegerTest extends \PHPUnit_Framework_TestCase
{
    /**
     *
     * @dataProvider getDataProvider
     *
     * @param $input
     * @param $expected
     */
    public function testBasicBehavior($input, $expected)
    {
        $validator = new Integer();
        $this->assertEquals($expected, $validator->isValid($input),
            'Failed value is ' . $input);
    }

    /**
     * Ensure that we get no error messages before running validation
     */
    public function testGetDefaultErrorMessages()
    {
        $validator = new Integer();
        $this->assertEquals([], $validator->errors());
    }

    /**
     * Ensure that we get no error messages before running validation
     */
    public function testGetErrorMessagesAfterFailure()
    {
        $validator = new Integer();
        $validator->isValid("23");
        $this->assertCount(1, $validator->errors());
    }

    /**
     * @return array
     *
     * @codeCoverageIgnore
     */
    public function getDataProvider()
    {
        return [
            [100, true],
            [-100, true],
            [0, true],
            [0123, true],
            [0x1A, true],
            [0b11111111, true],
            [1.4, false],
            [null, false],
            [true, false],
            [false, false],
            ['test', false],
            ["23", false],
            [2147483647, true]
        ];
    }
}
