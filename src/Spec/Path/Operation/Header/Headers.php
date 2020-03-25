<?php

/**
 * GENERATED CODE WARNING
 */

namespace uuf6429\OpenAPI\Spec\Path\Operation\Header;

use ArrayAccess;
use ArrayIterator;
use Countable;
use InvalidArgumentException;
use IteratorAggregate;
use JsonSerializable;
use uuf6429\OpenAPI\Helper\StaticCreator;
use function array_key_exists;

class Headers implements ArrayAccess, IteratorAggregate, Countable, JsonSerializable
{
    use StaticCreator;

    /**
     * @var array<string, HeaderInterface>
     */
    protected array $map = [];

    /**
     * @param array<string, HeaderInterface> $items
     */
    public function __construct(array $items = [])
    {
        $this->merge($items);
    }

    /**
     * @param array<string, HeaderInterface> $items
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

    public function set(string $name, HeaderInterface $item): self
    {
        $this->offsetSet($name, $item);

        return $this;
    }

    public function __get(string $name): HeaderInterface
    {
        return $this->offsetGet($name);
    }

    public function __set(string $name, HeaderInterface $item): void
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

    public function offsetGet($offset): HeaderInterface
    {
        return $this->map[$offset];
    }

    public function offsetSet($offset, $value): void
    {
        if (!$value instanceof HeaderInterface) {
            throw new InvalidArgumentException('Value must be of type HeaderInterface, ' . get_class($value) . ' given.');
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
