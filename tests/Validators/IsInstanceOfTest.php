<?php
use Sparta\Validators\IsInstanceOf;

/**
 * Class IsInstanceOfTest.php
 *
 * @package ${NAMESPACE}
 * @author  Mohammed Ashour <ashoms0a@gmail.com>
 * @link    http://www.coderavine.com/
 */
class IsInstanceOfTest extends PHPUnit_Framework_TestCase
{
    /**
     * Ensures that the validator follows expected behavior
     *
     * @return void
     */
    public function testBasicBehavior()
    {
        $validator = new IsInstanceOf('DateTime');
        $this->assertTrue($validator->isValid(new DateTime())); // True
        $this->assertFalse($validator->isValid($this)); // False
        $validator = new IsInstanceOf(['class' => 'Exception']);
        $this->assertTrue($validator->isValid(new \Exception())); // True
        $this->assertFalse($validator->isValid(null)); // False
        $this->assertFalse($validator->isValid($this)); // False
        $validator = new IsInstanceOf('PHPUnit_Framework_TestCase');
        $this->assertTrue($validator->isValid($this)); // True
    }

    /**
     * Ensures that getClassName() returns expected value
     *
     * @return void
     */
    public function testSetGetClassNameViaSetterAndGetterMethods()
    {
        $validator = new IsInstanceOf('DateTime');
        $this->assertEquals('DateTime', $validator->getClass());
        $validator->setClass('Exception');
        $this->assertEquals('Exception', $validator->getClass());
    }

    /**
     * @expectedException Sparta\Exceptions\InvalidValidatorArguments
     */
    public function testMissingArgumentsThrowsException()
    {
        $validator = new IsInstanceOf();
        $validator->isValid('DateTime');
    }// @codeCoverageIgnore

    /**
     * Ensure that we get no error messages before running validation
     */
    public function testGetEmptyErrorMessagesBeforeRunningValidation()
    {
        $validator = new IsInstanceOf();
        $this->assertEquals([], $validator->errors());
    }

    /**
     * Ensure that we get no error messages before running validation
     */
    public function testGetErrorMessagesAfterValidationFailure()
    {
        $validator = new IsInstanceOf('DateTime');
        $validator->isValid(new \Exception());
        $this->assertCount(1, $validator->errors());
    }
}
