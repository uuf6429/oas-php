<?php

namespace uuf6429\OpenAPI\Spec\Path\Operation\Schema;

class ArraySchema extends Schema
{
    protected string $type = 'array';

    public SchemaInterface $items;

    public function __construct(?string $description, SchemaInterface $items)
    {
        parent::__construct($description);

        $this->items = $items;
    }
}
