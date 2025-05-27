<?php 

// Definicao das credenciais de conexao ao banco de dados
$servername = "localhost:3307";
$username = "root";
$password = "root";
$dbname = "armazena_imagem";

// Criando a conexao usando MySQLi
$conexao = new mysqli($servername, $username, $password, $dbname);

// Verifica se houve erro
if ($conexao->connect_error){
    die("Falha na conexão: " . $conexao->connect_error);
}

?>