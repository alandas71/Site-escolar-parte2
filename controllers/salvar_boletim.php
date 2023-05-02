<?php
// configurações de conexão com o banco de dados
include('configImages.php');

if (!isset($_POST['id_aluno']) || $_POST['id_aluno'] === '') {
    echo 'ID do aluno inválido';
    exit;
}

$id_aluno = $_POST['id_aluno'];

// prepara a query para inserir os dados na tabela
$sql = "INSERT INTO notas (id_aluno, materia, nota1, nota2, nota3, faltas, resultado) VALUES (?, ?, ?, ?, ?, ?, ?)";
$stmt = $conn->prepare($sql);

// insere os dados de cada matéria na tabela
foreach ($_POST as $key => $value) {
    if (strpos($key, '_nota1') !== false) {
        $materia = str_replace('_nota1', '', $key);
        $nota1 = $_POST[$key];
        $nota2 = $_POST[str_replace('_nota1', '_nota2', $key)];
        $nota3 = $_POST[str_replace('_nota1', '_nota3', $key)];
        $faltas = $_POST[str_replace('_nota1', '_faltas', $key)];
        $resultado = $_POST[str_replace('_nota1', '_resultado', $key)];

        // insere os dados na tabela 'notas'
        $stmt->execute([$id_aluno, $materia, $nota1, $nota2, $nota3, $faltas, $resultado]);
    }
}
