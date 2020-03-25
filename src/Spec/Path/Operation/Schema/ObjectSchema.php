<?php

namespace uuf6429\OpenAPI\Spec\Path\Operation\Schema;

class ObjectSchema extends Schema
{
    protected string $type = 'object';

    /** @var null|string[] */
    public ?array $required;

    public ?Schemas $properties;

    /** @var null|bool|SchemaInterface */
    public $additionalProperties;

    /**
     * @param null|string $description
     * @param null|Schemas $properties
     * @param null|string[] $required
     * @param null|bool|SchemaInterface $additionalProperties
     */
    public function __construct(?string $description, ?Schemas $properties, ?array $required = null, $additionalProperties = null)
    {
        parent::__construct($description);

        $this->required = $required;
        $this->properties = $properties;
        $this->additionalProperties = $additionalProperties;
    }
}
