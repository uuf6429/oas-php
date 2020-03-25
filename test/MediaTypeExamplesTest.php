<?php

namespace uuf6429\OpenAPI;

use PHPUnit\Framework\TestCase;
use uuf6429\OpenAPI\Spec\Path\Operation\Example\Example;
use uuf6429\OpenAPI\Spec\Path\Operation\Example\ExampleExternalValue;
use uuf6429\OpenAPI\Spec\Path\Operation\Example\Examples;
use uuf6429\OpenAPI\Spec\Path\Operation\Example\ExampleValue;
use uuf6429\OpenAPI\Spec\Path\Operation\MediaType\MediaType;
use uuf6429\OpenAPI\Spec\Path\Operation\Schema\IntegerFormat;
use uuf6429\OpenAPI\Spec\Path\Operation\Schema\IntegerSchema;
use uuf6429\OpenAPI\Spec\Path\Operation\Schema\StringSchema;

class MediaTypeExamplesTest extends TestCase
{
    /**
     * @param MediaType $sut
     * @param string $expectedJson
     *
     * @dataProvider exampleScenariosProvider
     */
    public function testExampleHandling(MediaType $sut, string $expectedJson): void
    {
        $actualJson = json_encode($sut, JSON_THROW_ON_ERROR | JSON_PRETTY_PRINT);
        $this->assertJsonStringEqualsJsonString($expectedJson, $actualJson);
    }

    public function exampleScenariosProvider(): array
    {
        return [
            'single example, with string' => [
                '$sut' => new MediaType(new StringSchema(), 'test'),
                '$expectedJson' => /** @lang JSON */ <<<'JSON'
                  {
                      "schema": {
                          "type": "string"
                      },
                      "example": "test"
                  }
                JSON
            ],

            'single example, with number' => [
                '$sut' => new MediaType(new IntegerSchema(null, IntegerFormat::int32()), 123),
                '$expectedJson' => /** @lang JSON */ <<<'JSON'
                  {
                      "schema": {
                          "type": "integer",
                          "format": "int32"
                      },
                      "example": 123
                  }
                JSON
            ],

            'single complex example, with number' => [
                '$sut' => new MediaType(
                    new StringSchema(),
                    new Examples(['key' => new Example('a key', null, new ExampleValue(123))])
                ),
                '$expectedJson' => /** @lang JSON */ <<<'JSON'
                    {
                        "schema": {
                            "type": "string"
                        },
                        "examples": {
                            "key": {
                                "summary": "a key",
                                "value": 123
                            }
                        }
                    }
                JSON
            ],

            'multiple complex examples, with string, object and array values' => [
                '$sut' => new MediaType(
                    new StringSchema(),
                    new Examples([
                        'str' => new Example('a string', null, new ExampleValue('test')),
                        'obj' => new Example('an object', null, new ExampleValue((object)['a' => 1, 'b' => 2])),
                        'arr' => new Example('an array', null, new ExampleValue([1, 2, 3])),
                    ])
                ),
                '$expectedJson' => /** @lang JSON */ <<<'JSON'
                    {
                        "schema": {
                            "type": "string"
                        },
                        "examples": {
                            "str": {
                                "summary": "a string",
                                "value": "test"
                            },
                            "obj": {
                                "summary": "an object",
                                "value": {
                                    "a": 1,
                                    "b": 2
                                }
                            },
                            "arr": {
                                "summary": "an array",
                                "value": [
                                    1,
                                    2,
                                    3
                                ]
                            }
                        }
                    }
                JSON
            ],

            'single complex example, with external value' => [
                '$sut' => new MediaType(
                    new StringSchema(),
                    new Examples([
                        'key' => new Example(
                            'a key',
                            null,
                            new ExampleExternalValue('http://example.org/examples/address-example.xml')
                        )
                    ])
                ),
                '$expectedJson' => /** @lang JSON */ <<<'JSON'
                    {
                        "schema": {
                            "type": "string"
                        },
                        "examples": {
                            "key": {
                                "summary": "a key",
                                "externalValue": "http://example.org/examples/address-example.xml"
                            }
                        }
                    }
                JSON
            ],
        ];
    }
}
