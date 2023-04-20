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
$email = $_GET["email"];
$nome = $_GET["nome"];

$num_aleatorio = str_pad(rand(0, 9999), 4, '0', STR_PAD_LEFT);
$sql = "INSERT INTO users (email, senha, nome, tipo, adm) VALUES ('$email', 'ceai$num_aleatorio'  , '$nome', 'aluno', 0)";
if ($conn->query($sql) === TRUE) {
    header("location: dashboard.php?view=matricula");
    exit();
} else {
    echo "Erro ao inserir usuário: " . $conn->error;
}

$conn->close();
