<?php
$host = 'localhost';
$db = 'ForumCinemas';
$user = 'root';
$pass = '';
$charset = 'utf8mb4';

$dsm = "mysql:host=$host;db name=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES => false,
];
try {
    $pdo = new PDO($dsm, $user, $pass, $options);
} catch (\PDOException $e){
    throw new \PDOException($e->getMessage(), (int)$e->getCode());
}