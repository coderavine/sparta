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
     */
    public function testBasicBehavior()
    {
        // Your test code over here
    }
}
