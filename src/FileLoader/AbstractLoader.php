<?php
declare(strict_types=1);

namespace AuronConsulting\OpenApi\Validation\FileLoader;

/**
 * Common logic to local file loaders.
 *
 * @author  Luis Pabon / https://github.com/AuronConsulting
 * @license MIT
 */
abstract class AbstractLoader implements FileLoaderInterface
{
    /**
     * This must take the contents of the spec file as a string and parses it into an associative array..
     *
     * @param string $contents
     *
     * @return array
     */
    abstract protected function doLoad(string $contents): array;

    /**
     * @inheritdoc
     */
    public function load(string $specLocation): array
    {
        if (\file_exists($specLocation) === false) {
            throw new Exception\FileLoaderException(sprintf('No spec found at %s', $specLocation));
        }

        return $this->doLoad(\file_get_contents($specLocation));
    }
}
