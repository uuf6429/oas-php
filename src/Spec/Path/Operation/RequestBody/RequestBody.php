<?php

namespace uuf6429\OpenAPI\Spec\Path\Operation\RequestBody;

use JsonSerializable;
use uuf6429\OpenAPI\Helper\SerializeIfNotNull;
use uuf6429\OpenAPI\Spec\Path\Operation\MediaType\MediaTypes;

class RequestBody implements RequestBodyInterface, JsonSerializable
{
    use SerializeIfNotNull;

    public ?string $description;

    public MediaTypes $content;

    public ?bool $required;

    public function __construct(MediaTypes $content, ?string $description = null, ?bool $required = null)
    {
        $this->description = $description;
        $this->content = $content;
        $this->required = $required;
    }
}
