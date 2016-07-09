<?php
use Sparta\Validators\Between;

/**
 * Class BetweenTest.php
 *
 * @package ${NAMESPACE}
 * @author  Mohammed Ashour <ashoms0a@gmail.com>
 * @link    http://www.coderavine.com/
 */
class BetweenTest extends PHPUnit_Framework_TestCase
{
    /**
     * Test validator with different scenarios
     *
     * @param $options
     * @param $inputs
     * @param $expected
     *
     * @dataProvider getDataProvider
     */
    public function testBasicBehavior($options, $inputs, $expected)
    {
        $validator = new Between($options);

        foreach ($inputs as $value) {
            $this->assertEquals($expected, $validator->isValid($value));
        }
    }

    /**
     * Ensure that arguments can be passed without keys
     *
     * @return void
     */
    public function testPassingOptionsWithoutKeys()
    {
        $validator = new Between(['min' => 1, 'max' => 10]);
        $this->assertEquals(1, $validator->getMin());
        $this->assertEquals(10, $validator->getMax());

        $validator = new Between([3, 101]);
        $this->assertEquals(3, $validator->getMin());
        $this->assertEquals(101, $validator->getMax());
    }

    /**
     * Ensures that errors() method returns expected default value
     *
     * @return void
     */
    public function testGetMessages()
    {
        $validator = new Between(['min' => 1, 'max' => 10]);
        $this->assertEquals([], $validator->errors());
    }

    /**
     * Ensures that errors() method returns error message after failure
     *
     * @return void
     */
    public function testGetMessagesAfterValidationFailure()
    {
        $validator = new Between(['min' => 1, 'max' => 10]);
        $validator->isValid(50);
        $this->assertCount(1, $validator->errors());
    }

    /**
     * Ensures that getMin() returns expected value
     *
     * @return void
     */
    public function testSetGetMin()
    {
        $validator = new Between(['min' => 1, 'max' => 10]);
        $this->assertEquals(1, $validator->getMin());
        $validator->setMin(2);
        $this->assertEquals(2, $validator->getMin());
    }

    /**
     * Ensures that getMax() returns expected value
     *
     * @return void
     */
    public function testSetGetMax()
    {
        $validator = new Between(['min' => 1, 'max' => 10]);
        $this->assertEquals(10, $validator->getMax());
        $validator->setMax(122);
        $this->assertEquals(122, $validator->getMax());
    }

    /**
     * Ensures that getInclusive() returns expected default value, in our case is "true"
     *
     * @return void
     */
    public function testGetDefaultInclusiveValue()
    {
        $validator = new Between(['min' => 1, 'max' => 10]);
        $this->assertEquals(true, $validator->getInclusive());
    }

    /**
     * Ensures that getInclusive() returns expected value
     *
     * @return void
     */
    public function testSetGetInclusive()
    {
        $validator = new Between(['min' => 1, 'max' => 10, 'inclusive' => false]);
        $this->assertEquals(false, $validator->getInclusive());
        $validator->setInclusive(true);
        $this->assertTrue($validator->getInclusive());
    }

    /**
     * Ensure that validator will throw InvalidValidatorArguments exception if
     * either min or max are missing
     *
     * @expectedException Sparta\Exceptions\InvalidValidatorArguments
     */
    public function testMissingMinOrMaxThrowsException()
    {
        $validator = new Between();
        $validator->isValid(2);
    }// @codeCoverageIgnore


    /**
     * Set test data
     *
     * @codeCoverageIgnore
     */
    public function getDataProvider()
    {
        return [
            [
                ['min' => 10, 'max' => 100, 'inclusive' => false],
                [50, 60, 70, 90],
                true
            ],
            [
                ['min' => 10, 'max' => 100, 'inclusive' => true],
                [10, 50, 100],
                true
            ],
            [
                ['min' => 20, 'max' => 30, 'inclusive' => false],
                [1, 4, 5, 6, 31, 50],
                false
            ],
            [
                ['min' => 'a', 'max' => 'z', 'inclusive' => true],
                ['a', 'm', 'z'],
                true
            ],
            [
                ['min' => 'a', 'max' => 'z', 'inclusive' => false],
                ['a', 'z', '#'],
                false
            ],
            [
                ['min' => 10, 'max' => 100, 'inclusive' => true],
                [10, 50, 100],
                true
            ],
            [
                [10, 100, false],
                [50, 60, 70, 90],
                true
            ],
            [
                ['a', 'z', false],
                ['a', 'z', '#'],
                false
            ]
        ];

    }
}
