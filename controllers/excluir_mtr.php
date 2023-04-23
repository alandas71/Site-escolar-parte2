<?php
// Conecte-se ao banco de dados
include('configServer.php');

// Verifique a conexão
if ($conn->connect_error) {
    die("Falha na conexão com o banco de dados: " . $conn->connect_error);
}

// Verifique se o parâmetro do ID foi enviado
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Exclua o registro correspondente no banco de dados
    $sql = "DELETE FROM matricula WHERE id = $id";
    if ($conn->query($sql) === TRUE) {
        echo "Registro excluído com sucesso";
    } else {
        echo "Erro ao excluir registro: " . $conn->error;
    }
}

$conn->close();
