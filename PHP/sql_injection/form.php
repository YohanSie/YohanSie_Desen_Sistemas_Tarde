<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Teste</title>
</head>
<body style="display: flex; align-items:center; flex-direction:column; justify-content:center;">
    <h1>SQL Injection Testes</h1>

    <h2>Login Inseguro</h2>
    <form action="login_inseguro.php" method="post">
        <input type="text" name="nome" placeholder="Digite seu nome" required>
        <button type="submit">Entrar</button>
    </form>
    
    <h2>Login Seguro</h2>
    <form action="login_seguro.php" method="post">
        <input type="text" name="nome" placeholder="Digite seu nome" required>
        <button type="submit">Entrar</button>
    </form>
</body>
</html>