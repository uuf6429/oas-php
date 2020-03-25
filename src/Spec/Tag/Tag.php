<?php

namespace uuf6429\OpenAPI\Spec\Tag;

use JsonSerializable;
use uuf6429\OpenAPI\Helper\SerializeIfNotNull;
use uuf6429\OpenAPI\Helper\StaticCreator;
use uuf6429\OpenAPI\Spec\Path\Operation\ExternalDocumentation;

class Tag implements JsonSerializable
{
    use SerializeIfNotNull;
    use StaticCreator;

    public string $name;

    public ?string $description;

    public ?ExternalDocumentation $externalDocs;

    public function setName(string $name): self
    {
        $this->name = $name;
        return $this;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;
        return $this;
    }

    public function setExternalDocs(?ExternalDocumentation $externalDocs): self
    {
        $this->externalDocs = $externalDocs;
        return $this;
    }
}
