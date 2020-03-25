<?php

namespace uuf6429\OpenAPI\Spec\Path\Operation\Schema;

use uuf6429\OpenAPI\Helper\Enum;

class StringFormat extends Enum
{
    public static function none(): self
    {
        return new static(null);
    }

    public static function byte(): self
    {
        return new static('byte');
    }

    public static function binary(): self
    {
        return new static('binary');
    }

    public static function date(): self
    {
        return new static('date');
    }

    public static function dateTime(): self
    {
        return new static('date-time');
    }

    public static function password(): self
    {
        return new static('password');
    }

    public static function uriRef(): self
    {
        return new static('uriref');
    }
}
