<?php
use Sparta\Validators\Positive;

/**
 * Positive Class
 *
 * @package Sparta
 * @author  Mohammed Ashour <ashoms0a@gmail.com>
 * @link    http://www.coderavine.com/
 */
class PositiveTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @var Positive
     */
    public $validator;

    /**
     * Setup testing environment
     *
     * @return void
     */
    public function setUp()
    {
        $this->validator = new Positive();
    }


    /**
     * Test validator Positive basic behavior
     *
     * @dataProvider getDataProvider
     *
     * @param $input
     * @param $expected
     */
    public function testBasicBehavior($input, $expected)
    {
        $this->assertEquals($expected, $this->validator->isValid($input),
            'failed value is: ' . $input);
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
        $this->validator->isValid(-211);
        $this->assertCount(1, $this->validator->errors());
    }

    /**
     * Testing data sample
     *
     * @return array
     *
     * @codeCoverageIgnore
     */
    public function getDataProvider()
    {
        return [
            [-2, false],
            [232.43, true],
            [null, false],
            ['test', false],
            [200, true]
        ];
    }
}
