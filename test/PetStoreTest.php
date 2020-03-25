<?php

namespace uuf6429\OpenAPI;

use PHPUnit\Framework\TestCase;
use uuf6429\OpenAPI\Spec\Component\Components;
use uuf6429\OpenAPI\Spec\Document;
use uuf6429\OpenAPI\Spec\Info\Info;
use uuf6429\OpenAPI\Spec\Info\License;
use uuf6429\OpenAPI\Spec\Path\Operation\Header\Headers;
use uuf6429\OpenAPI\Spec\Path\Operation\Header\SimpleHeader;
use uuf6429\OpenAPI\Spec\Path\Operation\MediaType\MediaType;
use uuf6429\OpenAPI\Spec\Path\Operation\MediaType\MediaTypes;
use uuf6429\OpenAPI\Spec\Path\Operation\Operation;
use uuf6429\OpenAPI\Spec\Path\Operation\Parameter\ParameterList;
use uuf6429\OpenAPI\Spec\Path\Operation\Parameter\ParameterLocation;
use uuf6429\OpenAPI\Spec\Path\Operation\Parameter\SimpleParameter;
use uuf6429\OpenAPI\Spec\Path\Operation\Response\Response;
use uuf6429\OpenAPI\Spec\Path\Operation\Response\Responses;
use uuf6429\OpenAPI\Spec\Path\Operation\Schema\ArraySchema;
use uuf6429\OpenAPI\Spec\Path\Operation\Schema\IntegerFormat;
use uuf6429\OpenAPI\Spec\Path\Operation\Schema\IntegerSchema;
use uuf6429\OpenAPI\Spec\Path\Operation\Schema\ObjectSchema;
use uuf6429\OpenAPI\Spec\Path\Operation\Schema\SchemaReference;
use uuf6429\OpenAPI\Spec\Path\Operation\Schema\Schemas;
use uuf6429\OpenAPI\Spec\Path\Operation\Schema\StringSchema;
use uuf6429\OpenAPI\Spec\Path\Path;
use uuf6429\OpenAPI\Spec\Path\Paths;
use uuf6429\OpenAPI\Spec\Server\Server;
use uuf6429\OpenAPI\Spec\Server\Servers;

class PetStoreTest extends TestCase
{
    public function testPetStoreScenario(): void
    {
        $doc = $this->buildPetStoreScenario();

        $actualJson = json_encode($doc, JSON_PRETTY_PRINT | JSON_THROW_ON_ERROR);
        $expectedJsonFile = __DIR__ . '/petstore.json';

        $this->assertJsonStringEqualsJsonFile($expectedJsonFile, $actualJson);
    }

    private function buildPetStoreScenario(): Document
    {
        $document = Document::create()
            ->setOpenapi('3.0.0')
            ->setInfo(
                Info::create()
                    ->setVersion('1.0.0')
                    ->setTitle('Swagger Petstore')
                    ->setLicense(new License('MIT'))
            )
            ->setServers(
                Servers::create()
                    ->add(new Server('http://petstore.swagger.io/v1'))
            )
            ->setPaths(
                Paths::create()
                    ->set(
                        '/pets',
                        Path::create()
                            ->setGet(
                                Operation::create()
                                    ->setSummary('List all pets')
                                    ->setOperationId('listPets')
                                    ->setTags(['pets'])
                                    ->setParameters(
                                        new ParameterList(
                                            new SimpleParameter(
                                                'limit',
                                                ParameterLocation::query(),
                                                new IntegerSchema(null, IntegerFormat::int32()),
                                                'How many items to return at one time (max 100)',
                                                false
                                            )
                                        )
                                    )
                                ->setResponses(
                                    new Responses(
                                        [
                                            '200' => new Response(
                                                'A paged array of pets',
                                                new Headers([
                                                    'x-next' => new SimpleHeader(
                                                        new StringSchema(),
                                                        'A link to the next page of responses'
                                                    )
                                                ]),
                                                new MediaTypes([
                                                    'application/json' => new MediaType(
                                                        SchemaReference::createFromName('Pets')
                                                    )
                                                ])
                                            ),
                                            'default' => new Response(
                                                'unexpected error',
                                                null,
                                                new MediaTypes([
                                                    'application/json' => new MediaType(
                                                        SchemaReference::createFromName('Error')
                                                    )
                                                ])
                                            )
                                        ]
                                    )
                                )
                            )
                    )
            );

        $document->paths['/pets']->post = new Operation();
        $document->paths['/pets']->post->summary = 'Create a pet';
        $document->paths['/pets']->post->operationId = 'createPets';
        $document->paths['/pets']->post->tags = ['pets'];
        $document->paths['/pets']->post->responses = new Responses(
            [
                '201' => new Response(
                    'Null response'
                ),
                'default' => new Response(
                    'unexpected error',
                    null,
                    new MediaTypes([
                        'application/json' => new MediaType(
                            SchemaReference::createFromName('Error')
                        )
                    ])
                ),
            ]
        );
        $document->paths['/pets/{petId}'] = new Path();
        $document->paths['/pets/{petId}']->get = new Operation();
        $document->paths['/pets/{petId}']->get->summary = 'Info for a specific pet';
        $document->paths['/pets/{petId}']->get->operationId = 'showPetById';
        $document->paths['/pets/{petId}']->get->tags = ['pets'];
        $document->paths['/pets/{petId}']->get->parameters = new ParameterList(
            new SimpleParameter(
                'petId',
                ParameterLocation::path(),
                new StringSchema(),
                'The id of the pet to retrieve',
                true
            )
        );
        $document->paths['/pets/{petId}']->get->responses = new Responses(
            [
                '200' => new Response(
                    'Expected response to a valid request',
                    null,
                    new MediaTypes([
                        'application/json' => new MediaType(
                            SchemaReference::createFromName('Pet')
                        )
                    ])
                ),
                'default' => new Response(
                    'unexpected error',
                    null,
                    new MediaTypes([
                        'application/json' => new MediaType(
                            SchemaReference::createFromName('Error')
                        )
                    ])
                ),
            ]
        );

        $document->components = new Components();
        $document->components->schemas = new Schemas(
            [
                'Pet' => new ObjectSchema(
                    null,
                    new Schemas(
                        [
                            'id' => new IntegerSchema(null, IntegerFormat::int64()),
                            'name' => new StringSchema(),
                            'tag' => new StringSchema(),
                        ]
                    ),
                    ['id', 'name']
                ),
                'Pets' => new ArraySchema(null, SchemaReference::createFromName('Pet')),
                'Error' => new ObjectSchema(
                    null,
                    new Schemas(
                        [
                            'code' => new IntegerSchema(null, IntegerFormat::int32()),
                            'message' => new StringSchema(),
                        ]
                    ),
                    ['code', 'message']
                ),
            ]
        );

        return $document;
    }
}
