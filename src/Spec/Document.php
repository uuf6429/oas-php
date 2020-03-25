<?php

namespace uuf6429\OpenAPI\Spec;

use JsonSerializable;
use uuf6429\OpenAPI\Helper\StaticCreator;
use uuf6429\OpenAPI\Spec\Component\Components;
use uuf6429\OpenAPI\Spec\Info\Info;
use uuf6429\OpenAPI\Spec\Path\Path;
use uuf6429\OpenAPI\Spec\Path\Paths;
use uuf6429\OpenAPI\Spec\Security\Requirement as SecurityRequirement;
use uuf6429\OpenAPI\Spec\Security\Requirements as SecurityRequirements;
use uuf6429\OpenAPI\Spec\Server\Server;
use uuf6429\OpenAPI\Spec\Server\Servers;
use uuf6429\OpenAPI\Helper\SerializeIfNotNull;
use uuf6429\OpenAPI\Spec\Tag\Tag;
use uuf6429\OpenAPI\Spec\Tag\Tags;

class Document implements JsonSerializable
{
    use SerializeIfNotNull;
    use StaticCreator;

    public string $openapi = '3.0.3';

    public Info $info;

    /** @var null|Servers|Server[] */
    public ?Servers $servers = null;

    /** @var null|Tags|Tag[] */
    public ?Tags $tags = null;

    /** @var Paths|Path[] */
    public Paths $paths;

    public ?Components $components = null;

    /** @var null|SecurityRequirements|SecurityRequirement[] */
    public ?SecurityRequirements $security = null;

    public function __construct()
    {
        $this->info = Info::create();
        $this->paths = Paths::create();
    }

    public function setOpenapi(string $openapi): self
    {
        $this->openapi = $openapi;
        return $this;
    }

    public function setInfo(Info $info): self
    {
        $this->info = $info;
        return $this;
    }

    public function setServers($servers): self
    {
        $this->servers = $servers;
        return $this;
    }

    public function setTags($tags): self
    {
        $this->tags = $tags;
        return $this;
    }

    public function setPaths($paths): self
    {
        $this->paths = $paths;
        return $this;
    }

    public function setComponents(?Components $components): self
    {
        $this->components = $components;
        return $this;
    }

    public function setSecurity($security): self
    {
        $this->security = $security;
        return $this;
    }
}
