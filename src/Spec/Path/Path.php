<?php

namespace uuf6429\OpenAPI\Spec\Path;

use JsonSerializable;
use uuf6429\OpenAPI\Helper\SerializeIfNotNull;
use uuf6429\OpenAPI\Helper\StaticCreator;
use uuf6429\OpenAPI\Spec\Path\Operation\Operation;
use uuf6429\OpenAPI\Spec\Path\Operation\Parameter\ParameterList;
use uuf6429\OpenAPI\Spec\Server\Servers;

class Path implements JsonSerializable
{
    use SerializeIfNotNull;
    use StaticCreator;

    public ?string $summary;

    public ?string $description;

    public ?Operation $get;

    public ?Operation $put;

    public ?Operation $post;

    public ?Operation $delete;

    public ?Operation $options;

    public ?Operation $head;

    public ?Operation $patch;

    public ?Operation $trace;

    public ?Servers $servers;

    public ?ParameterList $parameters;

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

    public function setGet(?Operation $get): self
    {
        $this->get = $get;
        return $this;
    }

    public function setPut(?Operation $put): self
    {
        $this->put = $put;
        return $this;
    }

    public function setPost(?Operation $post): self
    {
        $this->post = $post;
        return $this;
    }

    public function setDelete(?Operation $delete): self
    {
        $this->delete = $delete;
        return $this;
    }

    public function setOptions(?Operation $options): self
    {
        $this->options = $options;
        return $this;
    }

    public function setHead(?Operation $head): self
    {
        $this->head = $head;
        return $this;
    }

    public function setPatch(?Operation $patch): self
    {
        $this->patch = $patch;
        return $this;
    }

    public function setTrace(?Operation $trace): self
    {
        $this->trace = $trace;
        return $this;
    }

    public function setServers(?Servers $servers): self
    {
        $this->servers = $servers;
        return $this;
    }

    public function setParameters(?ParameterList $parameters): self
    {
        $this->parameters = $parameters;
        return $this;
    }
}
