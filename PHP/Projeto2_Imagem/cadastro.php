<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário Cadastro</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body> 
    <?php require_once 'dropdown.php';?>

    <div class="container">
        <h1>Cadastro</h1>
        <h2>Funcionários</h2>

        <!-- Formulário para cadastrar funcionário -->
        <form action="salvar_funcionario.php" method="post" enctype="multipart/form-data">
            <!-- Campo para inserir o nome do funcionario -->
            <label for="nome">Nome: </label>    
            <input type="text" name="nome" id="nome" required>
            <!-- Campo para inserir o telefone do funcionario -->
            <label for="telefone">Telefone: </label>
            <input type="tel" name="telefone" id="telefone" required>
            <!-- Campo para upload da foto do funcionario -->
            <label for="foto">Foto: </label>
            <input type="file" name="foto" id="foto" required>
            <!-- Botão para enviar o formulário -->
            <button type="submit">Enviar</button>
        </form>
    </div>
</body>

</html>