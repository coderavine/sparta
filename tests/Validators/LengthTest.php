<?php
use Sparta\Exceptions\InvalidValidatorArguments;
use Sparta\Validators\Length;

/**
 * Validation Class
 *
 * @package Sparta
 * @author  Mohammed Ashour <ashoms0a@gmail.com>
 * @link    http://www.coderavine.com/
 */
class LengthTest extends \PHPUnit_Framework_TestCase
{

    /**
     * Ensure that validator behaves as expected
     *
     * @param $maxLength
     * @param $input
     * @param $expected
     *
     * @dataProvider getDataProvider
     */
    public function testBasicBehavior($maxLength, $input, $expected)
    {
        $validator = new Length($maxLength);
        $this->assertEquals($expected, $validator->isValid($input));
    }

    /**
     * Test if validator throws \InvalidArgumentException if length is missing
     *
     * @expectedException \Sparta\Exceptions\InvalidValidatorArguments
     */

    public function testIfMissingLengthThrowsInvalidArgumentException()
    {
        $this->expectException(InvalidValidatorArguments::class);
        $validator = new Length();
        $validator->isValid(10);
    }// @codeCoverageIgnore

    /**
     * Ensure that we can set length value via constructor
     */
    public function testSetLengthViaConstructor()
    {
        $validator = new Length(150);
        $this->assertEquals(150, $validator->getLength());
    }

    /**
     * Ensure that we can set length value via setter method
     */
    public function testSetLengthViaLengthSetterMethod()
    {
        $validator = new Length();
        $validator->setLength(150);
        $this->assertEquals(150, $validator->getLength());
    }

    /**
     * Ensure that we can set character set via setter method
     */
    public function testSetEncodingViaEncodingSetterMethod()
    {
        $validator = new Length();
        $validator->setEncoding('ASCII');
        $this->assertEquals('ASCII', $validator->getEncoding());
    }

    /**
     * Ensure that we can get default character as UTF-8 if nothing has been specified
     */
    public function testGetUTF8AsDefaultEncodingViaEncodingGetterMethod()
    {
        $validator = new Length();
        $this->assertEquals('UTF-8', $validator->getEncoding());
    }

    /**
     * Ensure that we get no error messages before running validation
     */
    public function testGetEmptyErrorMessagesBeforeRunningValidation()
    {
        $validator = new Length();
        $this->assertEquals([], $validator->errors());
    }

    /**
     * Ensure that we get no error messages before running validation
     */
    public function testGetErrorMessagesAfterValidationFailure()
    {
        $validator = new Length(2);
        $validator->isValid('coderavine');
        $this->assertCount(1, $validator->errors());
    }

    /**
     * Get sample data for testing
     *
     * @codeCoverageIgnore
     */
    public function getDataProvider()
    {
        return [
            [
                'maxLength' => 10,
                'input' => 'testing a string that is not 10 characters should fail',
                'expected' => false,
            ],
            [
                'maxLength' => 47,
                'input' => 'testing a string that is exactly 47 should pass',
                'expected' => true,
            ],
            [
                'maxLength' => 35,
                'input' => 'He bangigkeit uberwunden lehrlingen', // German language
                'expected' => true,
            ],
            // Non string and empty values should all fail
            [
                'maxLength' => 10,
                'input' => null,
                'expected' => false,
            ],
            [
                'maxLength' => 10,
                'input' => '',
                'expected' => false,
            ],
            [
                'maxLength' => 50,
                'input' => 123,
                'expected' => false,
            ],
            [
                'maxLength' => 50,
                'input' => [],
                'expected' => false,
            ],
            [
                'maxLength' => 50,
                'input' => false,
                'expected' => false,
            ],
        ];
    }

}
