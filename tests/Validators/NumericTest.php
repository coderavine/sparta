<?php
use Sparta\Validators\Numeric;

/**
 * Validation Class
 *
 * @package Sparta
 * @author  Mohammed Ashour <ashoms0a@gmail.com>
 * @link    http://www.coderavine.com/
 */
class NumericTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @param $input
     * @param $expected
     *
     * @dataProvider getDataProvider
     */
    public function testBasicBehavior($input, $expected)
    {
        $validator = new Numeric();
        $this->assertEquals($expected, $validator->isValid($input));
    }

    /**
     *
     */
    public function testGetDefaultErrorMessages()
    {
        $validator = new Numeric();
        $this->assertEquals([], $validator->errors());
    }

    /**
     *
     */
    public function testGetErrorMessagesAfterFailure()
    {
        $validator = new Numeric();
        $validator->isValid(null);
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
            [123, true],
            [-343427123, true],
            [19.5, true],
            [0xf4c3b00c, true],
            [1010101, true],
            ['12111', true],
            ['ewekjewkejwk', false],
            [null, false],
            [false, false],
            [true, false],
            [[], false],
        ];
    }


}
