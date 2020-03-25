<?php

namespace uuf6429\OpenAPI\Spec\Info;

use JsonSerializable;
use uuf6429\OpenAPI\Helper\SerializeIfNotNull;

class License implements JsonSerializable
{
    use SerializeIfNotNull;

    public string $name;

    public ?string $url;

    public function __construct(string $name, ?string $url = null)
    {
        $this->name = $name;
        $this->url = $url;
    }
}
