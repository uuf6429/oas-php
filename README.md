# OAS-PHP

[![Minimum PHP Version](https://img.shields.io/badge/php-%3E%3D%207.4-8892BF.svg)](https://php.net/)
[![License](https://img.shields.io/badge/license-MIT-blue.svg)](https://raw.githubusercontent.com/uuf6429/oas-php/master/LICENSE)
[![Packagist](https://img.shields.io/packagist/v/uuf6429/oas-php.svg)](https://packagist.org/packages/uuf6429/oas-php)

OAS-PHP: PHP Implementation of the OpenAPI Spec.

This library is an implementation of the [OpenAPI v3 specification](https://github.com/OAI/OpenAPI-Specification/blob/master/versions/3.0.3.md).

## Usage

This library is just a bunch of value objects. The main entry point, (as is the case with the specification), is the **Document** class:

```php
$document = new \uuf6429\OpenAPI\Spec\Document();
$path = new \uuf6429\OpenAPI\Path();
$document->paths->set('/resource', $path);
```

## Rendering

Ideally, it should be render with a YAML serializer (such as [symfony's](https://symfony.com/doc/current/components/yaml.html)).
Since YAML is a superset of JSON, one can also do:
```php
$document = new Document();
$json = json_encode($document, JSON_THROW_ON_ERROR | JSON_PRETTY_PRINT);

// save to file
file_put_contents('openapi.yaml', $json);

// or serve it out
header('Content-Type: application/x-yaml');
echo $json;
```

## Why?
This library isn't better than the multitude of generators and whatnot out there.
The idea is that existing and new PHP-based tools that handle OpenAPI could/should use this implementation instead of having their own version of OpenAPI spec.
