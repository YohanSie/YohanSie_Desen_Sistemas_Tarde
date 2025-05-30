<?php
// Conexão com o banco de dados
$host = 'localhost';
$dbname = 'bd_imagem';
$username = 'root';
$password = 'root';
$port = '3307';

try {
    // Cria uma nova instância de PDO para conectar ao banco de dados
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;port=$port", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // Define o modo de erro do PDO para exceções

    // Verifica se o ID foi passado na URL
    if (isset($_GET['id'])) {
        $id = $_GET['id']; // Obtém o ID do funcionário da URL

        // Recupera os dados do funcionário do banco de dados
        $sql = "SELECT nome, telefone, tipo_foto, foto FROM funcionarios WHERE id = :id";
        $stmt = $pdo->prepare($sql); // Prepara a instrução SQL para execução
        $stmt->bindParam(':id', $id, PDO::PARAM_INT); // Vincula o valor do ID ao parâmetro :id
        $stmt->execute(); // Executa a instrução SQL

        // Verifica se encontrou o funcionário
        if ($stmt->rowCount() > 0) {
            $funcionario = $stmt->fetch(PDO::FETCH_ASSOC); // Busca os dados do funcionário como um array associativo

            // Verifica se foi solicitado a exclusão do funcionário
            // LINHA ABAIXO VERIFICA se os dados foram enviados via formulário com o método POST e
            // isset verifica-se se há um valor definido na variável 
            // Verifica se o formulário foi enviado via POST e se existe o campo 'excluir_id'
            if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['excluir_id'])) {
                // Pega o valor do ID que foi enviado pelo formulário (ID do funcionário a ser excluído)
                $excluir_id = $_POST['excluir_id'];
                // Monta a query SQL para deletar o funcionário com o ID correspondente
                $sql_excluir = "DELETE FROM funcionarios WHERE id = :id";
                // Prepara a query para execução segura, evitando SQL injection
                $stmt_excluir = $pdo->prepare($sql_excluir);
                // Associa o valor do ID ao parâmetro :id na query, garantindo que será tratado como número inteiro
                $stmt_excluir->bindParam(':id', $excluir_id, PDO::PARAM_INT);
                // Executa a query, excluindo o funcionário do banco de dados
                $stmt_excluir->execute();

                // Redireciona para a página inicial após a exclusão
                header("Location: consultar_funcionario.php");
                exit();
            }
?>
            <!DOCTYPE html>
            <html lang="pt-br">

            <head>
                <meta charset="UTF-8"> <!-- Define a codificação de caracteres como UTF-8 -->
                <title>Visualizar Funcionário</title> <!-- Título da página -->
                <style>
                    body {
                        font-family: Arial, Helvetica, sans-serif;
                        background: #f4f6f8;
                        margin: 0;
                        padding: 0;
                    }

                    .container {
                        max-width: 420px;
                        margin: 48px auto;
                        background: #fff;
                        border-radius: 10px;
                        box-shadow: 0 2px 12px rgba(0, 0, 0, 0.10);
                        padding: 32px 28px 24px 28px;
                        display: flex;
                        flex-direction: column;
                        align-items: center;
                    }

                    h1 {
                        text-align: center;
                        color: #222;
                        margin-bottom: 28px;
                        font-size: 2em;
                    }

                    .info {
                        width: 100%;
                        margin-bottom: 16px;
                        font-size: 1.08em;
                        color: #222;
                    }

                    .info strong {
                        color: #1976d2;
                        min-width: 90px;
                        display: inline-block;
                    }

                    .foto-funcionario {
                        display: block;
                        margin: 0 auto 24px auto;
                        width: 160px;
                        height: 200px;
                        border-radius: 8px;
                        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
                        border: 2px solid #e3e6ea;
                        object-fit: contain;
                        /* Corrige distorção */
                        background: #f4f6f8;
                    }

                    .botoes {
                        display: flex;
                        justify-content: space-between;
                        gap: 12px;
                        width: 100%;
                        margin-top: 18px;
                    }

                    .btn-voltar {
                        background: #1976d2;
                        color: #fff;
                        border: none;
                        border-radius: 4px;
                        padding: 8px 18px;
                        cursor: pointer;
                        font-size: 1em;
                        transition: background 0.2s;
                        text-decoration: none;
                        text-align: center;
                    }

                    .btn-voltar:hover {
                        background: #125ea7;
                    }

                    .btn-excluir {
                        background: #e53935;
                        color: #fff;
                        border: none;
                        border-radius: 4px;
                        padding: 8px 18px;
                        cursor: pointer;
                        font-size: 1em;
                        transition: background 0.2s;
                    }

                    .btn-excluir:hover {
                        background: #b71c1c;
                    }
                </style>
            </head>

            <body>
                <?php require_once 'dropdown.php';?>

                <div class="container">
                    <h1>Dados do Funcionário</h1>
                    <div class="info"><strong>Nome:</strong> <?= htmlspecialchars($funcionario['nome']) ?></div>
                    <div class="info"><strong>Telefone:</strong> <?= htmlspecialchars($funcionario['telefone']) ?></div>
                    <div class="info"><strong>Foto:</strong></div>
                    <img class="foto-funcionario" src="data:<?= $funcionario['tipo_foto'] ?>;base64,<?= base64_encode($funcionario['foto']) ?>" alt="Foto do Funcionário">
                    <div class="botoes">
                        <a href="consultar_funcionario.php" class="btn-voltar">Voltar</a>
                        <form method="POST" style="margin:0;" onsubmit="return confirm('Tem certeza que deseja excluir este funcionário?');">
                            <input type="hidden" name="excluir_id" value="<?= $id ?>">
                            <button type="submit" class="btn-excluir">Excluir Funcionário</button>
                        </form>
                    </div>
                </div>
            </body>

            </html>
<?php
        } else {
            echo "Funcionário não encontrado."; // Mensagem exibida se o funcionário não for encontrado
        }
    } else {
        echo "ID do funcionário não foi fornecido."; // Mensagem exibida se o ID não for fornecido na URL
    }
} catch (PDOException $e) {
    echo "Erro: " . $e->getMessage(); // Exibe a mensagem de erro se a conexão ou a consulta falhar
}
?>