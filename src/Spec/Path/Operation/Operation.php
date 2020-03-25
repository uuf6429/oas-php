<?php

namespace uuf6429\OpenAPI\Spec\Path\Operation;

use JsonSerializable;
use uuf6429\OpenAPI\Helper\SerializeIfNotNull;
use uuf6429\OpenAPI\Helper\StaticCreator;
use uuf6429\OpenAPI\Spec\Path\Operation\Callback\Callbacks;
use uuf6429\OpenAPI\Spec\Path\Operation\Parameter\ParameterList;
use uuf6429\OpenAPI\Spec\Path\Operation\RequestBody\RequestBodyInterface;
use uuf6429\OpenAPI\Spec\Path\Operation\Response\Responses;
use uuf6429\OpenAPI\Spec\Security\Requirements;
use uuf6429\OpenAPI\Spec\Server\Servers;

class Operation implements JsonSerializable
{
    use SerializeIfNotNull;
    use StaticCreator;

    /** @var null|string[] */
    public ?array $tags;

    public ?string $summary;

    public ?string $description;

    public ?ExternalDocumentation $externalDocs;

    public ?string $operationId;

    public ?ParameterList $parameters;

    public ?RequestBodyInterface $requestBody;

    public Responses $responses;

    public ?Callbacks $callbacks;

    public ?bool $deprecated;

    public ?Requirements $security;

    public ?Servers $servers;

    public function __construct()
    {
        $this->responses = new Responses();
    }

    /**
     * @param string[]|null $tags
     * @return Operation
     */
    public function setTags(?array $tags): self
    {
        $this->tags = $tags;
        return $this;
    }

    public function setSummary(?string $summary): self
    {
        $this->summary = $summary;
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

    public function setOperationId(?string $operationId): self
    {
        $this->operationId = $operationId;
        return $this;
    }

    public function setParameters(?ParameterList $parameters): self
    {
        $this->parameters = $parameters;
        return $this;
    }

    public function setRequestBody(?RequestBodyInterface $requestBody): self
    {
        $this->requestBody = $requestBody;
        return $this;
    }

    public function setResponses(Responses $responses): self
    {
        $this->responses = $responses;
        return $this;
    }

    public function setCallbacks(?Callbacks $callbacks): self
    {
        $this->callbacks = $callbacks;
        return $this;
    }

    public function setDeprecated(?bool $deprecated): self
    {
        $this->deprecated = $deprecated;
        return $this;
    }

    public function setSecurity(?Requirements $security): self
    {
        $this->security = $security;
        return $this;
    }

    public function setServers(?Servers $servers): self
    {
        $this->servers = $servers;
        return $this;
    }
}
