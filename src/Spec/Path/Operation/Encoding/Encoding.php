<?php

namespace uuf6429\OpenAPI\Spec\Path\Operation\Encoding;

use uuf6429\OpenAPI\Spec\Path\Operation\Header\Headers;
use uuf6429\OpenAPI\Spec\Path\Operation\Style;

class Encoding
{
    public ?string $contentType;
    public ?Headers $headers;
    public ?Style $style;
    public ?bool $explode;
    public ?bool $allowReserved;

    public function __construct(
        ?string $contentType = null,
        ?Headers $headers = null,
        ?Style $style = null,
        ?bool $explode = null,
        ?bool $allowReserved = null
    ) {
        $this->contentType = $contentType;
        $this->headers = $headers;
        $this->style = $style;
        $this->explode = $explode;
        $this->allowReserved = $allowReserved;
    }
}
