<?php

function view(string $filename)
{
    require_once __DIR__ . "/../views/$filename";
}

$router->get("/", function () {
    view("home.php");
});

$router->get("/admin", function () {
    view("admin/login.php");
});
