<?php


function getPDO(): PDO {
    static $pdo = null;
    try{
        $dsn = sprintf(
            "mysql:host=%s;port=%s;dbname=%s;charset=utf8mb4",
            $_ENV['DB_HOST'],
            $_ENV['DB_PORT'],
            $_ENV['DB_NAME']
        );
        $username = $_ENV['DB_USER'];
        $password = $_ENV['DB_PASS'];
        $pdo = new PDO($dsn, $username, $password, [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_PERSISTENT => true, // reuse connection across requests
        ]);
    }
    catch(PDOException $e){
        die("Connection failed: " . $e->getMessage());
    }
    return $pdo;
}
