<?php
use Sparta\Validators\Different;

/**
 * Different Class
 *
 * @package Sparta
 * @author  Mohammed Ashour <ashoms0a@gmail.com>
 * @link    http://www.coderavine.com/
 */
class DifferentTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @var Different
     */
    public $validator;

    /**
     * Setup testing environment
     */
    public function setUp()
    {
        $this->validator = new Different();
    }


    /**
     * Test validator Different basic behavior
     *
     */
    public function testBasicBehavior()
    {
        // Your test code over here
    }
}
