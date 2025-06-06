<?php

// Função para dimensionar a imagem (aceita JPEG, PNG e GIF)
function redimensionarImagem($imagem, $largura, $altura)
{
    // Obtém as dimensões originais da imagem e o tipo
    list($larguraOriginal, $alturaOriginal, $tipoImagem) = getimagesize($imagem);

    // Seleciona a função de criação conforme o tipo
    switch ($tipoImagem) {
        case IMAGETYPE_JPEG:
            $imagemOriginal = imagecreatefromjpeg($imagem);
            break;
        case IMAGETYPE_PNG:
            $imagemOriginal = imagecreatefrompng($imagem);
            break;
        case IMAGETYPE_GIF:
            $imagemOriginal = imagecreatefromgif($imagem);
            break;
        default:
            return false; // Tipo não suportado
    }

    // Cria uma nova imagem com as dimensões especificadas
    $novaImagem = imagecreatetruecolor($largura, $altura);

    // Preserva transparência para PNG e GIF
    if ($tipoImagem == IMAGETYPE_PNG || $tipoImagem == IMAGETYPE_GIF) {
        imagecolortransparent($novaImagem, imagecolorallocatealpha($novaImagem, 0, 0, 0, 127));
        imagealphablending($novaImagem, false);
        imagesavealpha($novaImagem, true);
    }

    // Copia e redimensiona a imagem original para a nova imagem
    imagecopyresampled($novaImagem, $imagemOriginal, 0, 0, 0, 0, $largura, $altura, $larguraOriginal, $alturaOriginal);

    // Inicia a saída em buffer para capturar os dados da imagem
    ob_start();
    switch ($tipoImagem) {
        case IMAGETYPE_JPEG:
            imagejpeg($novaImagem);
            break;
        case IMAGETYPE_PNG:
            imagepng($novaImagem);
            break;
        case IMAGETYPE_GIF:
            imagegif($novaImagem);
            break;
    }
    $dadosImagem = ob_get_clean();

    // Libera a memória usada pelas imagens
    imagedestroy($novaImagem);
    imagedestroy($imagemOriginal);

    return $dadosImagem; // Retorna os dados da imagem redimensionada
}

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

    if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_FILES['foto'])) {
        if ($_FILES['foto']['error'] == 0) {
            $nome = $_POST['nome'];
            $telefone = $_POST['telefone'];
            $nomeFoto = $_FILES['foto']['name'];
            $tipoFoto = $_FILES['foto']['type'];

            // Redimensiona a imagem para 300x400px (aceita JPEG, PNG, GIF)
            $foto = redimensionarImagem($_FILES['foto']['tmp_name'], 300, 400);

            if ($foto === false) {
                echo "Apenas imagens JPEG, PNG ou GIF são permitidas!";
                exit;
            }

            // prepara a instrucao sql para inserir os dados do funcionario no database
            $sql = "INSERT INTO funcionarios (nome, telefone, nome_foto, tipo_foto, foto)
            VALUES (:nome, :telefone, :nome_foto, :tipo_foto, :foto)";

            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(":nome", $nome);
            $stmt->bindParam(":telefone", $telefone);
            $stmt->bindParam(":nome_foto", $nomeFoto);
            $stmt->bindParam(":tipo_foto", $tipoFoto);
            $stmt->bindParam(":foto", $foto, PDO::PARAM_LOB);

            if (!$stmt->execute()) {
                echo "Funcionário cadastrado com sucesso";
            }
        } else {
            echo "Erro ao fazer UPLOAD da FOTO: " . $_FILES['foto']['error'];
        }
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
    <title>Resultado do Cadastro</title>
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
            background: #f4f6f8;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 420px;
            margin: 60px auto;
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

        .mensagem {
            font-size: 1.15em;
            color: #1976d2;
            margin-bottom: 24px;
            text-align: center;
        }

        .erro {
            font-size: 1.15em;
            color: #e53935;
            margin-bottom: 24px;
            text-align: center;
        }

        .btn-listar {
            background: #1976d2;
            color: #fff;
            border: none;
            border-radius: 4px;
            padding: 10px 22px;
            cursor: pointer;
            font-size: 1em;
            text-decoration: none;
            transition: background 0.2s;
        }

        .btn-listar:hover {
            background: #125ea7;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Resultado do Cadastro</h1>
        <?php
        // Exibe a mensagem de retorno do PHP
        if (isset($stmt) && $stmt->rowCount() > 0) {
            echo '<div class="mensagem">Funcionário cadastrado com sucesso!</div>';
        } elseif (isset($erro) && $erro) {
            echo '<div class="erro">' . htmlspecialchars($erro) . '</div>';
        }
        ?>
        <a href="consultar_funcionario.php" class="btn-listar">Listar Funcionário</a>
    </div>
</body>

</html>