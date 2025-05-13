<?php 

// Configuração do banco de dados
$server = 'localhost:3307';
$user = 'root';
$password = 'root';
$dbname = 'empresa_teste';

// Conexão usando MySQLi sem proteção com SQL injection
$conexao = new mysqli($server, $user, $password, $dbname);

if ($conexao->connect_error) {
    die ("Erro de conexão: " . $conexao->connect_error);
}

// Captura os dados do form (nome de usuário)
$nome = $_POST["nome"];

// Executa a consulta SEM proteção contra SQL Injection
$sql = "SELECT * FROM cliente_teste WHERE nome = '$nome'";
$result = $conexao->query($sql);

if ($result->num_rows > 0){
    header("Location: area_restrita.php");
    // Garante que o código pare aqui para evitar a execução indevida
    exit();
} else {
    echo "Nome não encontrado";
}

// Fecha conexão
$conexao->close();

?>