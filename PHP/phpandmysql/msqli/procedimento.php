<?php

// Define the credencials of the database
$host = 'localhost';
$user = 'root';
$password = 'root';
$database = 'empresa';
$port = '3307';

// Connection with the database
$connection = mysqli_connect(
    $host, 
    $user, 
    $password, 
    $database,
    $port,
);

// Verified of connection
if(!$connection) {
    die("Conexão falhou: " . mysqli_connect_error());
}

// Configuration the conjunct of characters to evite accentuation erros
mysqli_set_charset($connection, "utf8mb4");

// A message to indicate the succesfuly of connection
echo "Conexão bem-sucedida<br><br>  ";

// Query SQL to obtain clients
$sql = "SELECT id_cliente, nome, email FROM cliente";
$result = mysqli_query($connection, $sql);

// Verified if get results on the query
if (mysqli_num_rows($result) > 0) {
    while ($linha = mysqli_fetch_assoc($result)){
        echo "ID: " . $linha["id_cliente"] . " - Nome: " . $linha["nome"] . " - Email: " . $linha["email"] . "<br>";
    }
} else {
    echo "<br>Nenhum resultado encontrado!";
}

// Close connection
mysqli_close($connection);