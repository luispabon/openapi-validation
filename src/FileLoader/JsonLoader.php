<?php
declare(strict_types=1);

namespace AuronConsulting\OpenApi\Validation\FileLoader;

/**
 * Loads a json file and returns as an array.
 *
 * @author  Luis Pabon / https://github.com/AuronConsulting
 * @license MIT
 */
class JsonLoader extends AbstractLoader implements FileLoaderInterface
{
    /**
     * This must take the contents of the spec file as a string and parses it into an associative array..
     *
     * @param string $contents
     *
     * @return array
     * @throws Exception\InvalidFormatException
     */
    protected function doLoad(string $contents): array
    {
        $data = \json_decode($contents, true);

        if (\is_array($data) === false || count($data) === 0) {
            throw new Exception\InvalidFormatException('File was not in JSON format');
        }

        return $data;
    }
}
