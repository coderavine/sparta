<?php
use Sparta\Validators\LengthMax;

/**
 * Class LengthMaxTest.php
 *
 * @package ${NAMESPACE}
 * @author  Mohammed Ashour <ashoms0a@gmail.com>
 * @link    http://www.coderavine.com/
 */
class LengthMaxTest extends PHPUnit_Framework_TestCase
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
        $validator = new LengthMax($length);
        $this->assertEquals($expected, $validator->isValid($input),
            'failed value: ' . $input . ' exceeded ' . $validator->getLength());
    }


    /**
     * Test if validator throws \InvalidArgumentException if length is missing
     *
     * @expectedException \Sparta\Exceptions\InvalidValidatorArguments
     */

    public function testIfMissingLengthThrowsInvalidArgumentException()
    {
        $validator = new LengthMax();
        $validator->isValid(10);
    } // @codeCoverageIgnore

    /**
     * Ensure that we can set length value via constructor
     */
    public function testSetLengthViaConstructor()
    {
        $validator = new LengthMax(150);
        $this->assertEquals(150, $validator->getLength());
    }

    /**
     * Ensure that we can set length value via setter method
     */
    public function testSetLengthViaLengthSetterMethod()
    {
        $validator = new LengthMax();
        $validator->setLength(150);
        $this->assertEquals(150, $validator->getLength());
    }

    /**
     * Ensure that we can set character set via setter method
     */
    public function testSetEncodingViaEncodingSetterMethod()
    {
        $validator = new LengthMax();
        $validator->setEncoding('ASCII');
        $this->assertEquals('ASCII', $validator->getEncoding());
    }

    /**
     * Ensure that we can get default character as UTF-8 if nothing has been specified
     */
    public function testGetUTF8AsDefaultEncodingViaEncodingGetterMethod()
    {
        $validator = new LengthMax();
        $this->assertEquals('UTF-8', $validator->getEncoding());
    }

    /**
     * Ensure that we get no error messages before running validation
     */
    public function testGetEmptyErrorMessagesBeforeRunningValidation()
    {
        $validator = new LengthMax();
        $this->assertEquals([], $validator->errors());
    }

    /**
     * Ensure that we get no error messages before running validation
     */
    public function testGetErrorMessagesAfterValidationFailure()
    {
        $validator = new LengthMax(2);
        $validator->isValid('coderavine');
        $this->assertCount(1, $validator->errors());
    }

    /**
     * @return array
     * @codeCoverageIgnore
     */
    public function getDataProvider()
    {
        return [
            [10, '12345678910', false],
            [40, 'wewewewwkejhejkwhrkjewhrewkjhwerjk', true],
            [5, '1', true],
            [10, 'wew,ewq,.emnwq,menwq,meqnmq,wnewqm,nqwem,newq', false],
        ];
    }
}
