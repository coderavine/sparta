<?php
use Sparta\Validators\Contains;

/**
 * Class ContainsTest
 *
 * @package Sparta
 * @author  Mohammed Ashour <ashoms0a@gmail.com>
 * @link    http://www.coderavine.com/
 */
class ContainsTest extends PHPUnit_Framework_TestCase
{
    /**
     * Test if the given value exists in input array
     *
     * @dataProvider getDataProvider
     *
     * @param $needle
     * @param $input
     * @param $expected
     */
    public function testBasicBehavior($needle, $input, $expected)
    {
        if (is_array($input)) {
            $errorString = implode(',', $input);
        } else {
            $errorString = $input;
        }

        $validator = new Contains($needle);
        $this->assertEquals($expected, $validator->isValid($input),
            'Failed values: input is ' . $errorString . ' and needle is ' . $validator->getNeedle()
        );
    }

    /**
     * Missing to provide a needle for the validator must throw InvalidValidatorArguments exception
     *
     * @expectedException Sparta\Exceptions\InvalidValidatorArguments
     *
     * @return void
     */
    public function testMissingNeedleThrowsException()
    {
        $validator = new Contains();
        $validator->isValid(34);
    }

    /**
     * Test Setting/Getting needle
     *
     * @return void
     */
    public function testSetGetNeedle()
    {
        $validator = new Contains('123');
        $this->assertEquals(123, $validator->getNeedle());
        $validator->setNeedle('.php_cs');
        $this->assertEquals('.php_cs', $validator->getNeedle());
    }

    /**
     * Ensure that we get no error messages before running validation
     */
    public function testGetEmptyErrorMessagesBeforeRunningValidation()
    {
        $validator = new Contains();
        $this->assertEquals([], $validator->errors());
    }

    /**
     * Ensure that we get no error messages before running validation
     */
    public function testGetErrorMessagesAfterValidationFailure()
    {
        $validator = new Contains(2);
        $validator->isValid('3');
        $this->assertCount(1, $validator->errors());
    }

    /**
     * Basic Behavior .php_cs Data provider
     *
     * @return array
     *
     * @codeCoverageIgnore
     */
    public function getDataProvider()
    {
        return [
            [['needle' => 'test'], 'string that contains the word test', true],
            ['test', 'this is a string with a test word', true],
            ['test', 'this is a string', false],
            ['ceceo', 'Dis ceceo kunmetita popolnomo e. Hu kombi transitiva ajn', true],
            ['केन्द्रिय', 'समाजो एछित सारांश निर्देश केन्द्रिय अधिक लेकिन तकनिकल संपुर्ण', true],
            ['123', '432432123434', true],
            [1, [1, 2, 3], true],
            [1, [4, 5, 6], false],
            [true, [true, false], true],
            ['foo', ['bar' => 'foo', 'zee' => 'nee'], true],
            ['bar', ['bar' => 'foo', 'zee' => 'nee'], false],

        ];
    }
}
