<?php

namespace uuf6429\OpenAPI\Helper;

use JsonSerializable;

class Enum implements JsonSerializable
{
    /** @var mixed */
    protected $value;

    protected function __construct($value)
    {
        $this->value = $value;
    }

    public function jsonSerialize()
    {
        return $this->value;
    }
}
