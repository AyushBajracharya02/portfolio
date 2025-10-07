<?php

use Bramus\Router\Router;

$router = new Router();

$router->before('GET|POST','/admin/(?!login|sign-up|forgot-password).*', function() {
    require_once __DIR__ . '/middlewares/auth.php';
    adminAuth();
});

require_once __DIR__ . '/frontend.php';
require_once __DIR__ . '/api.php';
$router->run();