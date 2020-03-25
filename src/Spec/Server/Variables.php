<?php

/**
 * GENERATED CODE WARNING
 */

namespace uuf6429\OpenAPI\Spec\Server;

use ArrayAccess;
use ArrayIterator;
use Countable;
use InvalidArgumentException;
use IteratorAggregate;
use JsonSerializable;
use uuf6429\OpenAPI\Helper\StaticCreator;
use function array_key_exists;

class Variables implements ArrayAccess, IteratorAggregate, Countable, JsonSerializable
{
    use StaticCreator;

    /**
     * @var array<string, Variable>
     */
    protected array $map = [];

    /**
     * @param array<string, Variable> $items
     */
    public function __construct(array $items = [])
    {
        $this->merge($items);
    }

    /**
     * @param array<string, Variable> $items
     *
     * @return $this
     */
    public function merge(array $items): self
    {
        foreach ($items as $key => $val) {
            $this->offsetSet($key, $val);
        }

        return $this;
    }

    public function set(string $name, Variable $item): self
    {
        $this->offsetSet($name, $item);

        return $this;
    }

    public function __get(string $name): Variable
    {
        return $this->offsetGet($name);
    }

    public function __set(string $name, Variable $item): void
    {
        $this->offsetSet($name, $item);
    }

    public function __isset(string $name): bool
    {
        return $this->offsetExists($name);
    }

    public function offsetExists($offset): bool
    {
        return array_key_exists($offset, $this->map);
    }

    public function offsetGet($offset): Variable
    {
        return $this->map[$offset];
    }

    public function offsetSet($offset, $value): void
    {
        if (!$value instanceof Variable) {
            throw new InvalidArgumentException('Value must be of type Variable, ' . get_class($value) . ' given.');
        }

        if (null === $offset) {
            $this->map[] = $value;
        } else {
            $this->map[$offset] = $value;
        }
    }

    public function offsetUnset($offset): void
    {
        unset($this->map[$offset]);
    }

    public function getIterator()
    {
        return new ArrayIterator($this->map);
    }

    public function count(): int
    {
        return count($this->map);
    }

    public function jsonSerialize(): object
    {
        return (object)$this->map;
    }
}
