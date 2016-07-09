<?php
use Sparta\RulesBag;
use PHPUnit\Framework\TestCase;

/**
 * Class RulesBagTest
 *
 * @package Sparta
 * @author  Mohammed Ashour <ashoms0a@gmail.com>
 * @link    http://www.coderavine.com/
 */
class RulesBagTest extends TestCase
{

    /**
     * @var RuleParser
     */
    protected $bag;


    /**
     * Test SetUp
     */
    public function setUp()
    {
        $this->bag = new RulesBag();

    }


    /**
     * Test adding element to the rule bag
     *
     * @return void
     */
    public function testAddElementToBag()
    {
        $this->populateBag();
        $this->assertEquals(3, $this->bag->count());
        
    }

    /**
     * Ensure that count return the total number of element in a bag
     *
     * @return void
     */
    public function testCountElementsInBag()
    {
        $this->assertEquals(0, $this->bag->count());
        $this->bag->add('foo', 'bar');
        $this->assertEquals(1, $this->bag->count());
    }

    /**
     * Ensure that all retrieve all elements from the bag
     *
     * @return void
     */
    public function testGettingAllElementsFromBag()
    {
        $this->populateBag();
        $elements = $this->bag->all();
        $this->assertEquals(3, count($elements));
    }

    /**
     * Ensure that has check for the existence of certain element in the bag
     *
     * @return void
     */
    public function testExistingOfElementInBag()
    {
        $this->populateBag();
        $this->assertTrue($this->bag->has('var1'));
        $this->assertTrue($this->bag->has('var2'));
        $this->assertTrue($this->bag->has('var3'));
        $this->assertFalse($this->bag->has('var 1'));
        $this->assertFalse($this->bag->has('var'));
        $this->assertFalse($this->bag->has('invalid var'));
    }

    /**
     * Ensure that hasRulesFor check for the existence of an element in the bag
     *
     * @return void
     */
    public function testHasElementsForSpecificKey()
    {
        $this->populateBag();
        $this->assertTrue($this->bag->hasRulesFor('var1'));
        $this->assertTrue($this->bag->hasRulesFor('var2'));
        $this->assertTrue($this->bag->hasRulesFor('var3'));
    }

    /**
     * Ensure that get retrieve  an element from bag
     *
     * @return void
     */
    public function testGetElementFromBag()
    {
        $this->populateBag();
        $this->assertEquals('value1', $this->bag->get('var1'));

    }

    /**
     * Ensure that getRuleFor retrieve  an element from bag
     *
     * @return void
     */
    public function testGetElementFromBagAlias()
    {
        $this->populateBag();
        $this->assertEquals('value1', $this->bag->getRuleFor('var1'));
    }

    /**
     * Ensure that remove deletes and element from the bag
     *
     * @return void
     */
    public function testRemoveElementFromBag()
    {
        $this->populateBag();
        $this->assertEquals(3, $this->bag->count());
        $this->bag->remove('var2');
        $this->assertEquals(2, $this->bag->count());
    }

    /**
     * Ensure that attributes get an array containing all array keys
     *
     * @return void
     */
    public function testGetElementsKeysListFromBag()
    {
        $this->populateBag();
        $this->assertEquals(['var1', 'var2', 'var3'], $this->bag->attributes());
    }

    /**
     * Ensure that hasRules return true when the bag has element
     * and false otherwise
     *
     * @return void
     */
    public function testIfBagHasAtLeastOneElements()
    {
        $this->assertFalse($this->bag->hasRules());
        $this->populateBag();
        $this->assertTrue($this->bag->hasRules());
    }

    /**
     *
     */
    public function populateBag()
    {
        $data = [
            'var1' => 'value1',
            'var2' => 'value2',
            'var3' => 'value3',
        ];

        foreach ($data as $key => $value) {
            $this->bag->add($key, $value);
        }
    }

}
