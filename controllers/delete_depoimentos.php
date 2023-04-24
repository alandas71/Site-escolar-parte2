<?php
if (isset($_SESSION["usuario"]) && is_array($_SESSION["usuario"])) {
    require("configImages.php");

    $adm  = $_SESSION["usuario"][1];
    $nome = $_SESSION["usuario"][0];
} else {
    echo "<script>window.location = 'login.php'</script>";
}
// Conexão com o banco de dados
include('configServer.php');

if (isset($_POST['excluir_depoimentos'])) {
    $id = $_POST['id'];

    // Consulta o nome do arquivo no banco de dados
    $sql = "SELECT * FROM depoimentos WHERE id = $id";
    $resultado = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($resultado);
    $nome_arquivo = $row['depoimento'];

    // Exclui o registro do banco de dados
    $sql = "DELETE FROM depoimentos WHERE id = $id";
    mysqli_query($conn, $sql);

    // Exclui o arquivo do diretório de imagens
    $diretorio = "../assets/images/depoimentos/";
    $caminho_arquivo = $diretorio . $nome_arquivo;
    unlink($caminho_arquivo);
    header("location: dashboard.php?view=site");
    exit();
} elseif (isset($_POST['alterar-situacao_depoimentos'])) {
    $id = $_POST['id'];
    $situacao = $_POST['situacao'] == 1 ? 2 : 1;
    $sql = "UPDATE depoimentos SET situacao = $situacao WHERE id = $id";
    mysqli_query($conn, $sql);
    header("location: dashboard.php?view=site");
    exit();
}

// Consulta as imagens no banco de dados
$sql = "SELECT * FROM depoimentos";
$resultado = mysqli_query($conn, $sql);

while ($row = mysqli_fetch_assoc($resultado)) {
    echo '<div>';
    echo '<img style="height: 200px; width: 250px;" src="../assets/images/depoimentos/' . $row['depoimento'] . '">';
    echo '<form method="post" action="delete_depoimentos.php">';
    echo '<input type="hidden" name="id" value="' . $row['id'] . '">';
    echo '<input type="hidden" name="situacao" value="' . $row['situacao'] . '">';
    echo '<button type="submit" name="alterar-situacao_depoimentos">' . (($row['situacao'] == 1) ? 'Desativar' : 'Ativar') . '</button>';
    echo '<input type="submit" name="excluir_depoimentos" value="Excluir">';
    echo '</form>';
    echo '</div>';
}

// Fecha a conexão com o banco de dados
mysqli_close($conn);
