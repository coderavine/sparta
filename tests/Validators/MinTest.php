<?php
use Sparta\Validators\Min;

/**
 * Min Class
 *
 * @package Sparta
 * @author  Mohammed Ashour <ashoms0a@gmail.com>
 * @link    http://www.coderavine.com/
 */
class MinTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @var Min
     */
    public $validator;

    /**
     * Setup testing environment
     */
    public function setUp()
    {
        $this->validator = new Min();
    }


    /**
     * @param $length
     * @param $input
     * @param $expected
     *
     * @dataProvider getDataProvider
     */
    public function testBasicBehavior($length, $input, $expected)
    {
        $validator = new Min($length);
        $this->assertEquals(
            $expected,
            $validator->isValid($input),
            'failed value: '.$input.' should be more than '.$validator->getLength()
        );
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
