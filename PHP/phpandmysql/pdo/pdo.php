<?php

// Define the credencials of the database
$user = 'root';
$password = 'root';
$database = 'empresa';
$port = '3307';



try {
    // connect to database
    $connection = new PDO("mysqy:host=localhost;charset=utf8;port=$port;dbname=$database", $user, $password);

    // select - query are sent to database
    $connection->query("SELECT id_cliente, nome, email FROM cliente")->fetchAll(PDO::FETCH_OBJ);

} catch (PDOException $err) {
    echo "Erro na conexão <br>" . $err->getMessage();
}

$connection = null;