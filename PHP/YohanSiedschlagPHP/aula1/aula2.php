<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AULA 2</title>
</head>

<body>
    <?php
        // Função usada para definie fuso horário padrão
        date_default_timezone_set('America/Sao_Paulo');

        // Manipulando HTML e PHP
        $data_hoje = date("d/m/Y H:i:s", time());
    ?>

    <p align='center'>Hoje é dia <?= $data_hoje; ?></p>

    <?php
        echo "teste<br>";
        echo "Olá Mundo<br>";
        echo "Isso abrange várias linhas. As novas linhas
        serão saída também.<br>";
        echo "Isso abrange \nmúltiplas linhas. A nova linha será \nna saída também<br>";
        echo "Caracteres Escaping são feitos \"Como esse\".<br><br>";
    ?>

    <?php

        $comida_favorita = "Italiana";
        print $comida_favorita[2];
        $comida_favorita = " Cozinha ".$comida_favorita;
        print $comida_favorita;

    ?>

    <h4>Yohan Siedschlag</h4>
</body>

</html>