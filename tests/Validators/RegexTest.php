<?php
use Sparta\Validators\Regex;

/**
 * Regex Class
 *
 * @package Sparta
 * @author  Mohammed Ashour <ashoms0a@gmail.com>
 * @link    http://www.coderavine.com/
 */
class RegexTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @var Regex
     */
    public $validator;

    /**
     * Setup testing environment
     */
    public function setUp()
    {
        $this->validator = new Regex();
    }


    /**
     * Test validator Regex basic behavior
     *
     * @param $pattern
     * @param $input
     * @param $expected
     * @dataProvider getRegexDataProvider
     */
    public function testBasicBehavior($pattern, $input, $expected)
    {
        $this->validator->setPattern($pattern);
        $this->assertEquals($expected, $this->validator->isValid($input));
    }

    /**
     *
     */
    public function testCanPassPatternToClassConstructor()
    {
        $validator = new Regex(['pattern' => '/\w{4}/']);
        $this->assertTrue($validator->isValid('nice'));
    }

    /**
     * Ensure that we can get and set pattern using setter/getter
     * methods
     */
    public function testSetGetPattern()
    {
        $this->assertNull($this->validator->getPattern());
        $this->validator->setPattern('/^[a-z]$/');
        $this->assertEquals('/^[a-z]$/', $this->validator->getPattern());
    }

    /**
     *
     */
    public function getRegexDataProvider()
    {
        return [
            ['/\d{3}[-.]?\d{3}[-.]?\d{4}/', '444-555-1234', true],
            ['/\w{4}/', 'beer', true],
            ['/test(er|ing|ed|s)?/', 'testing', true],
            ['/test(er|ing|ed|s)?/', 'random', false],
            ['/test(er|ing|ed|s)?/', [], false],
        ];
    }
}
