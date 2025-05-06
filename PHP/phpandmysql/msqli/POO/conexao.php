<?php

// Enable messages of errors MySQLi
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

/* 
* Function to connect to database
* Return a object of connection MySQLi or stop the script
*/

function connectdb() {
    // Configuration of Database
    $host = "localhost";
    $user = "root";
    $password = "root";
    $dbname = "empresa";
    $port = "3307";

    try {
        // Create connection
        $connection = new mysqli($host, $user, $password, $dbname, $port);

        // Define the characthers conjunct to evite problems
        $connection->set_charset("utf8mb4");
        return $connection;

    } catch(Exception $err) {
        // Show a message of error and stop the script
        die("Erro na conexão: " . $err->getMessage());
    }
}