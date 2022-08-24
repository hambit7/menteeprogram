<?php
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\ORMSetup;

require "vendor/autoload.php";

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/..');

$dotenv->load();

$isDevMode = true;
$proxyDir = null;
$cache = null;
$useSimpleAnnotationReader = false;
$config = ORMSetup::createAnnotationMetadataConfiguration(array( './src'), $isDevMode, $proxyDir, $cache);

$connection = [
    "host" => $_ENV['DB_HOST'],
    "dbname" => $_ENV['DB_NAME'],
    "username" => $_ENV['DB_USER'],
    "password" => $_ENV['DB_PASSWORD'],
    "driver" => $_ENV['DB_DRIVER'],
];

//$connectionParams = [
//    'url' => 'mysql://root:root@172.18.0.6:3306/doctrine',
//];

$entityManager = EntityManager::create($connection, $config);
