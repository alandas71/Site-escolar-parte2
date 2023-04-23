<?php
$dbHost = 'localhost';
$dbUsername = 'root';
$dbPassword = '';
$dbName = 'banco-dados';

$conn = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

// Verificação da conexão
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

// Obtenção dos parâmetros da URL
$email = isset($_GET["email"]) ? $_GET["email"] : "";
$nome = isset($_GET["nome"]) ? $_GET["nome"] : "";
$turno = isset($_GET["turno"]) ? $_GET["turno"] : "";
$turma = isset($_GET["turma"]) ? $_GET["turma"] : "";

if (empty($email) || empty($nome) || empty($turno) || empty($turma)) {
    die("Parâmetros inválidos");
}

$num_aleatorio = str_pad(rand(0, 9999), 4, '0', STR_PAD_LEFT);

if ($turno == 'Matutino') {
    $sql = "INSERT INTO users (email, senha, nome, tipo, adm, turma1) VALUES ('$email', 'ceai$num_aleatorio', '$nome', 'aluno', 0, '$turma')";
} else if ($turno == 'Vespertino') {
    $sql = "INSERT INTO users (email, senha, nome, tipo, adm, turma2) VALUES ('$email', 'ceai$num_aleatorio', '$nome', 'aluno', 0, '$turma')";
} else {
    die("Turno inválido");
}

if ($conn->query($sql) === TRUE) {
    header("location: dashboard.php?view=matricula");
    exit();
} else {
    echo "Erro ao inserir usuário: " . $conn->error;
}

$conn->close();
