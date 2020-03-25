<?php

namespace uuf6429\OpenAPI\Spec\Path\Operation\Schema;

class NumberSchema extends Schema
{
    protected string $type = 'number';

    public NumberFormat $format;

    public function __construct(?string $description, NumberFormat $format)
    {
        parent::__construct($description);

        $this->format = $format;
    }
}
