<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Funções PHP</title>
</head>
<body>
    <?php
    
    $name = "Yohan Siedschlag";
    $length = strlen($name);
    $cmp = strcmp($name, "Brian Le");
    $index = strpos($name, "e");
    $first = substr($name, 9, 5);

    echo $name . "<br>";

    $name = strtoupper($name);

    echo $length . "<br>";
    echo $cmp . "<br>";
    echo $index . "<br>";
    echo $first . "<br>";
    echo $name;

    $cidade = "Joinville";
    $estado = "SC";
    $idade = 174;
    $frase_capital = "Ó $cidade, cidade dos principes...";
    $frase_idade = "$cidade tem $idade anos";
    echo "<h3>$frase_capital</h3>";
    echo "<h4>$frase_idade</h4>";

    ?>    

</body>
</html>