<?php
// incluir o arquivo de conexão com o banco de dados
require_once('configImages.php');

// verificar se foi feita uma requisição para salvar um evento
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // obter os dados do evento
    $title = $_POST['title'];
    $start = $_POST['start'];
    $end = $_POST['end'];

    // inserir o evento no banco de dados
    $stmt = $conn->prepare('INSERT INTO events (title, start, end) VALUES (?, ?, ?)');
    $stmt->execute([$title, $start, $end]);

    // retornar uma resposta HTTP bem-sucedida
    http_response_code(200);
    exit();
}
