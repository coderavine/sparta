<?php
use Sparta\Validators\In;

/**
 * In Class
 *
 * @package Sparta
 * @author  Mohammed Ashour <ashoms0a@gmail.com>
 * @link    http://www.coderavine.com/
 */
class InTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @var In
     */
    public $validator;

    /**
     * Setup testing environment
     */
    public function setUp()
    {
        $this->validator = new In();
    }


    /**
     * Test validator In basic behavior
     *
     */
    public function testBasicBehavior()
    {
        // Your test code over here
    }
}
