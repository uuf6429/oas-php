<?php

namespace uuf6429\OpenAPI\Spec\Path\Operation\Schema;

use uuf6429\OpenAPI\Helper\SerializeIfNotNull;

class Discriminator implements \JsonSerializable
{
    use SerializeIfNotNull;

    public string $propertyName;

    public ?array $mapping;

    public function __construct(string $propertyName, ?array $mapping)
    {
        $this->propertyName = $propertyName;
        $this->mapping = $mapping;
    }
}
