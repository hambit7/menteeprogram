<?php

namespace Oxford\API;

use GuzzleHttp\Client;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;
use Psr\Log\LogLevel;
use Predis\Client as RedisClient;


class OxfordDictionaryAPI
{
    private $client;
    private $logger;
    private $word;

    private $cacheCLient;

    public function __construct()
    {
        $this->cacheInit();
        $this->loggerInit();
        $this->clientInit();

        $this->word = $_ENV['OXFORD_APP_SEARCH_WORD'];
    }

    private function clientInit()
    {
        $this->client = new Client([
            'headers' => [
                'app_id' => $_ENV['OXFORD_APP_ID'],
                'app_key' => $_ENV['OXFORD_APP_KEY'],
            ]
        ]);
        return $this;
    }

    private function loggerInit()
    {
        $log = new Logger('daily');
        $this->logger = $log->pushHandler(new StreamHandler('app.log', LogLevel::DEBUG));
        return $this;
    }

    private function cacheInit()
    {
        $this->cacheCLient = new RedisClient(
            [
                'scheme' => $_ENV['REDIS_SCHEME'],
                'host' => $_ENV['REDIS_HOST'],
                'port' => $_ENV['REDIS_PORT']
            ]
        );
        return $this;
    }

    public function index()
    {
        if ($cachedEntity = $this->cacheCLient->get($this->word)) {
            return $cachedEntity;
        }
        $method = 'GET';
        $url = 'https://od-api.oxforddictionaries.com:443/api/v2/entries/' . $_ENV['OXFORD_APP_LANGUAGE'] . '/' . $_ENV['OXFORD_APP_SEARCH_WORD'];
        return $this->send($method, $url);
    }

    protected function send(string $method, string $url, $logType = 'info')
    {
        try {
            $answer = $this->client->request($method, $url);
            $responce = $answer->getBody();
            $this->cacheCLient->set($this->word, ($responce));

        } catch (\Exception $e) {
            $logType = 'error';
            $responce = $e->getMessage();
        }
        $this->writeLogs($logType, $responce);
        return $responce;
    }

    protected function writeLogs($logType, $message)
    {
        $this->logger->$logType($message);
        return $this;
    }
}