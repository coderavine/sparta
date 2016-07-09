<?php
use Sparta\Validators\Equals;

/**
 * Class EqualsTest.php
 *
 * @package ${NAMESPACE}
 * @author  Mohammed Ashour <ashoms0a@gmail.com>
 * @link    http://www.coderavine.com/
 */
class EqualsTest extends PHPUnit_Framework_TestCase
{

    /**
     * @param $to
     * @param $input
     * @param $expected
     *
     * @dataProvider getDataProvider
     */
    public function testBasicBehavior($to, $input, $expected)
    {
        $validator = new Equals($to);
        $this->assertEquals($expected, $validator->isValid($input));
    }

    /**
     * @expectedException Sparta\Exceptions\InvalidValidatorArguments
     */
    public function testMissingOArgumentsThrowsException()
    {
        $validator = new Equals();
        $validator->isValid('3');
    }// @codeCoverageIgnore

    /**
     *
     */
    public function testSetGetCompareValue()
    {
        $validator = new Equals(1);
        $this->assertEquals(1, $validator->getTo());
        $validator->setTo('2');
        $this->assertEquals(2, $validator->getTo());
    }

    /**
     * Ensure that we get no error messages before running validation
     */
    public function testGetEmptyErrorMessagesBeforeRunningValidation()
    {
        $validator = new Equals();
        $this->assertEquals([], $validator->errors());
    }

    /**
     * Ensure that we get no error messages before running validation
     */
    public function testGetErrorMessagesAfterValidationFailure()
    {
        $validator = new Equals(2);
        $validator->isValid(1);
        $this->assertCount(1, $validator->errors());
    }

    /**
     * @codeCoverageIgnore
     */
    public function getDataProvider()
    {
        return [
            [1, 1, true],
            ['test', 'test', true],
            ['true', 'false', false],
            [['to' => 1], 1, true],
        ];
    }
}
