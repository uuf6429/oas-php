<?php

namespace uuf6429\OpenAPI\Spec\Server;

use JsonSerializable;
use uuf6429\OpenAPI\Helper\SerializeIfNotNull;

class Variable implements JsonSerializable
{
    use SerializeIfNotNull;

    public ?string $description;

    /** @var string[]|null */
    public ?array $enum;

    public string $default;

    public function __construct(?string $description, ?array $enum, string $default)
    {
        $this->description = $description;
        $this->enum = $enum;
        $this->default = $default;
    }
}
