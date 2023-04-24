<?php
// incluir o arquivo de conexão com o banco de dados
require_once('configImages.php');

// obter o ID do evento a ser deletado
$id = $_GET['id'];

// deletar o evento do banco de dados
$stmt = $conn->prepare('DELETE FROM events WHERE id = ?');
$stmt->execute([$id]);
