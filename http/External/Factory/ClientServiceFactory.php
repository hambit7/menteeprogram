<?php
namespace Oxford\External\Factory;
use GuzzleHttp\Client;

class ClientServiceFactory implements ServiceFactoryInterface
{
    public static function create()
    {
        return new Client([
            'headers' => [
                'app_id' => $_ENV['OXFORD_APP_ID'],
                'app_key' => $_ENV['OXFORD_APP_KEY'],
            ]
        ]);
    }
}