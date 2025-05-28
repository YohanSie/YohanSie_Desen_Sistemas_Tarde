<?php

// conexao com o banco de dados
$host = "localhost";
$dbname = "bd_imagem";
$user = "root";
$password = "root";
$port = "3307";

try {
    // Cria uma nova instancia de pdo para conectar ao banco de dados
    $pdo = new PDO("mysql:host=$host;port=$port;dbname=$dbname;charset=utf8;", $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Recupera todos os funcionários do bando de dados
    $sql = "SELECT id, nome FROM funcionarios";
    $stmt = $pdo->prepare($slq);
    $stmt->execute(); // Executa a instrucao
    $funcionarios = $stmt->fetchAll(PDO::FETCH_ASSOC); // Busca todos os funcionários com uma matriz associativa

    // Verifica se foi solicitado a exclusão de um formulário
    if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['excluir_id'])) {
        $excluir_id = $_POST['excluir_id'];
        $sql_excluir = "DELETE FROM funcionarios WHERE id = :id";
        $stmt_excluir = $pdo->prepare($sql);
        $stmt->bindParam(":id", $excluir_id, PDO::PARAM_INT);
        $stmt->execute();

        // Redireciona para evitar o reenvio do form
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
</head>

<body>
    <h1>Consukta de Funcionário</h1>

    <ul>
        <?php foreach ($funcionarios as $funcionario): ?>
            <li>
                <a href="visualizar_funcionario.php?id<?= $funcionario['id'] ?>"><?= htmlspecialchars($funcionario['nome']) ?></a>

                <form action="" method="post" style="display: inline;">
                    <input type="hidden" name="excluir_id" value="<?= $funcionario['id'] ?>">
                    <button type="submit">Excluir</button>
                </form>
            </li>
        <?php endforeach; ?>
    </ul>
</body>

</html>