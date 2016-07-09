<?php
use Sparta\Validators\Slug;

/**
 * Validation Class
 *
 * @package Sparta
 * @author  Mohammed Ashour <ashoms0a@gmail.com>
 * @link    http://www.coderavine.com/
 */
class SlugTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Ensure that validator behaves expected
     */
    public function testIfValidSlugResultInTrueResult()
    {
        $validator = new Slug();
        $this->assertTrue($validator->isValid('the-46-year-old-virgin'));
        $this->assertTrue($validator->isValid('the-beautiful-and-the-beast'));
        $this->assertFalse($validator->isValid('Invalid Slug'));
    }

    /**
     *
     */
    public function testGetDefaultErrorMessages()
    {
        $validator = new Slug();
        $this->assertEquals([], $validator->errors());
    }

    /**
     *
     */
    public function testGetErrorMessagesAfterFailure()
    {
        $validator = new Slug();
        $validator->isValid(null);
        $this->assertCount(1, $validator->errors());
    }

}
