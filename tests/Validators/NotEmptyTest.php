<?php
use Sparta\Validators\NotEmpty;

/**
 * Validation Class
 *
 * @package Sparta
 * @author  Mohammed Ashour <ashoms0a@gmail.com>
 * @link    http://www.coderavine.com/
 */
class NotEmptyTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider getDataProvider
     *
     * @param $input
     * @param $expected
     */
    public function testBasicBehavior($input, $expected)
    {
        $validator = new NotEmpty();
        $this->assertEquals($expected, $validator->isValid($input));
    }

    /**
     * Ensure that we get no error messages before running validation
     */
    public function testGetEmptyErrorMessagesBeforeRunningValidation()
    {
        $validator = new NotEmpty();
        $this->assertEquals([], $validator->errors());
    }

    /**
     * Ensure that we get no error messages before running validation
     */
    public function testGetErrorMessagesAfterValidationFailure()
    {
        $validator = new NotEmpty();
        $validator->isValid([]);
        $this->assertCount(1, $validator->errors());
    }
    /**
     * Test data provider
     *
     * @codeCoverageIgnore
     */
    public function getDataProvider()
    {
        return [
            ['not empty string', true],
            [0, false],
            [null, false],
            [[], false],
            [[1, 2], true],
            [12121, true],
            [123.43433, true],
            [false, false]
        ];
    }

}
