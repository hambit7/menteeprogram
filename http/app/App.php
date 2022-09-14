<?php

namespace App;

use Oxford\External\Container;
use Oxford\External\Factory\CacheServiceFactory;
use Oxford\External\Factory\ClientServiceFactory;
use Oxford\External\Factory\LogginServiceFactory;

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
                return ClientServiceFactory::create();
            });

        static::$container->set('CacheService',
            function () {
                return CacheServiceFactory::create();
            });

        static::$container->set('LoggingService',
            function () {
                return LogginServiceFactory::create();
            });

    }
}