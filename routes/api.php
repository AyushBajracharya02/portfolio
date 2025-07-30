<?php

$router->get("/api/user", function () {
    header('Content-Type: application/json');
    echo json_encode([
        'name' => 'Ayush',
        'role' => 'Frontend Developer',
    ]);
});
