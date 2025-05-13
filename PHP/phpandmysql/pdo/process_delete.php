<?php

require_once 'conexao.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $conexao = connectBanco();

    $id = filter_var($_POST["id"], FILTER_SANITIZE_NUMBER_INT);

    if (!$id) {
        die("Erro: ID inválido");
    }
}

$sql = "DELETE FROM cliente WHERE id_cliente = :id";

try {
    $stmt = $conexao->prepare($sql);
    $stmt->bindParam(":id", $id, PDO::PARAM_INT);
    $stmt->execute();
    echo "Cliente excluido com sucesso!";
} catch (PDOException $err) {
    error_log("Erro ao excluir cliente: " . $err->getMessage());
    echo "Erro ao excluir cliente";
}
