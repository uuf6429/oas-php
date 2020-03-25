<?php

namespace uuf6429\OpenAPI\Spec\Path\Operation\Parameter;

use uuf6429\OpenAPI\Spec\Path\Operation\Example\Examples;
use uuf6429\OpenAPI\Spec\Path\Operation\Schema\Schema;

class SimpleParameter extends Parameter
{
    public Schema $schema;

    /**
     * @param string $name
     * @param ParameterLocation $in
     * @param Schema $schema
     * @param string|null $description
     * @param bool|null $required
     * @param bool|null $deprecated
     * @param bool|null $allowEmptyValue
     * @param mixed|Examples $examples
     */
    public function __construct(
        string $name,
        ParameterLocation $in,
        Schema $schema,
        ?string $description = null,
        ?bool $required = null,
        ?bool $deprecated = null,
        ?bool $allowEmptyValue = null,
        $examples = null
    ) {
        parent::__construct($name, $in, $description, $required, $deprecated, $allowEmptyValue, $examples);

        $this->schema = $schema;
    }
}
