<?php

namespace App;

use GuzzleHttp\Client;
use Monolog\Handler\StreamHandler;
use Monolog\Logger;
use Oxford\External\Container;
use Predis\Client as RedisClient;
use Psr\Log\LogLevel;

class App
{
    public static Container $container;

    public function __construct()
    {
        static::$container = new Container();
    }

    public function run()
    {
        static::$container->set('ClientService',
            function () {
                return new Client([
                    'headers' => [
                        'app_id' => $_ENV['OXFORD_APP_ID'],
                        'app_key' => $_ENV['OXFORD_APP_KEY'],
                    ]
                ]);
            });

        static::$container->set('CacheService',
            function () {
                return new RedisClient(
                    [
                        'scheme' => $_ENV['REDIS_SCHEME'],
                        'host' => $_ENV['REDIS_HOST'],
                        'port' => $_ENV['REDIS_PORT']
                    ]);
            });

        static::$container->set('LoggingService',
            function () {
                $log = new Logger($_ENV['LOG_NAME']);
                $log->pushHandler(new StreamHandler($_ENV['LOG_FILE_NAME'], LogLevel::DEBUG));
                return $log;
            });
    }

}