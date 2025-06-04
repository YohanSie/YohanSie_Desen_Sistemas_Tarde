<?php

require_once 'config.php';

if (!isset($_SESSION['usuario_id'])) {
    header('Location: login.php');
    exit;
}
$pdo =  conectarBanco();

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>dashboard</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        .header {
            background: #333;
            color: white;
            padding: 10px;
        }

        .header a {
            color: white;
            text-decoration: none;
        }

        .menu {
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 30px auto;
        }

        .menu a {
            color: white;
            text-decoration: none;
            background-color: rgb(122, 0, 0);
            padding: 10px;
            border-radius: 10px;
        }

        table {
            margin: auto;
            width: 80%;
            border-collapse: collapse;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color:rgb(150, 150, 150);
        }

        h2 {
            width: 80%;
            margin: 20px auto;
            margin-bottom: 5px;
        }
    </style>
</head>

<body>
    <div class="header">
        <h1>Bem-vindo(a)s, <?= htmlspecialchars($_SESSION['nome']) ?></h1>
        <a href="logout.php">Sair</a>
    </div>

    <h2>Lista de Produtos</h2>
    <table>
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Descrição</th>
            <th>Estoque</th>
            <th>Valor Unitário</th>
        </tr>
        <?php
        $stmt = $pdo->query("SELECT * FROM produto");
        while ($produto = $stmt->fetch(PDO::FETCH_ASSOC)):
        ?>

            <tr>
                <td><?= $produto["id_produto"] ?></td>
                <td><?= htmlspecialchars($produto['nome_prod']) ?></td>
                <td><?= htmlspecialchars($produto['descricao']) ?></td>
                <td><?= htmlspecialchars($produto['qtde']) ?></td>
                <td><?= number_format($produto['valor_unit'], 2, ',', '.') ?></td>
            </tr>

        <?php endwhile; ?>
    </table>

    <div class="menu">
        <a href="relatorio.php">Gerar Relatório PDF</a>
    </div>
</body>

</html>