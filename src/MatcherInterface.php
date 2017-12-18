<?php
declare(strict_types=1);

namespace AuronConsulting\OpenApi\Validation;

use Psr\Http\Message\UriInterface;

/**
 * Defines an interface that allows analysing URIs to find their route pattern equivalent. Since routing is highly
 * framework specific, we define this over here for use on implementations of the request validator, and you must
 * implement it according to your framework.
 *
 * @author Luis Pabon / https://github.com/AuronConsulting
 */
interface MatcherInterface
{
    /**
     * Returns the raw route path for a given URI and an array of paths.
     *
     * @param UriInterface   $uri
     * @param array|string[] $paths
     *
     * @return string
     */
    public function match(UriInterface $uri, array $paths): string;
}
