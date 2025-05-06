<?php

require_once "conexao.php";

$connect = connectdb();

// Dados Anteriores
/*
* Maria Santos
* Av. Paulista, 1000, Bela Vista
* (11) 91234-5678
* maria.santos@email.com
*/

// Dados Novos
$nome = 'Moises Maek Igor';
$endereco = 'Rua Itapema, 234';
$telefone = '(47) 921447546';
$email = 'mistura@gmail.com';

// Define the ID of client to be updated
$id_cliente = 2;

$stmt = $connect->prepare("UPDATE cliente SET nome = ?, endereco = ?, telefone = ?, email = ? WHERE id_cliente = ?");

$stmt->bind_param("ssssi", $nome, $endereco, $telefone, $email, $id_cliente);

if($stmt->execute()){
    echo "Cliente atualizado com sucesso";
} else {
    echo "Erro ao atualizar o cliente: " . $stmt->error;
}

$stmt->close();
$connect->close();