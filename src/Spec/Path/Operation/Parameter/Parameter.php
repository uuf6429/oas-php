<?php

namespace uuf6429\OpenAPI\Spec\Path\Operation\Parameter;

use JsonSerializable;
use uuf6429\OpenAPI\Helper\SerializeIfNotNull;
use uuf6429\OpenAPI\Spec\Path\Operation\Example\Examples;

/**
 * @todo Add other fields after "Fixed Fields": https://github.com/OAI/OpenAPI-Specification/blob/master/versions/3.0.3.md#fixed-fields-10
 */
abstract class Parameter implements ParameterInterface, JsonSerializable
{
    use SerializeIfNotNull;

    public string $name;

    public ParameterLocation $in;

    public ?string $description;

    public ?bool $required;

    public ?bool $deprecated;

    public ?bool $allowEmptyValue;

    /** @var mixed|Examples */
    public $examples;

    /**
     * @param string $name
     * @param ParameterLocation $in
     * @param string|null $description
     * @param bool|null $required
     * @param bool|null $deprecated
     * @param bool|null $allowEmptyValue
     * @param mixed|Examples $examples
     */
    public function __construct(
        string $name,
        ParameterLocation $in,
        ?string $description = null,
        ?bool $required = null,
        ?bool $deprecated = null,
        ?bool $allowEmptyValue = null,
        $examples = null
    ) {
        $this->name = $name;
        $this->in = $in;
        $this->description = $description;
        $this->required = $required;
        $this->deprecated = $deprecated;
        $this->allowEmptyValue = $allowEmptyValue;
        $this->examples = $examples;
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
