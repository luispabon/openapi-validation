<?php
declare(strict_types=1);

namespace AuronConsulting\OpenApi\Validation\FileLoader;

use AuronConsulting\OpenApi\Validation\FileLoader\FileLoaderInterface;
use Psr\SimpleCache\CacheInterface;

/**
 * This implements a cached file loader, as parsing specs can be rather resource intensive.
 *
 * You must provide with a PSR-16 implementation, and one of the actual file loaders.
 *
 * @author  Luis Pabon / https://github.com/AuronConsulting
 * @license MIT
 */
class CachedLoader implements FileLoaderInterface
{
    /**
     * @var CacheInterface
     */
    private $cache;

    /**
     * @var FileLoaderInterface
     */
    private $loader;

    public function __construct(CacheInterface $cache, FileLoaderInterface $loader)
    {
        $this->cache  = $cache;
        $this->loader = $loader;
    }

    /**
     * @inheritdoc
     */
    public function load(string $specLocation): array
    {
        $key  = \md5($specLocation);
        $spec = $this->cache->get($key);

        if ($spec === null) {
            $spec = $this->loader->load($specLocation);
            $this->cache->set($key, $spec);
        }

        return $spec;
    }
}
