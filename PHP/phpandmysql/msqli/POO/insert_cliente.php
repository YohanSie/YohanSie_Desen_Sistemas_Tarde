<?php

require_once "conexao.php";

$connect = connectdb();

$nome = 'Yohan Siedschlag';
$endereco = 'Rua Coindra, 234';
$telefone = '(47) 921442546';
$email = 'yohansie_contato@gmail.com';

$stmt = $connect->prepare("INSERT INTO cliente(nome, endereco, telefone, email) VALUES (?, ?, ?, ?)");

$stmt->bind_param("ssss", $nome, $endereco, $telefone, $email);

if($stmt->execute()){
    echo "Cliente adicionado com sucesso";
} else {
    echo "Erro ao adicionar cliente: " . $stmt->error;
}

$stmt->close();
$connect->close();