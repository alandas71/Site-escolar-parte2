<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página de Erro</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            margin: 0;
            padding: 0;
        }

        .container {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f2f2f2;
        }

        .error-code {
            font-size: 100px;
            font-weight: bold;
            margin-bottom: 20px;
        }

        .error-message {
            font-size: 24px;
            margin-bottom: 20px;
        }

        .home-link {
            color: #fff;
            background-color: #007bff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            text-decoration: none;
            transition: background-color 0.3s;
        }

        .home-link:hover {
            background-color: #0056b3;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1 class="error-code">404</h1>
        <p class="error-message">Oops! Página não encontrada.</p>
        <a href="<?= BASE_URL; ?>" class="home-link">Voltar para a página inicial</a>
    </div>
</body>

</html>