<?php

namespace uuf6429\OpenAPI\Spec\Path\Operation\Schema;

use uuf6429\OpenAPI\Helper\Enum;

class NumberFormat extends Enum
{
    public static function float(): self
    {
        return new static('float');
    }

    public static function double(): self
    {
        return new static('double');
    }
}
