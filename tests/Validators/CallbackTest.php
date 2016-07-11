<?php
use Sparta\Validators\Callback;

/**
 * Callback Class
 *
 * @package Sparta
 * @author  Mohammed Ashour <ashoms0a@gmail.com>
 * @link    http://www.coderavine.com/
 */
class CallbackTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @var Callback
     */
    public $validator;

    /**
     * Setup testing environment
     */
    public function setUp()
    {
        $this->validator = new Callback();
    }


    /**
     * Test validator Callback basic behavior
     *
     */
    public function testBasicBehavior()
    {
        // Your test code over here
    }
}
