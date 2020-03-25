<?php

namespace uuf6429\OpenAPI\Spec\Path\Operation\Parameter;

use uuf6429\OpenAPI\Spec\Path\Operation\Example\Examples;
use uuf6429\OpenAPI\Spec\Path\Operation\MediaType\MediaTypes;

class ComplexParameter extends Parameter
{
    public MediaTypes $content;

    /**
     * @param string $name
     * @param ParameterLocation $in
     * @param MediaTypes $content
     * @param string|null $description
     * @param bool|null $required
     * @param bool|null $deprecated
     * @param bool|null $allowEmptyValue
     * @param mixed|Examples $examples
     */
    public function __construct(
        string $name,
        ParameterLocation $in,
        MediaTypes $content,
        ?string $description = null,
        ?bool $required = null,
        ?bool $deprecated = null,
        ?bool $allowEmptyValue = null,
        $examples = null
    ) {
        parent::__construct($name, $in, $description, $required, $deprecated, $allowEmptyValue, $examples);

        $this->content = $content;
    }
}
