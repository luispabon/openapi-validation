<?php
declare(strict_types=1);

namespace AuronConsulting\OpenApi\Validator;

/**
 * Defines an interface for loading spec files.
 *
 * @package AuronConsulting\OpenApi\Loader
 */
interface LoaderInterface
{
    /**
     * Load schema from the given location, parse and spew out as its equivalent array value.
     *
     * @param string $specLocation
     *
     * @return array
     */
    public function load(string $specLocation): array;
}
