<?php

use Dotenv\Dotenv;
use Bramus\Router\Router;

require_once __DIR__ . '/vendor/autoload.php';

$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();

$router = new Router();
require_once __DIR__ . '/routes/frontend.php';
require_once __DIR__ . '/routes/api.php';
$router->run();
