<?php

namespace uuf6429\OpenAPI\Spec\Path\Operation\Example;

use JsonSerializable;

class ExampleValue implements ExampleValueInterface, JsonSerializable
{
    /** @var mixed */
    public $value;

    public function __construct($value)
    {
        $this->value = $value;
    }

    public function jsonSerialize()
    {
        return $this->value;
    }
}
