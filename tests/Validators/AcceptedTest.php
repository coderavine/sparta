<?php
use Sparta\Validators\Accepted;

/**
 * Accepted Class
 *
 * @package Sparta
 * @author  Mohammed Ashour <ashoms0a@gmail.com>
 * @link    http://www.coderavine.com/
 */
class AcceptedTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @var Accepted
     */
    public $validator;

    /**
     * Setup testing environment
     */
    public function setUp()
    {
        $this->validator = new Accepted();
    }


    /**
     * Test validator Accepted basic behavior
     *
     */
    public function testBasicBehavior()
    {
        // Your test code over here
    }
}
