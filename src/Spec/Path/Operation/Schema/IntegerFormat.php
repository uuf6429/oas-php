<?php

namespace uuf6429\OpenAPI\Spec\Path\Operation\Schema;

use uuf6429\OpenAPI\Helper\Enum;

class IntegerFormat extends Enum
{
    public static function none(): self
    {
        return new static(null);
    }

    public static function int32(): self
    {
        return new static('int32');
    }

    public static function int64(): self
    {
        return new static('int64');
    }
}
