<?php

use Doctrine\ORM\Tools\Console\ConsoleRunner;
use Doctrine\ORM\Tools\Console\EntityManagerProvider\SingleManagerProvider;

require "bootstrap.php";

return ConsoleRunner::run(
    new SingleManagerProvider($entityManager)
);
