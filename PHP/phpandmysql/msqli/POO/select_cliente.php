<?php

require_once "conexao.php";

$connect = connectdb();

$sql = "SELECT id_cliente, nome, email FROM cliente";

$result = $connect->query($sql);

echo "<h2>Clientes Cadastrados</h2>";

if ($result->num_rows > 0){
    while ($linha = $result->fetch_assoc()) {
        echo "ID: " . $linha["id_cliente"] . 
        " - Nome: " . $linha["nome"] . 
        " - Email: " . $linha["email"] .
        "<br>";
    }
} else {
    echo "Nenhum cliente cadastrado";
}

mysqli_close($connect);