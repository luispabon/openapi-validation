<?php
declare(strict_types=1);

namespace AuronConsulting\OpenApi\Validation\FileLoader;

/**
 * Defines an interface for loading spec files.
 *
 * @author  Luis Pabon / https://github.com/AuronConsulting
 * @license MIT
 */
interface FileLoaderInterface
{
    /**
     * Load schema from the given location, parse and spew out as its equivalent array value.
     *
     * @param string $specLocation
     *
     * @return array
     * @throws Exception\FileLoaderException
     * @throws Exception\InvalidFormatException
     */
    public function load(string $specLocation): array;
}
