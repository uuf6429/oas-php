<?php

/**
 * GENERATED CODE WARNING
 */

namespace uuf6429\OpenAPI\Spec\Path\Operation\Schema;

use JsonSerializable;

class SchemaReference implements SchemaInterface, JsonSerializable
{
    public string $ref;

    public static function createFromName(string $name): self
    {
        return new self("#/components/schemas/$name");
    }

    public static function createFromReference(string $ref): self
    {
        return new self($ref);
    }

    protected function __construct(string $ref = null)
    {
        $this->ref = $ref;
    }

    public function jsonSerialize(): object
    {
        return (object)['$ref' => $this->ref];
    }
}
