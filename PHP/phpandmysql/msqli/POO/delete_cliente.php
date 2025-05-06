<?php

require_once "conexao.php";

$connect = connectdb();

// Dados Anteriores
/*
* Ana Pereira
* Av. Rebouças, 456, Pinheiros
* (11) 96666-7777
* ana.pereira@email.com
* id = 4
*/

$id_cliente = 4;

$stmt = $connect->prepare("DELETE FROM cliente WHERE id_cliente = ?");

$stmt->bind_param("i", $id_cliente);

if($stmt->execute()){
    echo "Cliente deletado com sucesso";
} else {
    echo "Erro ao deletar o cliente: " . $stmt->error;
}

$stmt->close();
$connect->close();