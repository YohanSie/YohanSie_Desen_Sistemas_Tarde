<?php

// conexao com o banco de dados
$host = "localhost";
$dbname = "bd_imagem";
$user = "root";
$password = "root";
$port = "3307";

try {
    $pdo = new PDO("mysql:host=$host;port=$port;dbname=$dbname;charset=utf8;", $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "SELECT id, nome FROM funcionarios";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $funcionarios = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['excluir_id'])) {
        $excluir_id = $_POST['excluir_id'];
        $sql_excluir = "DELETE FROM funcionarios WHERE id = :id";
        $stmt_excluir = $pdo->prepare($sql_excluir);
        $stmt_excluir->bindParam(':id', $excluir_id, PDO::PARAM_INT);
        $stmt_excluir->execute();

        header("Location: " . $_SERVER['PHP_SELF']);
    }
} catch (PDOException $err) {
    echo "Erro. " . $err->getMessage();
}

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consulta Funcionário</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="consultar_funcionario.css">
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
            background: #f4f6f8;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 600px;
            margin: 40px auto;
            background: #fff;
            border-radius: 8px;
            box-shadow: 5px 5px 8px rgba(0, 0, 0, 0.6);
            padding: 32px 24px;
        }

        h1 {
            text-align: center;
            color: #333;
            margin-bottom: 32px;
        }

        .ul-especific {
            list-style: none;
            padding: 0;
        }

        .li-especific {
            display: flex;
            align-items: center;
            justify-content: space-between;
            background: rgb(210, 213, 218);
            margin-bottom: 12px;
            padding: 12px 16px;
            border-radius: 6px;
            transition: box-shadow 0.2s;
        }

        .li-especific:hover {
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.06);
        }

        .link {
            color: #1976d2;
            text-decoration: none;
            font-weight: bold;
            font-size: 1.05em;
        }

        .link:hover {
            text-decoration: underline;
        }

        form {
            margin: 0;
        }

        .btn-visualizar {
            background: #1976d2;
            color: #fff;
            border: none;
            border-radius: 4px;
            padding: 6px 14px;
            cursor: pointer;
            font-size: 0.95em;
            transition: background 0.2s;
        }

        .btn-visualizar:hover {
            background: #125ea7;
        }

        .btn-excluir {
            background: #e53935;
            color: #fff;
            border: none;
            border-radius: 4px;
            padding: 6px 14px;
            cursor: pointer;
            font-size: 0.95em;
            transition: background 0.2s;
        }

        .btn-excluir:hover {
            background: #b71c1c;
        }

        @media (max-width: 600px) {
            .container {
                padding: 16px 6px;
            }
            li {
                flex-direction: column;
                align-items: flex-start;
                gap: 8px;
            }
        }
    </style>
</head>

<body>
    <?php require_once 'dropdown.php';?>

    <div class="container">
        <h1>Consulta de Funcionário</h1>
        <?php if (empty($funcionarios)): ?>
            <p style="text-align:center; color:#888;">Nenhum funcionário cadastrado.</p>
        <?php else: ?>
            <ul class="ul-especific">
                <?php foreach ($funcionarios as $funcionario): ?>
                    <li class="li-especific">
                        <span>
                            <a class="link" href="visualizar_funcionario.php?id=<?= $funcionario['id'] ?>">
                                <?= htmlspecialchars($funcionario['nome']) ?>
                            </a>
                        </span>
                        <div style="display: flex; gap: 8px;">
                            <a class="link" href="visualizar_funcionario.php?id=<?= $funcionario['id'] ?>">
                                <button type="button" class="btn-visualizar">Visualizar</button>
                            </a>
                            <form action="" method="post" style="display: inline;" onsubmit="return confirm('Tem certeza que deseja excluir este funcionário?');">
                                <input type="hidden" name="excluir_id" value="<?= $funcionario['id'] ?>">
                                <button type="submit" class="btn-excluir">Excluir</button>
                            </form>
                        </div>
                    </li>
                <?php endforeach; ?>
            </ul>
        <?php endif; ?>
    </div>
</body>

</html>