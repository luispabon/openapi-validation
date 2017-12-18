<?php
declare(strict_types=1);

namespace AuronConsulting\OpenApi\Validation\FileLoader;

use Psr\Cache\CacheItemPoolInterface;

/**
 * This implements a cached file loader, as parsing specs can be rather resource intensive.
 *
 * You must provide with a PSR-6 implementation (psr/cache), and one of the actual file loaders.
 *
 * @author  Luis Pabon / https://github.com/AuronConsulting
 * @license MIT
 */
class CacheLoader implements FileLoaderInterface
{
    /**
     * @var CacheItemPoolInterface
     */
    private $cache;

    /**
     * @var FileLoaderInterface
     */
    private $loader;

    public function __construct(CacheItemPoolInterface $cache, FileLoaderInterface $loader)
    {
        $this->cache  = $cache;
        $this->loader = $loader;
    }

    /**
     * @inheritdoc
     */
    public function load(string $specLocation): array
    {
        $key       = \md5($specLocation);
        $cacheItem = $this->cache->getItem($key);

        if ($cacheItem->isHit() === false()) {
            $spec = $this->loader->load($specLocation);
            $cacheItem->set($spec);

            return $spec;
        }

        return $cacheItem->get();
    }
}
