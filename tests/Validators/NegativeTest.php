<?php
use Sparta\Validators\Negative;

/**
 * Negative Class
 *
 * @package Sparta
 * @author  Mohammed Ashour <ashoms0a@gmail.com>
 * @link    http://www.coderavine.com/
 */
class NegativeTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @var Negative
     */
    public $validator;

    /**
     * Setup testing environment
     *
     * @return void
     */
    public function setUp()
    {
        $this->validator = new Negative();
    }


    /**
     * Test validator Negative basic behavior
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
        $this->validator->isValid(11);
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
            [0, false],
            [-2, true],
            [-232.43, true],
            [null, false],
            ['test', false],
        ];
    }
}
