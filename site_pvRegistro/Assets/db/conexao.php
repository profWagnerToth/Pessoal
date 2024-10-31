<?php
$host = 'localhost'; // Ajuste conforme sua configuração
$db   = 'pv';
$user = 'root'; // Ajuste conforme sua configuração
$pass = ''; // Ajuste conforme sua configuração
$charset = 'utf8mb4';

// Configurações de conexão com o banco de dados
$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

try {
    $pdo = new PDO($dsn, $user, $pass, $options);
} catch (\PDOException $e) {
    throw new \PDOException($e->getMessage(), (int)$e->getCode());
}
?>
