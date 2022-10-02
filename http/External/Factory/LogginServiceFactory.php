<?php


namespace Oxford\External\Factory;

use Monolog\Handler\StreamHandler;
use Monolog\Logger;

use Psr\Log\LogLevel;


class LogginServiceFactory implements ServiceFactoryInterface
{
    public static function create()
    {
            $log = new Logger($_ENV['LOG_NAME']);
            $log->pushHandler(new StreamHandler($_ENV['LOG_FILE_NAME'], LogLevel::DEBUG));
            return $log;
    }
}