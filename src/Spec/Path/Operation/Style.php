<?php

namespace uuf6429\OpenAPI\Spec\Path\Operation;

use uuf6429\OpenAPI\Helper\Enum;

class Style extends Enum
{
    public static function simple(): self
    {
        return new static('simple');
    }

    public static function label(): self
    {
        return new static('label');
    }

    public static function matrix(): self
    {
        return new static('matrix');
    }

    public static function form(): self
    {
        return new static('form');
    }

    public static function spaceDelimited(): self
    {
        return new static('spaceDelimited');
    }

    public static function pipeDelimited(): self
    {
        return new static('pipeDelimited');
    }

    public static function deepObject(): self
    {
        return new static('deepObject');
    }
}
