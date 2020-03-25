<?php

namespace uuf6429\OpenAPI\Spec\Path\Operation\Response;

use JsonSerializable;
use uuf6429\OpenAPI\Helper\SerializeIfNotNull;
use uuf6429\OpenAPI\Spec\Path\Operation\Header\Headers;
use uuf6429\OpenAPI\Spec\Path\Operation\Link\Links;
use uuf6429\OpenAPI\Spec\Path\Operation\MediaType\MediaTypes;

class Response implements ResponseInterface, JsonSerializable
{
    use SerializeIfNotNull;

    public string $description;

    public ?Headers $headers;

    public ?MediaTypes $content;

    public ?Links $links;

    public function __construct(
        string $description,
        ?Headers $headers = null,
        ?MediaTypes $content = null,
        ?Links $links = null
    ) {
        $this->description = $description;
        $this->headers = $headers;
        $this->content = $content;
        $this->links = $links;
    }
}
