<?php
declare(strict_types=1);

namespace AuronConsulting\OpenApi\Validation\FileLoader;

use Psr\SimpleCache\CacheInterface;

/**
 * Null implementation of a PSR-16 cache driver.
 *
 * @author  Luis Pabon / https://github.com/AuronConsulting
 * @license MIT
 */
class NullCache implements CacheInterface
{

    /**
     * @inheritdoc
     */
    public function get($key, $default = null)
    {
        return $default ?? null;
    }

    /**
     * @inheritdoc
     */
    public function set($key, $value, $ttl = null)
    {
        return true;
    }

    /**
     * @inheritdoc
     */
    public function delete($key)
    {
        return true;
    }

    /**
     * @inheritdoc
     */
    public function clear()
    {
        return true;
    }

    /**
     * @inheritdoc
     */
    public function getMultiple($keys, $default = null)
    {
        return $default ?? [];
    }

    /**
     * @inheritdoc
     */
    public function setMultiple($values, $ttl = null)
    {
        return true;
    }

    /**
     * @inheritdoc
     */
    public function deleteMultiple($keys)
    {
        return true;
    }

    /**
     * @inheritdoc
     */
    public function has($key)
    {
        return false;
    }
}
