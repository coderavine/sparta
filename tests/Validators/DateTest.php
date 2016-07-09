<?php
use Sparta\Validators\Date;

/**
 * Validation Class
 *
 * @package Sparta
 * @author  Mohammed Ashour <ashoms0a@gmail.com>
 * @link    http://www.coderavine.com/
 */
class DateTest extends \PHPUnit_Framework_TestCase
{

    /**
     * Ensure date validator behaves as expected
     *
     * @dataProvider datesDataProvider
     *
     * @param $input
     * @param $format
     * @param $result
     */
    public function testBasicBehavior($input, $format, $result)
    {
        $validator = new Date();
        $validator->setFormat($format);
        $this->assertEquals($result, $validator->isValid($input),
            implode("\n", $validator->errors()) . $input
        );
    }

    public function testPassingInstanceOfDateTimeReturnsTrue()
    {
        $date = new DateTime();
        $validator = new Date();
        $this->assertEquals(true, $validator->isValid($date));
    }

    /**
     * Test Passing format upon instantiation in different forms
     */
    public function testCanPassDateFormatViaConstructor()
    {
        $validator1 = new Date(['m-d-Y']);
        $this->assertEquals('m-d-Y', $validator1->getFormat());

        $validator1 = new Date(['format' => 'd-Y-m']);
        $this->assertEquals('d-Y-m', $validator1->getFormat());
    }

    /**
     * Test get default date format
     */
    public function testGetDefaultDateFormatViaGetter()
    {
        $validator = new Date();
        $this->assertEquals('Y-m-d', $validator->getFormat());
    }

    /**
     * Ensures that getMessages() returns expected default value
     *
     * @return void
     */
    public function testGetErrorsMessages()
    {
        $validator = new Date();
        $this->assertEquals([], $validator->errors());

        $validator->isValid('44');
        $this->assertCount(1, $validator->errors());
    }

    /**
     * @return array
     *
     * @codeCoverageIgnore
     */
    public function datesDataProvider()
    {
        return [
            ['2007-01-01', null, true],
            ['2007-02-28', null, true],
            ['2007-02-29', null, false],
            ['2008-02-29', null, true],
            ['2007-02-30', null, false],
            ['2007-02-99', null, false],
            ['2007-02-99', 'Y-m-d', false],
            ['9999-99-99', null, false],
            ['9999-99-99', 'Y-m-d', false],
            ['Jan 1 2007', null, false],
            ['Jan 1 2007', 'M j Y', true],
            ['asdasda', null, false],
            ['sdgsdg', null, false],
            ['2007-01-01something', null, false],
            ['something2007-01-01', null, false],
            ['10.01.2008', 'd.m.Y', true],
            ['01 2010', 'm Y', true],
            ['2008/10/22', 'd/m/Y', false],
            ['22/10/08', 'd/m/y', true],
            ['22/10', 'd/m/Y', false],
            ['2007-01-01T12:02:55Z', DateTime::ISO8601, true]
        ];
    }


}
