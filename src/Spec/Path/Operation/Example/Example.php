<?php

namespace uuf6429\OpenAPI\Spec\Path\Operation\Example;

use JsonSerializable;
use uuf6429\OpenAPI\Helper\SerializeIfNotNull;

class Example implements ExampleInterface, JsonSerializable
{
    use SerializeIfNotNull;

    public string $summary;

    public ?string $description;

    public ExampleValueInterface $value;

    public function __construct(string $summary, ?string $description, ExampleValueInterface $value)
    {
        $this->summary = $summary;
        $this->description = $description;
        $this->value = $value;
    }

    protected function getObjectVars(): array
    {
        $vars = get_object_vars($this);
        if ($vars['value'] instanceof ExampleExternalValue) {
            $vars['externalValue'] = $vars['value'];
            unset($vars['value']);
        }
        return $vars;
    }
}
