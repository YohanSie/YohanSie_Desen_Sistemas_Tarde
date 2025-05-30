<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Início</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        body {
            background: #f4f6f8;
        }

        .container {
            max-width: 700px;
            margin: 60px auto;
            background: #fff;
            border-radius: 12px;
            box-shadow: 0 2px 12px rgba(0, 0, 0, 0.27);
            padding: 40px 32px 32px 32px;
            text-align: center;
        }

        h1 {
            color: #1976d2;
            margin-bottom: 12px;
            font-size: 2.4em;
        }

        p {
            color: #444;
            font-size: 1.15em;
            margin-bottom: 32px;
        }
    </style>
</head>

<body>

    <?php require_once 'dropdown.php';?>

    <!-- Apresentação -->
    <div class="container mt-5">
        <h1>Sistema de Funcionários</h1>
        <p>
            Bem-vindo ao sistema de cadastro e consulta de funcionários.<br>
            Utilize o menu acima para acessar as funcionalidades.
        </p>
        <img src="https://cdn-icons-png.flaticon.com/512/3135/3135715.png" alt="Funcionários" width="120" class="mb-3" />
    </div>
</body>

</html>