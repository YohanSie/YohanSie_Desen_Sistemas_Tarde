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
</body>

</html>