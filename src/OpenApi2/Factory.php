<?php
declare(strict_types=1);

namespace AuronConsulting\OpenApi\Validation\OpenApi2;

use AuronConsulting\OpenApi\Validation\FileLoader\CacheLoader;
use AuronConsulting\OpenApi\Validation\FileLoader\Exception\FileLoaderException;
use AuronConsulting\OpenApi\Validation\FileLoader\JsonLoader;
use AuronConsulting\OpenApi\Validation\FileLoader\NullCache;
use AuronConsulting\OpenApi\Validation\FileLoader\SimpleCacheLoader;
use AuronConsulting\OpenApi\Validation\FileLoader\YamlLoader;
use JsonSchema\Validator as JsonSchemaValidator;
use Psr\Cache\CacheItemPoolInterface as Psr6Cache;
use Psr\SimpleCache\CacheInterface as Psr16Cache;
use Symfony\Component\Validator\Validation;
use Symfony\Component\Validator\Validator\ValidatorInterface as SymfonyValidator;
use Symfony\Component\Yaml\Parser;

/**
 * Convenience factory to load up bot a v2 Spec and Validator. This is to assist creating these instances
 * either with default dependencies, or with your own if provided.
 *
 * @author  Luis Pabon / https://github.com/AuronConsulting
 * @license MIT
 */
class Factory
{
    /**
     * This will return an instance to the v2 Validator, instantiating any dependencies you're not providing with
     * our defaults.
     *
     * @param JsonSchemaValidator|null $jsonSchemaValidator
     * @param SymfonyValidator|null    $symfonyValidator
     *
     * @return Validator
     */
    public static function getValidator(
        JsonSchemaValidator $jsonSchemaValidator = null,
        SymfonyValidator $symfonyValidator = null
    ): Validator {
        if ($jsonSchemaValidator === null) {
            $jsonSchemaValidator = new JsonSchemaValidator();
        }

        if ($symfonyValidator === null) {
            $symfonyValidator = Validation::createValidator();
        }

        return new Validator($jsonSchemaValidator, $symfonyValidator);
    }

    /**
     * This will load up the given spec into a Spec object, given its location.
     *
     * Dependencies are optional, and instantiated with our defaults if not provided (eg a null cache driver for
     * the loader). Do provide your own if already available on your DI container.
     *
     * @param string                    $specLocation
     * @param Psr6Cache|Psr16Cache|null $cache
     * @param Parser|null               $symfonyYaml
     *
     * @return Spec
     * @throws FileLoaderException
     */
    public static function getSpec(
        string $specLocation,
        $cache = null,
        Parser $symfonyYaml = null
    ): Spec {
        if (\is_file($specLocation) === false) {
            throw new FileLoaderException(\sprintf('Spec not found at %s', $specLocation));
        }

        // Decide on which format based on filename.
        if (\preg_match('/(yaml|yml)$/i', $specLocation) === 1) {
            if ($symfonyYaml === null) {
                $symfonyYaml = new Parser();
            }

            $fileLoader = new YamlLoader($symfonyYaml);
        } else {
            $fileLoader = new JsonLoader();
        }

        // If no cache driver provided, make a null simple cache driver
        if ($cache === null) {
            $cache = new NullCache();
        }

        if ($cache instanceof Psr16Cache === true) {
            $fileLoader = new SimpleCacheLoader($cache, $fileLoader);
        } elseif ($cache instanceof Psr6Cache === true) {
            $fileLoader = new CacheLoader($cache, $fileLoader);
        }

        return new Spec($fileLoader->load($specLocation));
    }
}
