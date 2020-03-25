<?php

namespace uuf6429\OpenAPI\Spec\Info;

use JsonSerializable;
use uuf6429\OpenAPI\Helper\SerializeIfNotNull;
use uuf6429\OpenAPI\Helper\StaticCreator;

class Info implements JsonSerializable
{
    use SerializeIfNotNull;
    use StaticCreator;

    public string $title ='';

    public ?string $description;

    public ?string $termsOfService;

    public ?Contact $contact;

    public ?License $license;

    public string $version='';

    public function setTitle(string $title): self
    {
        $this->title = $title;
        return $this;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;
        return $this;
    }

    public function setTermsOfService(?string $termsOfService): self
    {
        $this->termsOfService = $termsOfService;
        return $this;
    }

    public function setContact(?Contact $contact): self
    {
        $this->contact = $contact;
        return $this;
    }

    public function setLicense(?License $license): self
    {
        $this->license = $license;
        return $this;
    }

    public function setVersion(string $version): self
    {
        $this->version = $version;
        return $this;
    }
}
