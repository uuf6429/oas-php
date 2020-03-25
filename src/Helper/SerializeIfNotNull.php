<?php

namespace uuf6429\OpenAPI\Helper;

use JsonSerializable;

trait SerializeIfNotNull
{
    public function jsonSerialize(): object
    {
        return (object)array_filter(
            array_map(
                static function ($value) {
                    return ($value instanceof JsonSerializable)
                        ? $value->jsonSerialize() : $value;
                },
                $this->getObjectVars()
            ),
            static function ($value) {
                return $value !== null;
            }
        );
    }

    protected function getObjectVars(): array
    {
        return get_object_vars($this);
    }
}
