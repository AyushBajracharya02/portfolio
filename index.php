<?php

use Dotenv\Dotenv;
use Bramus\Router\Router;

require_once __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/database/PDO.php';

$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();

$router = new Router();
require_once __DIR__ . '/routes/web.php';
$router->run();
