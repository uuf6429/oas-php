<?php

namespace uuf6429\OpenAPI\Spec\Path\Operation\Schema;

use JsonSerializable;
use uuf6429\OpenAPI\Spec\Path\Operation\ExternalDocumentation;
use uuf6429\OpenAPI\Helper\SerializeIfNotNull;

abstract class Schema implements SchemaInterface, JsonSerializable
{
    use SerializeIfNotNull;

    protected string $type;

    public ?string $description;

    /** @var mixed */
    public $default;

    // TODO handle other JSON Schema properties https://github.com/OAI/OpenAPI-Specification/blob/master/versions/3.0.3.md#properties

    public ?bool $nullable;

    public ?Discriminator $discriminator;

    public ?bool $readOnly;

    public ?bool $writeOnly;

    public ?Xml $xml;

    public ?ExternalDocumentation $externalDocs;

    /** @var mixed */
    public $example;

    public ?bool $deprecated;

    public function __construct(?string $description = null)
    {
        $this->description = $description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;
        return $this;
    }

    public function setDefault($default): self
    {
        $this->default = $default;
        return $this;
    }

    public function setNullable(?bool $nullable): self
    {
        $this->nullable = $nullable;
        return $this;
    }

    public function setDiscriminator(?Discriminator $discriminator): self
    {
        $this->discriminator = $discriminator;
        return $this;
    }

    public function setReadOnly(?bool $readOnly): self
    {
        $this->readOnly = $readOnly;
        return $this;
    }

    public function setWriteOnly(?bool $writeOnly): self
    {
        $this->writeOnly = $writeOnly;
        return $this;
    }

    public function setXml(?Xml $xml): self
    {
        $this->xml = $xml;
        return $this;
    }

    public function setExternalDocs(?ExternalDocumentation $externalDocs): self
    {
        $this->externalDocs = $externalDocs;
        return $this;
    }

    public function setExample($example): self
    {
        $this->example = $example;
        return $this;
    }

    public function setDeprecated(?bool $deprecated): self
    {
        $this->deprecated = $deprecated;
        return $this;
    }
}
