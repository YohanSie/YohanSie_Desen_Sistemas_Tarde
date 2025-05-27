<?php

// inclui o arquivo de conexao com o banco
require_once 'conecta.php';

// Cria a consulta SQL para selecionar os dados principais (sem a coluna imagem)
$querySelecao = "SELECT codigo, evento, descricao, nome_imagem, tamanho_imagem FROM tabela_imagem";

$resultado = mysqli_query($conexao, $querySelecao);

if (!$resultado) {
    die("Erro na consulta: " . mysqli_error($conexao));
}

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Armazenando Imagens no Banco de Dados</title>
    <style>
        body {
            display: flex;
            flex-direction: column;
            font-family: Arial, sans-serif;
            background: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        h2 {
            margin: 30px auto;
            color: #333;
        }

        form {
            background: #fff;
            padding: 20px 30px;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
            width: 400px;
            margin: 30px auto 20px auto;
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        form input[type="text"],
        form input[type="file"] {
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        form input[type="submit"] {
            background: #007bff;
            color: #fff;
            border: none;
            padding: 10px;
            border-radius: 4px;
            cursor: pointer;
            font-weight: bold;
            transition: background 0.2s;
        }

        form input[type="submit"]:hover {
            background: #0056b3;
        }

        table {
            width: 90%;
            margin: 30px auto;
            border-collapse: collapse;
            background: #fff;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
        }

        table th,
        table td {
            border: 1px solid #ddd;
            padding: 12px 8px;
            text-align: center;
        }

        table th {
            background: #007bff;
            color: #fff;
            font-weight: bold;
        }

        table tr:nth-child(even) {
            background: #f9f9f9;
        }

        a {
            color: #007bff;
            text-decoration: none;
            font-weight: bold;
        }

        a:hover {
            text-decoration: underline;
            color: #0056b3;
        }
    </style>
</head>

<body>
    <h2>Selecione um novo arquivo de imagem</h2>
    <form enctype="multipart/form-data" action="upload.php" method="POST">
        <input type="hidden" name="MAX_FILE_SIZE" value="99999999">
        <input type="text" name="evento" placeholder="Nome do Evento">
        <input type="text" name="descricao" placeholder="Descrição">
        <input type="file" name="imagem">
        <input type="submit" value="Salvar">
    </form>

    <br>

    <table border="1">
        <tr>
            <td align="center">Codigo</td>
            <td align="center">Evento</td>
            <td align="center">Descrição</td>
            <td align="center">Nome da Imagem</td>
            <td align="center">Tamanho</td>
            <td align="center">Visualizar Imagem</td>
            <td align="center">Excluir Imagem</td>
        </tr>

        <?php while ($arquivos = mysqli_fetch_array($resultado)): ?>
            <tr>
                <td align="center"><?= $arquivos['codigo']; ?></td>
                <td align="center"><?= $arquivos['evento']; ?></td>
                <td align="center"><?= $arquivos['descricao']; ?></td>
                <td align="center"><?= $arquivos['nome_imagem']; ?></td>
                <td align="center"><?= $arquivos['tamanho_imagem']; ?></td>
                <td align="center">
                    <a href="ver_imagens.php?id=<?= $arquivos['codigo']; ?>">Ver Imagem</a>
                </td>
                <td align="center">
                    <a href="excluir_imagem.php?id=<?= $arquivos['codigo']; ?>">Excluir</a>
                </td>
            </tr>
        <?php endwhile; ?>
    </table>

</body>

</html>