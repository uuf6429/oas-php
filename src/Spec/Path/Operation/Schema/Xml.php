<?php

namespace uuf6429\OpenAPI\Spec\Path\Operation\Schema;

use JsonSerializable;
use uuf6429\OpenAPI\Helper\SerializeIfNotNull;

class Xml implements JsonSerializable
{
    use SerializeIfNotNull;

    public ?string $name;

    public ?string $namespace;

    public ?string $prefix;

    public ?bool $attribute;

    public ?bool $wrapped;
}
