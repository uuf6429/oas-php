<?php

namespace uuf6429\OpenAPI\Helper;

trait StaticCreator
{
    public static function create(): self
    {
        return new static();
    }
}