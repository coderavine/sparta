<?php
use Sparta\AttributeBag;

/**
 * Class AttributeBagTest.php
 *
 * @package Sparta
 * @author  Mohammed Ashour <ashoms0a@gmail.com>
 * @link    http://www.coderavine.com/
 */
class AttributeBagTest extends PHPUnit_Framework_TestCase
{
    /**
     * @var AttributeBag
     */
    public $bag;

    /**
     *
     */
    public function setUp()
    {
        $this->bag = new AttributeBag();
    }

    /**
     *
     */
    public function testAddAttribute()
    {
        $this->bag->add('foo', 'bar');
        $this->bag->add('zee', 'bee');
        $this->assertEquals(2, $this->bag->count());
    }

    /**
     *
     */
    public function testRemoveAttribute()
    {
        $this->bag->add('foo', 'bar');
        $this->bag->add('zee', 'bee');
        $this->assertEquals(2, $this->bag->count());
        $this->bag->remove('zee');
        $this->assertEquals(1, $this->bag->count());
    }

    /**
     *
     */
    public function testHasAttribute()
    {
        $this->bag->add('foo', 'bar');
        $this->assertTrue($this->bag->has('foo'));
    }

    /**
     *
     */
    public function testGetAttribute()
    {
        $this->bag->add('foo', 'bar');
        $this->assertEquals('bar', $this->bag->get('foo'));
        $this->assertNull($this->bag->get('baz'));
    }

    /**
     *
     */
    public function testGetAllAttributes()
    {
        $this->bag->add('one', 'two');
        $this->bag->add('three', 'four');
        $this->assertEquals(['one' => 'two', 'three' => 'four'], $this->bag->all());
    }

    /**
     *
     */
    public function testCountAttributes()
    {
        $this->bag->add('one', 'two');
        $this->bag->add('two', 'two');
        $this->bag->add('three', 'two');
        $this->assertEquals(3, $this->bag->count());
    }

    /**
     *
     */
    public function testIteratingAttributes()
    {
        $this->bag->add('foo', 'bar');
        $this->bag->add('zee', 'bee');
        foreach ($this->bag as $key => $value) {
            $this->assertEquals($value, $this->bag->get($key));
        }
    }
}
