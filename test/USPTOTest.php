<?php

namespace uuf6429\OpenAPI;

use PHPUnit\Framework\TestCase;
use uuf6429\OpenAPI\Spec\Component\Components;
use uuf6429\OpenAPI\Spec\Document;
use uuf6429\OpenAPI\Spec\Info\Contact;
use uuf6429\OpenAPI\Spec\Info\Info;
use uuf6429\OpenAPI\Spec\Path\Operation\MediaType\MediaType;
use uuf6429\OpenAPI\Spec\Path\Operation\MediaType\MediaTypes;
use uuf6429\OpenAPI\Spec\Path\Operation\Operation;
use uuf6429\OpenAPI\Spec\Path\Operation\Parameter\ParameterList;
use uuf6429\OpenAPI\Spec\Path\Operation\Parameter\ParameterLocation;
use uuf6429\OpenAPI\Spec\Path\Operation\Parameter\SimpleParameter;
use uuf6429\OpenAPI\Spec\Path\Operation\RequestBody\RequestBody;
use uuf6429\OpenAPI\Spec\Path\Operation\Response\Response;
use uuf6429\OpenAPI\Spec\Path\Operation\Schema\ArraySchema;
use uuf6429\OpenAPI\Spec\Path\Operation\Schema\IntegerSchema;
use uuf6429\OpenAPI\Spec\Path\Operation\Schema\ObjectSchema;
use uuf6429\OpenAPI\Spec\Path\Operation\Schema\SchemaReference;
use uuf6429\OpenAPI\Spec\Path\Operation\Schema\Schemas;
use uuf6429\OpenAPI\Spec\Path\Operation\Schema\StringFormat;
use uuf6429\OpenAPI\Spec\Path\Operation\Schema\StringSchema;
use uuf6429\OpenAPI\Spec\Path\Path;
use uuf6429\OpenAPI\Spec\Server\Server;
use uuf6429\OpenAPI\Spec\Server\Servers;
use uuf6429\OpenAPI\Spec\Server\Variable;
use uuf6429\OpenAPI\Spec\Server\Variables;
use uuf6429\OpenAPI\Spec\Tag\Tag;
use uuf6429\OpenAPI\Spec\Tag\Tags;

class USPTOTest extends TestCase
{
    public function testUSPTOScenario(): void
    {
        $doc = $this->buildUSPTOScenario();

        $actualJson = json_encode($doc, JSON_PRETTY_PRINT | JSON_THROW_ON_ERROR);
        $expectedJsonFile = __DIR__ . '/uspto.json';

        $this->assertJsonStringEqualsJsonFile($expectedJsonFile, $actualJson);
    }

