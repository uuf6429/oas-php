<?php

namespace uuf6429\OpenAPI\Spec\Path\Operation\Schema;

class IntegerSchema extends Schema
{
    protected string $type = 'integer';

    public IntegerFormat $format;

    public function __construct(?string $description = null, ?IntegerFormat $format = null)
    {
        parent::__construct($description);

        $this->format = $format ?? IntegerFormat::none();
    }
}
