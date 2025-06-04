<?php

//config.php
//configuração do banco de dados
define('DB_HOST', 'localhost');
define('DB_NAME', 'senai_login');
define('DB_USER', 'root');
define('DB_PORT', '3307');

//senha do seu MySQL
define('DB_PASS', 'root');

// Inicia a sessão
session_start();

// Função de conexão com o banco
function conectarBanco()
{
    $dsn = "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";port=" . DB_PORT . ";charset=utf8;";

    try {
        $pdo = new PDO($dsn, DB_USER, DB_PASS);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;
    } catch (PDOException $err) {
        die("Erro de conexão: " . $err->getMessage());
    }
}
