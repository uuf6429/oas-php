<?php

namespace uuf6429\OpenAPI\Spec\Path\Operation\MediaType;

use JsonSerializable;
use uuf6429\OpenAPI\Helper\SerializeIfNotNull;
use uuf6429\OpenAPI\Spec\Path\Operation\Encoding\Encodings;
use uuf6429\OpenAPI\Spec\Path\Operation\Example\Examples;
use uuf6429\OpenAPI\Spec\Path\Operation\Schema\SchemaInterface;

class MediaType implements JsonSerializable
{
    use SerializeIfNotNull;

    public SchemaInterface $schema;

    /** @var mixed|Examples */
    public $examples;

    public ?Encodings $encoding;

    /**
     * @param SchemaInterface $schema
     * @param mixed|Examples $examples
     * @param null|Encodings $encoding
     */
    public function __construct(SchemaInterface $schema, $examples = null, ?Encodings $encoding = null)
    {
        $this->schema = $schema;
        $this->examples = $examples;
        $this->encoding = $encoding;
    }

    protected function getObjectVars(): array
    {
        $vars = get_object_vars($this);
        if (!$vars['examples'] instanceof Examples) {
            $vars['example'] = $vars['examples'];
            unset($vars['examples']);
        }
        return $vars;
    }
}
