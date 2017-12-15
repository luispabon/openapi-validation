<?php
declare(strict_types=1);

namespace AuronConsulting\OpenApi\Validator;

/**
 * Collection of errors thrown during validation.
 *
 * @author  Luis Pabon / https://github.com/AuronConsulting
 * @license MIT
 */
class ErrorCollection implements \ArrayAccess, \IteratorAggregate, \Countable
{
    /**
     * @var array
     */
    private $errors;

    public function __construct(array $items = [])
    {
        $this->errors = $items;
    }

    /** Implements \ArrayAccess */

    /**
     * @inheritdoc
     */
    public function offsetExists($offset)
    {
        return \array_key_exists($offset, $this->errors);
    }

    /**
     * @inheritdoc
     */
    public function offsetGet($offset)
    {
        return $this->errors[$offset] ?? null;
    }

    /**
     * @inheritdoc
     * @throws \InvalidArgumentException
     */
    public function offsetSet($offset, $value)
    {
        $this->doOffsetSet($offset, $value);
    }

    /**
     * Enforces types when setting an item.
     *
     * @param string|int $offset
     * @param Error      $error
     *
     * @throws \InvalidArgumentException
     */
    private function doOffsetSet($offset, Error $error): void
    {
        if ($offset !== null && \is_int($offset) === false && \is_string($offset) === false) {
            throw new \InvalidArgumentException('Invalid offset');
        }

        if ($offset === null) {
            $offset = \count($this->errors);
        }

        $this->errors[$offset] = $error;
    }

    /**
     * @inheritdoc
     */
    public function offsetUnset($offset)
    {
        if ($this->offsetExists($offset) === true) {
            unset($this->errors[$offset]);
        }
    }

    /** Implements \IteratorAggregate */

    /**
     * @inheritdoc
     */
    public function getIterator()
    {
        return new \ArrayIterator($this->errors);
    }

    /** Implements \Countable */

    /**
     * @inheritdoc
     */
    public function count()
    {
        return \count($this->errors);
    }
}
