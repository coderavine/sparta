<?php
use Sparta\Validators\Accepted;

/**
 * Accepted Class
 *
 * @package Sparta
 * @author  Mohammed Ashour <ashoms0a@gmail.com>
 * @link    http://www.coderavine.com/
 */
class AcceptedTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @var Accepted
     */
    public $validator;

    /**
     * Setup testing environment
     */
    public function setUp()
    {
        $this->validator = new Accepted();
    }

    /**
     * Test validator Accepted basic behavior
     *
     * @dataProvider getAcceptedDataProvider
     */
    public function testBasicBehavior($input, $expected)
    {
        $this->assertEquals($expected, $this->validator->isValid($input));
    }

    /**
     * Setup accepted data test samples for testing basic behavior
     */
    public function getAcceptedDataProvider()
    {
        return [
            ['1', true],
            [1, true],
            ['yes', true],
            ['on', true],
            ['true', true],
            [true, true],
            ['0', false],
            [0, false],
            ['no', false],
            ['off', false],
            ['false', false],
            [false, false],

        ];
    }
}
