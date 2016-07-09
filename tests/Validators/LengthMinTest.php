<?php
use Sparta\Validators\LengthMin;

/**
 * Class LengthMinTest.php
 *
 * @package ${NAMESPACE}
 * @author  Mohammed Ashour <ashoms0a@gmail.com>
 * @link    http://www.coderavine.com/
 */
class LengthMinTest extends PHPUnit_Framework_TestCase
{
    /**
     * @param $length
     * @param $input
     * @param $expected
     *
     * @dataProvider getDataProvider
     */
    public function testBasicBehavior($length, $input, $expected)
    {
        $validator = new LengthMin($length);
        $this->assertEquals($expected, $validator->isValid($input),
            'failed value: ' . $input . ' should be more than ' . $validator->getLength());
    }

    /**
     * Test if validator throws \InvalidArgumentException if length is missing
     *
     * @expectedException \Sparta\Exceptions\InvalidValidatorArguments
     */

    public function testIfMissingLengthThrowsInvalidArgumentException()
    {
        $validator = new LengthMin();
        $validator->isValid(10);
    } // @codeCoverageIgnore

    /**
     * Ensure that we can set length value via constructor
     */
    public function testSetLengthViaConstructor()
    {
        $validator = new LengthMin(150);
        $this->assertEquals(150, $validator->getLength());
    }

    /**
     * Ensure that we can set length value via setter method
     */
    public function testSetLengthViaLengthSetterMethod()
    {
        $validator = new LengthMin();
        $validator->setLength(150);
        $this->assertEquals(150, $validator->getLength());
    }

    /**
     * Ensure that we can set character set via setter method
     */
    public function testSetEncodingViaEncodingSetterMethod()
    {
        $validator = new LengthMin();
        $validator->setEncoding('ASCII');
        $this->assertEquals('ASCII', $validator->getEncoding());
    }

    /**
     * Ensure that we can get default character as UTF-8 if nothing has been specified
     */
    public function testGetUTF8AsDefaultEncodingViaEncodingGetterMethod()
    {
        $validator = new LengthMin();
        $this->assertEquals('UTF-8', $validator->getEncoding());
    }

    /**
     * Ensure that we get no error messages before running validation
     */
    public function testGetEmptyErrorMessagesBeforeRunningValidation()
    {
        $validator = new LengthMin();
        $this->assertEquals([], $validator->errors());
    }

    /**
     * Ensure that we get no error messages before running validation
     */
    public function testGetErrorMessagesAfterValidationFailure()
    {
        $validator = new LengthMin(20);
        $validator->isValid('coderavine');
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
            [10, '12345678910', true],
            [40, 'wewewewwkejhejkwhrkjewhrewkjhwerjkh', false],
            [5, 'test', false],
            [10, 'wew,ewq,.emnwq,menwq,meqnmq,wnewqm,nqwem,newq', true],
        ];
    }

}
