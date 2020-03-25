<?php

namespace uuf6429\OpenAPI\Spec\Path\Operation\Header;

use uuf6429\OpenAPI\Spec\Path\Operation\Schema\Schema;

class SimpleHeader extends Header
{
    public Schema $schema;

    public function __construct(
        Schema $schema,
        ?string $description = null,
        ?bool $required = null,
        ?bool $deprecated = null,
        ?bool $allowEmptyValue = null
    ) {
        parent::__construct($description, $required, $deprecated, $allowEmptyValue);

        $this->schema = $schema;
    }
}
