<?php
namespace Sparta;

use Countable;

/**
 * Class RulesBag
 *
 * @package Sparta
 * @author  Mohammed Ashour <ashoms0a@gmail.com>
 * @link    http://www.coderavine.com/
 */
class RulesBag implements Countable
{
    /**
     * Attributes list
     *
     * @var AttributeBag
     */
    protected $attributes;

    /**
     * RulesBag constructor.
     *
     */
    public function __construct()
    {
        $this->attributes = new AttributeBag();
    }

    /**
     * Add a new entry to our attribute bag
     *
     * @param $key
     * @param $value
     */
    public function add($key, $value)
    {
        if (!$this->attributes->has($key) && $value != null) {
            $this->attributes->add($key, $value);
        }
    }

    /**
     * Get total number of attributes
     *
     * @return integer
     */
    public function count()
    {
        return count($this->attributes);
    }

    /**
     * Get all attributes from the bag
     *
     * @return array
     */
    public function all()
    {
        return $this->attributes;
    }

    /**
     * Check if attributes bag has rules for a given attribute
     *
     * @param string $key attribute key
     *
     * @return bool
     */
    public function has($key)
    {
        if ($this->attributes->has($key)) {
            return true;
        }
        return false;
    }

    /**
     * An alias for "has" method to provide more readable syntax
     *
     * @param string $key attribute key
     *
     * @return bool
     */
    public function hasRulesFor($key)
    {
        return $this->attributes->has($key);
    }

    /**
     * Get attribute's validators from attributes bag
     *
     * @param string $key attribute key
     *
     * @return mixed|null
     */
    public function get($key)
    {
        return $this->attributes->get($key);
    }

    /**
     * An alias for the method "get" to provide more readable syntax
     *
     * @param string $key attribute key
     *
     * @return mixed
     */
    public function getRuleFor($key)
    {
        return $this->get($key);
    }

    /**
     * Remove an attribute from the attributes bag
     *
     * @param string $key attribute key
     *
     * @return void
     */
    public function remove($key)
    {
        $this->attributes->remove($key);
    }

    /**
     * Get a list of all attributes names from the attribute bags
     *
     * @return array
     */
    public function attributes()
    {
        return array_keys($this->attributes->all());
    }

    /**
     * Determine if the attributes bag has at least attribute along with assigned
     * rules to be processed by the Validation object
     *
     * @return bool
     */
    public function hasRules()
    {
        return ($this->count()) ? true : false;
    }
}
