<?php

namespace uuf6429\OpenAPI\Spec\Path\Operation\Header;

use uuf6429\OpenAPI\Spec\Path\Operation\MediaType\MediaTypes;

class ComplexHeader extends Header
{
    public MediaTypes $content;

    public function __construct(
        MediaTypes $content,
        ?string $description = null,
        ?bool $required = null,
        ?bool $deprecated = null,
        ?bool $allowEmptyValue = null
    ) {
        parent::__construct($description, $required, $deprecated, $allowEmptyValue);

        $this->content = $content;
    }
}
