<?php
use Sparta\Validators\Timezone;

/**
 * Timezone Class
 *
 * @package Sparta
 * @author  Mohammed Ashour <ashoms0a@gmail.com>
 * @link    http://www.coderavine.com/
 */
class TimezoneTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @var Timezone
     */
    public $validator;

    /**
     * Setup testing environment
     */
    public function setUp()
    {
        $this->validator = new Timezone();
    }


    /**
     * Test validator Timezone basic behavior
     *
     */
    public function testBasicBehavior()
    {
        // Your test code over here
    }
}
