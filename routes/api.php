<?php

$router->post("/api/admin/login",function(){
    header('Content-Type: application/json');
    
    $json = file_get_contents('php://input');
    $data = json_decode($json, true);

    if (json_last_error() !== JSON_ERROR_NONE) {
        http_response_code(400);
        echo json_encode(['error' => 'Invalid JSON']);
        return;
    }

    $pdo = getPDO();

    $stmt = $pdo->prepare("SELECT * FROM user WHERE email = :email");
    $stmt->execute(['email'=>$data['email']]);
    $user = $stmt->fetch();

    if(!$user || !password_verify($data['password'],$user['password'])){
        http_response_code(401);
        echo json_encode(['error' => 'Invalid credentials']);
        return;
    }

    session_start();
    $_SESSION['user_id'] = $user['id'];

    echo json_encode([
        'redirect' => '/admin/dashboard',
    ]);
});