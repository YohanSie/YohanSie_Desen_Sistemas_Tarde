<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Excluir Cliente</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h2>Excluir Cliente</h2>
    <form action="process_delete.php" method="post">
        <label for="id">ID do Cliente</label>
        <input type="number" name="id" id="id" required>

        <button type="submit">Excluir Cliente</button>
    </form>
</body>
</html>