<?php
use Sparta\Validators\InArray;

/**
 * Validation Class
 *
 * @package Sparta
 * @author  Mohammed Ashour <ashoms0a@gmail.com>
 * @link    http://www.coderavine.com/
 */
class InArrayTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @param $haystack
     * @param $input
     * @param $expected
     *
     * @dataProvider getDataProvider
     */
    public function testBasicBehavior($haystack, $input, $expected)
    {
        $validator = new InArray($haystack);
        $this->assertEquals($expected, $validator->isValid($input));
    }

    /**
     * Get default error message when no errors
     */
    public function testGetDefaultErrorMessages()
    {
        $validator = new InArray([1, 2, 3]);
        $this->assertEquals([], $validator->errors());
    }

    /**
     *
     */
    public function testGetErrorMessagesWhenFailed()
    {
        $validator = new InArray([1, 2, 3]);
        $validator->isValid(4);
        $this->assertCount(1, $validator->errors());
    }

    /**
     * Missing to provide a needle for the validator must throw InvalidValidatorArguments exception
     *
     * @return void
     *
     * @expectedException Sparta\Exceptions\InvalidValidatorArguments
     */
    public function testMissingNeedleThrowsException()
    {
        $validator = new InArray();
        $validator->isValid('');
    } 

    /**
     *
     */
    public function testSetGetHaystack()
    {
        $validator = new InArray([1, 2, 3]);
        $this->assertEquals([1, 2, 3], $validator->getHaystack());
        $validator->setHaystack(['foo' => 'bar']);
        $this->assertEquals(['foo' => 'bar'], $validator->getHaystack());
    }

    /**
     * Test data provider
     *
     * @return array
     *
     * @codeCoverageIgnore
     */
    public function getDataProvider()
    {
        return [
            [
                ['haystack' => [1, 2, 3]],
                2,
                true,
            ],
            [
                [1, 2, 3],
                2,
                true,
            ],
            [
                [1, 2, 3],
                5,
                false,
            ],
            [
                ['foo' => 'bar', 'zee' => 'nee', 'zoo' => 'foo'],
                'bar',
                true,
            ],
            [
                ['foo' => 'bar', 'zee' => 'nee', 'zoo' => 'foo'],
                'zee',
                false,
            ],
            [
                ['haystack' => [true, false]],
                false,
                true,
            ],

        ];
    }

}
