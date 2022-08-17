<?php
require __DIR__ . "/bootstrap.php";

use Oxford\API\OxfordDictionaryAPI as API;

$api =  new API();

echo($api->index());
