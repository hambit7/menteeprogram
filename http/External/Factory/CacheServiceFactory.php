<?php
namespace Oxford\External\Factory;
use Predis\Client as RedisClient;


class CacheServiceFactory implements ServiceFactoryInterface
{
    public static function create()
    {
        return new RedisClient(
            [
                'scheme' => $_ENV['REDIS_SCHEME'],
                'host' => $_ENV['REDIS_HOST'],
                'port' => $_ENV['REDIS_PORT']
            ]);
    }
}