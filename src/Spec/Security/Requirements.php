<?php

/**
 * GENERATED CODE WARNING
 */

namespace uuf6429\OpenAPI\Spec\Security;

use ArrayAccess;
use ArrayIterator;
use Countable;
use InvalidArgumentException;
use IteratorAggregate;
use JsonSerializable;
use uuf6429\OpenAPI\Helper\StaticCreator;
use function array_key_exists;
use function array_values;

class Requirements implements ArrayAccess, IteratorAggregate, Countable, JsonSerializable
{
    use StaticCreator;

    /**
     * @var Requirement[]
     */
    protected array $array = [];

    public function __construct(Requirement ...$items)
    {
        $this->add(...$items);
    }

    public function add(Requirement ...$items)
    {
        $this->array = array_merge($this->array, $items);
    }

    public function offsetExists($offset): bool
    {
        return array_key_exists($offset, $this->array);
    }

    public function offsetGet($offset): Requirement
    {
        return $this->array[$offset];
    }

    public function offsetSet($offset, $value): void
    {
        if (!$value instanceof Requirement) {
            throw new InvalidArgumentException('Value must be of type Requirement, ' . get_class($value) . ' given.');
        }

        if (null === $offset) {
            $this->array[] = $value;
        } else {
            $this->array[$offset] = $value;
        }
    }

    public function offsetUnset($offset): void
    {
        unset($this->array[$offset]);
    }

    public function getIterator()
    {
        return new ArrayIterator($this->array);
    }

    public function count(): int
    {
        return count($this->array);
    }

    public function jsonSerialize(): array
    {
        return array_values($this->array);
    }
}
