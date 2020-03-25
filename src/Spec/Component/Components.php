<?php

namespace uuf6429\OpenAPI\Spec\Component;

use JsonSerializable;
use uuf6429\OpenAPI\Helper\SerializeIfNotNull;
use uuf6429\OpenAPI\Spec\Path\Operation\Callback\Callbacks;
use uuf6429\OpenAPI\Spec\Path\Operation\Example\Examples;
use uuf6429\OpenAPI\Spec\Path\Operation\Header\Headers;
use uuf6429\OpenAPI\Spec\Path\Operation\Link\Links;
use uuf6429\OpenAPI\Spec\Path\Operation\Parameter\ParameterMap;
use uuf6429\OpenAPI\Spec\Path\Operation\RequestBody\RequestBodies;
use uuf6429\OpenAPI\Spec\Path\Operation\Response\Responses;
use uuf6429\OpenAPI\Spec\Path\Operation\Schema\Schemas;
use uuf6429\OpenAPI\Spec\Path\Operation\SecurityScheme\SecuritySchemes;

class Components implements JsonSerializable
{
    use SerializeIfNotNull;

    public ?Schemas $schemas;

    public ?Responses $responses;

    public ?ParameterMap $parameters;

    public ?Examples $examples;

    public ?RequestBodies $requestBodies;

    public ?Headers $headers;

    public ?SecuritySchemes $securitySchemes;

    public ?Links $links;

    public ?Callbacks $callbacks;
}
