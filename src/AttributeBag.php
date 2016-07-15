<?php

namespace Sparta;

use ArrayIterator;
use Countable;
use IteratorAggregate;

/**
 * AttributeBag Class.
 *
 * @author  Mohammed Ashour <ashoms0a@gmail.com>
 *
 * @link    http://www.coderavine.com/
 */
class AttributeBag implements IteratorAggregate, Countable
{
    /**
     * Attribute's validators bag.
     *
     * @var array
     */
    private $items = [];

    /**
     * Add a new object to the bag with the specified key.
     *
     * @param string $key   [description]
     * @param object $value [description]
     */
    public function add($key, $value)
    {
        if (!$this->has($key)) {
            $this->items[$key] = $value;
        }
    }

    /**
     * Remove an object from the AttributeBag.
     *
     * @param string $key object key
     */
    public function remove($key)
    {
        if ($this->has($key)) {
            unset($this->items[$key]);
        }
    }

    /**
     * Check if bag has a value for the given key.
     *
     * @param string $key object key
     *
     * @return bool result
     */
    public function has($key)
    {
        if (array_key_exists($key, $this->items)) {
            return true;
        }

        return false;
    }

    /**
     * Get the value of the given key from the bag.
     *
     * @param string $key object key
     *
     * @return object validator object
     */
    public function get($key)
    {
        if (array_key_exists($key, $this->items)) {
            return $this->items[$key];
        }

        return;
    }

    /**
     * Get all items from the bag.
     *
     * @return array
     */
    public function all()
    {
        return $this->items;
    }

    /**
     * Retrieve an external iterator.
     *
     * @return ArrayIterator
     */
    public function getIterator()
    {
        return new ArrayIterator($this->items);
    }

    /**
     * Count number of attributes in the bag.
     *
     * @return int
     */
    public function count()
    {
        return count($this->items);
    }
}
