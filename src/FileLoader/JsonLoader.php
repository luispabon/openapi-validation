<?php
declare(strict_types=1);

namespace AuronConsulting\OpenApi\Validation\FileLoader;

use AuronConsulting\OpenApi\Validation\FileLoader\FileLoaderInterface;

/**
 * Loads a json file and returns as an array.
 *
 * @author  Luis Pabon / https://github.com/AuronConsulting
 * @license MIT
 */
class JsonLoader implements FileLoaderInterface
{
    /**
     * @inheritdoc
     */
    public function load(string $specLocation): array
    {
        if (\is_file($specLocation) === false) {

        }
    }
}
