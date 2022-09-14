<?php
require __DIR__ . "/bootstrap.php";

use App\App;
use Oxford\API\OxfordDictionaryAPI as API;


$clientService = App::$container->get('ClientService');
$cacheService = App::$container->get('CacheService');
$loggingService = App::$container->get('LoggingService');
$word =  $_ENV['OXFORD_APP_SEARCH_WORD'];

$api =  new API($clientService, $cacheService, $loggingService, $word);

echo($api->index());
