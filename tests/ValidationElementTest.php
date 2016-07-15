<?php
use Sparta\ValidationElement;

/**
 * Class ValidationElementTest.php
 *
 * @package Sparta
 * @author  Mohammed Ashour <ashoms0a@gmail.com>
 * @link    http://www.coderavine.com/
 */
class ValidationElementTest extends PHPUnit_Framework_TestCase
{
    /**
     * Ensure that setName assigns a name for the element
     *
     * @return void
     */
    public function testSetElementName()
    {
        $elements = [
            ['name' => 'alpha', 'arguments' => null, 'expectedName' => 'alpha', 'expectedArguments' => null],
            ['name' => 'email', 'arguments' => null, 'expectedName' => 'email', 'expectedArguments' => null],
            [
                'name' => 'equal',
                'arguments' => ['compareValue' => 'foo'],
                'expectedName' => 'equal',
                'expectedArguments' => ['compareValue' => 'foo']
            ],
        ];

        foreach ($elements as $element) {
            $validator = new ValidationElement($element['name'], $element['arguments']);
            $this->assertEquals($element['expectedName'], $validator->getName());
            $this->assertEquals($element['expectedArguments'], $validator->getArguments());
        }

    }

    /**
     * Ensure that getName gets the name for the element
     *
     * @return void
     */
    public function testGetElementName()
    {
        $element = new ValidationElement();
        $element->setName('foo');
        $this->assertEquals('foo', $element->getName());
    }

    /**
     * Ensure that setArguments assign arguments to the element
     *
     * @return void
     */
    public function testSetElementArguments()
    {
        $element = new ValidationElement();
        $element->getName('foo');
        $this->assertEquals('', $element->getName());
        $element->setName('bar');
        $this->assertEquals('bar', $element->getName());

    }

    /**
     * Ensure that getArguments gets arguments from the element
     *
     * @return void
     */
    public function testGetElementArguments()
    {
        $data = ['name' => 'equal', 'arguments' => ['Foo' => 'Bar']];
        $element = new ValidationElement($data['name'], $data['arguments']);
        $this->assertEquals($data['arguments'], $element->getArguments());
        $this->assertArrayHasKey('Foo', $element->getArguments());

    }

    /**
     * Ensure that hasArguments check if the element at least one argument
     *
     * @return void
     */
    public function testExistenceOfArguments()
    {
        $data = ['name' => 'equal', 'arguments' => ['Foo' => 'Bar']];
        $element = new ValidationElement($data['name'], $data['arguments']);
        $this->assertTrue($element->hasArguments());
        $element->setArguments(null);
        $this->assertFalse($element->hasArguments());

    }
}
