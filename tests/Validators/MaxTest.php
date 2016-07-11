<?php
use Sparta\Validators\Max;

/**
 * Max Class
 *
 * @package Sparta
 * @author  Mohammed Ashour <ashoms0a@gmail.com>
 * @link    http://www.coderavine.com/
 */
class MaxTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @var Max
     */
    public $validator;

    /**
     * Setup testing environment
     */
    public function setUp()
    {
        $this->validator = new Max();
    }


    /**
     * Test validator Max basic behavior
     *
     */
    public function testBasicBehavior()
    {
        // Your test code over here
    }
}
