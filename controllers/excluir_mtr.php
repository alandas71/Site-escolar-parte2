<?php
if (isset($_SESSION["usuario"]) && is_array($_SESSION["usuario"])) {
    require("configImages.php");

    $adm  = $_SESSION["usuario"][1];
    $nome = $_SESSION["usuario"][0];
} else {
    echo "<script>window.location = 'login.php'</script>";
}
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
        header("location: dashboard.php?view=matricula");
    } else {
        echo "Erro ao excluir registro: " . $conn->error;
    }
}

$conn->close();
