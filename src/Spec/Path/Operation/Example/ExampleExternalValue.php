<?php

namespace uuf6429\OpenAPI\Spec\Path\Operation\Example;

use JsonSerializable;

class ExampleExternalValue implements ExampleValueInterface, JsonSerializable
{
    public string $url;

    public function __construct(string $url)
    {
        $this->url = $url;
    }

    public function jsonSerialize(): string
    {
        return $this->url;
    }
}