    private function buildUSPTOScenario(): Document
    {
        $document = Document::create()
            ->setOpenapi('3.0.1')
            ->setInfo(
                Info::create()
                    ->setVersion('1.0.0')
                    ->setTitle('USPTO Data Set API')
                    ->setDescription('The Data Set API (DSAPI) allows the public users to discover and search USPTO exported data sets. This is a generic API that allows USPTO users to make any CSV based data files searchable through API. With the help of GET call, it returns the list of data fields that are searchable. With the help of POST call, data can be fetched based on the filters on the field names. Please note that POST call is used to search the actual data. The reason for the POST call is that it allows users to specify any complex search criteria without worry about the GET size limitations as well as encoding of the input parameters.')
                    ->setContact(
                        Contact::create()
                            ->setName('Open Data Portal')
                            ->setEmail('developer@uspto.gov')
                            ->setUrl('https://developer.uspto.gov')
                    )
            )
            ->setServers(
                Servers::create()
                    ->add(
                        new Server(
                            '{scheme}://developer.uspto.gov/ds-api',
                            null,
                            new Variables([
                                'scheme' => new Variable(
                                    'The Data Set API is accessible via https and http',
                                    ['https', 'http'],
                                    'https'
                                ),
                            ])
                        )
                    )
            )
            ->setTags(
                Tags::create()
                    ->add(
                        Tag::create()
                            ->setName('metadata')
                            ->setDescription('Find out about the data sets'),
                        Tag::create()
                            ->setName('search')
                            ->setDescription('Search a data set'),
                        )
            );

        $document->paths['/'] = new Path();
        $document->paths['/']->get = new Operation();
        $document->paths['/']->get->tags = ['metadata'];
        $document->paths['/']->get->operationId = 'list-data-sets';
        $document->paths['/']->get->summary = 'List available data sets';
        $document->paths['/']->get->responses['200'] = new Response(
            'Returns a list of data sets',
            null,
            new MediaTypes([
                'application/json' => new MediaType(
                    SchemaReference::createFromName('dataSetList'),
                    [
                        'total' => 2,
                        'apis' => [
                            [
                                'apiKey' => 'oa_citations',
                                'apiVersionNumber' => 'v1',
                                'apiUrl' => 'https://developer.uspto.gov/ds-api/oa_citations/v1/fields',
                                'apiDocumentationUrl' => 'https://developer.uspto.gov/ds-api-docs/index.html?url=https://developer.uspto.gov/ds-api/swagger/docs/oa_citations.json',
                            ],
                            [
                                'apiKey' => 'cancer_moonshot',
                                'apiVersionNumber' => 'v1',
                                'apiUrl' => 'https://developer.uspto.gov/ds-api/cancer_moonshot/v1/fields',
                                'apiDocumentationUrl' => 'https://developer.uspto.gov/ds-api-docs/index.html?url=https://developer.uspto.gov/ds-api/swagger/docs/cancer_moonshot.json',
                            ],
                        ],
                    ]
                )
            ])
        );

        $document->paths['/{dataset}/{version}/fields'] = new Path();
        $document->paths['/{dataset}/{version}/fields']->get = new Operation();
        $document->paths['/{dataset}/{version}/fields']->get->tags = ['metadata'];
        $document->paths['/{dataset}/{version}/fields']->get->summary = 'Provides the general information about the API and the list of fields that can be used to query the dataset.';
        $document->paths['/{dataset}/{version}/fields']->get->description = 'This GET API returns the list of all the searchable field names that are in the oa_citations. Please see the \'fields\' attribute which returns an array of field names. Each field or a combination of fields can be searched using the syntax options shown below.';
        $document->paths['/{dataset}/{version}/fields']->get->operationId = 'list-searchable-fields';
        $document->paths['/{dataset}/{version}/fields']->get->parameters = new ParameterList(
            new SimpleParameter(
                'dataset',
                ParameterLocation::path(),
                new StringSchema(),
                'Name of the dataset.',
                true,
                null,
                null,
                'oa_citations'
            ),
            new SimpleParameter(
                'version',
                ParameterLocation::path(),
                new StringSchema(),
                'Version of the dataset.',
                true,
                null, null, 'v1'
            )
        );
        $document->paths['/{dataset}/{version}/fields']->get->responses['200'] = new Response(
            'The dataset API for the given version is found and it is accessible to consume.',
            null,
            new MediaTypes([
                'application/json' => new MediaType(
                    new StringSchema()
                )
            ])
        );
        $document->paths['/{dataset}/{version}/fields']->get->responses['404'] = new Response(
            'The combination of dataset name and version is not found in the system or it is not published yet to be consumed by public.',
            null,
            new MediaTypes([
                'application/json' => new MediaType(
                    new StringSchema()
                )
            ])
        );

        $document->paths['/{dataset}/{version}/records'] = new Path();
        $document->paths['/{dataset}/{version}/records']->post = new Operation();
        $document->paths['/{dataset}/{version}/records']->post->tags = ['search'];
        $document->paths['/{dataset}/{version}/records']->post->summary = 'Provides search capability for the data set with the given search criteria.';
        $document->paths['/{dataset}/{version}/records']->post->description = 'This API is based on Solr/Lucense Search. The data is indexed using SOLR. This GET API returns the list of all the searchable field names that are in the Solr Index. Please see the \'fields\' attribute which returns an array of field names. Each field or a combination of fields can be searched using the Solr/Lucene Syntax. Please refer https://lucene.apache.org/core/3_6_2/queryparsersyntax.html#Overview for the query syntax. List of field names that are searchable can be determined using above GET api.';
        $document->paths['/{dataset}/{version}/records']->post->operationId = 'perform-search';
        $document->paths['/{dataset}/{version}/records']->post->parameters = new ParameterList(
            new SimpleParameter(
                'version',
                ParameterLocation::path(),
                (new StringSchema(null, null))->setDefault('v1'),
                'Version of the dataset.',
                true
            ),
            new SimpleParameter(
                'dataset',
                ParameterLocation::path(),
                (new StringSchema(null, null))->setDefault('oa_citations'),
                'Name of the dataset. In this case, the default value is oa_citations',
                true
            ),
        );
        $document->paths['/{dataset}/{version}/records']->post->requestBody = new RequestBody(
            new MediaTypes([
                'application/x-www-form-urlencoded' => new MediaType(
                    new ObjectSchema(
                        null,
                        new Schemas([
                            'criteria' => (new StringSchema())
                                ->setDescription('Uses Lucene Query Syntax in the format of propertyName:value, propertyName:[num1 TO num2] and date range format: propertyName:[yyyyMMdd TO yyyyMMdd]. In the response please see the \'docs\' element which has the list of record objects. Each record structure would consist of all the fields and their corresponding values.')
                                ->setDefault('*:*'),
                            'start' => (new IntegerSchema())
                                ->setDescription('Starting record number. Default value is 0.')
                                ->setDefault(0),
                            'rows' => (new IntegerSchema())
                                ->setDescription('Specify number of rows to be returned. If you run the search with default values, in the response you will see \'numFound\' attribute which will tell the number of records available in the dataset.')
                                ->setDefault(100),
                        ]),
                        ['criteria']
                    )
                )
            ])
        );
        $document->paths['/{dataset}/{version}/records']->post->responses['200'] = new Response(
            'successful operation',
            null,
            new MediaTypes([
                'application/json' => new MediaType(
                    new ArraySchema(null, new ObjectSchema(null, null, null, new ObjectSchema(null, null)))
                )
            ])
        );
        $document->paths['/{dataset}/{version}/records']->post->responses['404'] = new Response(
            'No matching record found for the given criteria.'
        );

        $document->components = new Components();
        $document->components->schemas = new Schemas([
            'dataSetList' => new ObjectSchema(
                null,
                new Schemas([
                    'total' => new IntegerSchema(),
                    'apis' => new ArraySchema(
                        null,
                        new ObjectSchema(
                            null,
                            new Schemas([
                                'apiKey' => new StringSchema('To be used as a dataset parameter value'),
                                'apiVersionNumber' => new StringSchema('To be used as a version parameter value'),
                                'apiUrl' => new StringSchema('The URL describing the dataset\'s fields', StringFormat::uriRef()),
                                'apiDocumentationUrl' => new StringSchema('A URL to the API console for each API', StringFormat::uriRef()),
                            ])
                        )
                    ),
                ])
            )
        ]);

        return $document;
    }
}
