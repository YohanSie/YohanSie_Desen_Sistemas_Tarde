<?php

function connectBanco() {
    $dsn = "mysql:host=localhost;dbname=empresa;charset=utf8;port=3307";
    $usuario = "root";
    $senha = "root";

    try {
        $connect = new PDO($dsn, $usuario, $senha, [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ]);
        return $connect;
    } catch (PDOException $err) {
        error_log("Erro ao conectar ao banco: " . $err->getMessage());
        // Log sem expor erro ao usuário
        die("Erro ao conectar ao banco");
    }
}