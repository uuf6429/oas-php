<?php

namespace uuf6429\OpenAPI\Spec\Info;

use JsonSerializable;
use uuf6429\OpenAPI\Helper\SerializeIfNotNull;
use uuf6429\OpenAPI\Helper\StaticCreator;

class Contact implements JsonSerializable
{
    use SerializeIfNotNull;
    use StaticCreator;

    public string $name;

    public ?string $url;

    public ?string $email;

    public function setName(string $name): self
    {
        $this->name = $name;
        return $this;
    }

    public function setUrl(?string $url): self
    {
        $this->url = $url;
        return $this;
    }

    public function setEmail(?string $email): self
    {
        $this->email = $email;
        return $this;
    }
}
