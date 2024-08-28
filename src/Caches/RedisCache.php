<?php

namespace Cmx\Elf\Caches;
use Exception;

class RedisCache
{

    private \Redis $redis;

    /**
     * @throws Exception
     */
    public function __construct()
    {
        $this->redis = new \Redis();
        try {
            $this->redis->connect('127.0.0.1', 6379);
        } catch (\RedisException $e) {
            throw new Exception('Could not connect to Redis server: ' . $e->getMessage());
        }
    }

    public function set(string $key, $value, int $ttl = 3600): bool
    {
        return $this->redis->set($key, $value, $ttl);
    }

    public function get(string $key)
    {
        return $this->redis->get($key);
    }

    public function delete(string $key): bool
    {
        return $this->redis->del($key) > 0;
    }

    public function clear(): bool
    {
        return $this->redis->flushDB();
    }
}

