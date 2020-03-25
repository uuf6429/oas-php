<?php

namespace uuf6429\OpenAPI\Spec\Path\Operation\Parameter;

use uuf6429\OpenAPI\Helper\Enum;

class ParameterLocation extends Enum
{
    public static function query(): self
    {
        return new static('query');
    }

    public static function header(): self
    {
        return new static('header');
    }

    public static function path(): self
    {
        return new static('path');
    }

    public static function cookie(): self
    {
        return new static('cookie');
    }
}
