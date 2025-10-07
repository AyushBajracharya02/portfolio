<?php

function view(string $filename)
{
    require_once __DIR__ . "/../views/$filename";
}

$router->get("/", function () {
    view("home.php");
});

$router->get("/admin/login", function () {
    session_start();
    if(isset($_SESSION['user_id'])){
        header("Location: /admin/dashboard");
        exit();
    }
    view("admin/login.php");
});

$router->get("/admin/sign-up", function () {
    session_start();
    if(isset($_SESSION['user_id'])){
        header("Location: /admin/dashboard");
        exit();
    }
    view("admin/sign-up.php");
});

$router->get("/admin/dashboard", function () {
    view("admin/dashboard.php");
});
