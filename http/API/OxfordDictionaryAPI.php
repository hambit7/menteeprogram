<?php

namespace Oxford\API;

class OxfordDictionaryAPI
{
    private string $word;

    protected string $method = 'GET';

    protected $clientService, $cacheService, $loggingService;

    public function __construct($clientService, $cacheService, $loggingService)
    {
        $this->clientService = $clientService;
        $this->cacheService = $cacheService;
        $this->loggingService = $loggingService;
        $this->word = $_ENV['OXFORD_APP_SEARCH_WORD'];
    }

    protected function prepateApiUrl(): string
    {
        return $_ENV['OXFORD_APP_BASE_URL'] . '/' . $_ENV['OXFORD_APP_LANGUAGE'] . '/' . $_ENV['OXFORD_APP_SEARCH_WORD'];
    }

    public function index() : string
    {
        if (!$responce = $this->cacheService->get($this->word)) {

            $responce = $this->send($this->prepateApiUrl());
        }
        return $responce;
    }

    protected function send(string $url, string $logType = 'info', string $method = 'getBody'): string
    {
        try {
            $answer = $this->clientService->request($this->method, $url);
        } catch (\Exception $exeption) {
            $answer = $exeption;
            $logType = 'error';
            $method = 'getMessage';
        }

        $responce = $this->prepareAnswer($method, $answer);
        $this->cacheService->set($this->word, $responce);
        $this->loggingService->$logType($responce);

        return $responce;
    }

    protected function prepareAnswer(string $method, object $body)
    {
        return $body->$method();
    }

}