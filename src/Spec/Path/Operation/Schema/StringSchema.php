<?php

namespace uuf6429\OpenAPI\Spec\Path\Operation\Schema;

class StringSchema extends Schema
{
    protected string $type = 'string';

    public StringFormat $format;

    public function __construct(?string $description = null, ?StringFormat $format = null)
    {
        parent::__construct($description);

        $this->format = $format ?? StringFormat::none();
    }
}
