<?php
require "vendor/autoload.php";

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\ORMSetup;

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/..');
$dotenv->load();

if ($_ENV['DEV_MODE']) {
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
}

$config = ORMSetup::createAnnotationMetadataConfiguration(array("config/xml"), $_ENV['DEV_MODE']);

$connection = [
    "dbname" => $_ENV['DB_NAME'],
    "user" => $_ENV['DB_USER'],
    "password" => $_ENV['DB_PASSWORD'],
    "host" => $_ENV['DB_HOST'],
    "driver" => $_ENV['DB_DRIVER']
];

$entityManager = EntityManager::create($connection, $config);
