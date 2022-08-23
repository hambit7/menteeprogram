<?php

namespace Oxford\API;

use App\App;


class OxfordDictionaryAPI
{
    private string $word;

    protected string $method = 'GET';

    public function __construct()
    {
        $this->word = $_ENV['OXFORD_APP_SEARCH_WORD'];
    }

    protected function prepateApiUrl(): string
    {
        return $_ENV['OXFORD_APP_BASE_URL'] . '/' . $_ENV['OXFORD_APP_LANGUAGE'] . '/' . $_ENV['OXFORD_APP_SEARCH_WORD'];
    }

    public function index()
    {
        if (!$responce = App::$container->get('CacheService')->get($this->word)) {

            $responce = $this->send($this->prepateApiUrl());
        }
        return $responce;
    }

    protected function send(string $url, string $logType = 'info', string $method = 'getBody'): string
    {
        try {
            $answer = App::$container->get('ClientService')->request($this->method, $url);
        } catch (\Exception $exeption) {
            $answer = $exeption;
            $logType = 'error';
            $method = 'getMessage';
        }

        $responce = $this->prepareAnswer($method, $answer);
        App::$container->get('CacheService')->set($this->word, $responce);
        App::$container->get('LoggingService')->$logType($responce);

        return $responce;
    }

    protected function prepareAnswer(string $method, object $body)
    {
        return $body->$method();
    }

}