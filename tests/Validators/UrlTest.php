<?php
use Sparta\Validators\Url;

/**
 * Validation Class
 *
 * @package Sparta
 * @author  Mohammed Ashour <ashoms0a@gmail.com>
 * @link    http://www.coderavine.com/
 */
class UrlTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Ensure that validator behave as expected
     */
    public function testIfUrlCanBeValidate()
    {
        $validator = new Url();
        $this->assertTrue($validator->isValid('http://www.google.com'));
        $this->assertTrue($validator->isValid('http://www.w3schools.com'));
        $this->assertTrue($validator->isValid('http://www.justdeveloped.co.uk/'));
        $this->assertTrue($validator->isValid('https://moz.com/blog/15-seo-best-practices-for-structuring-urls'));
        $this->assertFalse($validator->isValid('moz.com'));
        $this->assertFalse($validator->isValid('www.google.com'));
    }

    /**
     *
     */
    public function testGetDefaultErrorMessages()
    {
        $validator = new Url();
        $this->assertEquals([], $validator->errors());
    }
    
    /**
     *
     */
    public function testGetErrorMessagesAfterFailure()
    {
        $validator = new Url();
        $validator->isValid(null);
        $this->assertCount(1, $validator->errors());
    }
}
