<?php

namespace uuf6429\OpenAPI\Spec\Server;

use JsonSerializable;
use uuf6429\OpenAPI\Helper\SerializeIfNotNull;

class Server implements JsonSerializable
{
    use SerializeIfNotNull;

    public ?string $description;

    public string $url;

    public ?Variables $variables;

    public function __construct(string $url, ?string $description = null, ?Variables $variables = null)
    {
        $this->url = $url;
        $this->description = $description;
        $this->variables = $variables;
    }
}
