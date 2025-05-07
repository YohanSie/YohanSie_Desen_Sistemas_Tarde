<?php

require_once 'conexao.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $conexao = connectBanco();

    $sql = "INSERT INTO cliente (nome, endereco, telefone, email)
    VALUES (:nome, :endereco, :telefone, :email)";

    $conexao->prepare($sql);
    $stmt = $conexao->prepare($sql);
    $stmt->bindParam(":nome", $_POST["nome"]);
    $stmt->bindParam(":endereco", $_POST["endereco"]);
    $stmt->bindParam(":telefone", $_POST["telefone"]);
    $stmt->bindParam(":email", $_POST["email"]);

    try {
        $stmt->execute();
        echo "Cliente cadastrado com sucesso";
    } catch (PDOException $err) {
        error_log("Erro ao inserir cliente: " . $err->getMessage());
        echo "Erro ao cadastrar cliente!";
    }
}

?>