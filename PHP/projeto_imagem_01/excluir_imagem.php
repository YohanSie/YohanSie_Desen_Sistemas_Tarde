<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);
ob_clean(); // LIMPA QUALQUER SAÍDA INESPERADA ANTES DO HEADER

// Conexão com o banco de dados
require_once "conecta.php";

// Obtem o id da imagem da url, garantindo que seja um numero inteiro
$id_imagem = isset($_GET['id']) ? intval($_GET['id']) : 0;

// Verifica se o id é válido (maior que zero)
if ($id_imagem > 0) {
    // Cria a query segura usando o prepared statement
    $queryExclusao = "DELETE FROM tabela_imagem WHERE codigo = ?";
    $stmt = $conexao->prepare($queryExclusao);
    $stmt->bind_param("i", $id_imagem); // Define o id como um inteiro

    // Executa a exclusão
    if ($stmt->execute()) {
        echo "Imagem excluida com sucesso!";
    } else {
        die("Erro ao excluir a imagem: " . $stmt->error);
    }

    // Fecha a consulta
    $stmt->close();
} else {
    echo "ID inválido";
}

header("Location: index.php");
exit();

?>