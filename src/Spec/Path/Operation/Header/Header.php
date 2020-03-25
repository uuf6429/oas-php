<?php

namespace uuf6429\OpenAPI\Spec\Path\Operation\Header;

use JsonSerializable;
use uuf6429\OpenAPI\Helper\SerializeIfNotNull;

/**
 * @todo Add other fields after "Fixed Fields": https://github.com/OAI/OpenAPI-Specification/blob/master/versions/3.0.3.md#fixed-fields-10
 */
abstract class Header implements HeaderInterface, JsonSerializable
{
    use SerializeIfNotNull;

    public ?string $description;
    public ?bool $required;
    public ?bool $deprecated;
    public ?bool $allowEmptyValue;

    public function __construct(
        ?string $description = null,
        ?bool $required = null,
        ?bool $deprecated = null,
        ?bool $allowEmptyValue = null
    ) {
        $this->description = $description;
        $this->required = $required;
        $this->deprecated = $deprecated;
        $this->allowEmptyValue = $allowEmptyValue;
    }
}
