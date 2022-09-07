<?php
require __DIR__ . "/bootstrap.php";

use App\App;
use Oxford\API\OxfordDictionaryAPI as API;


$clientService = App::$container->get('ClientService');
$cacheService = App::$container->get('CacheService');
$loggingService = App::$container->get('LoggingService');

$api =  new API($clientService, $cacheService, $loggingService);

echo($api->index());
