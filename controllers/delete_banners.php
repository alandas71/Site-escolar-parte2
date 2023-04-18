<?php
// Conexão com o banco de dados
$dbHost = 'localhost';
$dbUserName = 'root';
$dbPassword = '';
$dbName = 'banco-dados';

$conn = mysqli_connect($dbHost, $dbUserName, $dbPassword, $dbName);

if (isset($_POST['excluir_banner'])) {
    $id = $_POST['id'];

    // Consulta o nome do arquivo no banco de dados
    $sql = "SELECT * FROM slides WHERE id = $id";
    $resultado = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($resultado);
    $nome_arquivo = $row['imagem'];

    // Exclui o registro do banco de dados
    $sql = "DELETE FROM slides WHERE id = $id";
    mysqli_query($conn, $sql);

    // Exclui o arquivo do diretório de imagens
    $diretorio = "../assets/images/banners/";
    $caminho_arquivo = $diretorio . $nome_arquivo;
    unlink($caminho_arquivo);

    header("Location: " . $_SERVER['PHP_SELF']);
    exit();
} elseif (isset($_POST['alterar-situacao_banner'])) {
    $id = $_POST['id'];
    $situacao = $_POST['situacao'] == 1 ? 2 : 1;
    $sql = "UPDATE slides SET situacao = $situacao WHERE id = $id";
    mysqli_query($conn, $sql);
    header("Location: " . $_SERVER['PHP_SELF']);
    exit();
}

// Consulta as imagens no banco de dados
$sql = "SELECT * FROM slides";
$resultado = mysqli_query($conn, $sql);

while ($row = mysqli_fetch_assoc($resultado)) {
    echo '<div>';
    echo '<img style="height: 100px; width: 300px;" src="../assets/images/banners/' . $row['imagem'] . '">';
    echo '<form method="post" action="">';
    echo '<input type="hidden" name="id" value="' . $row['id'] . '">';
    echo '<input type="hidden" name="situacao" value="' . $row['situacao'] . '">';
    echo '<button type="submit" name="alterar-situacao_banner">' . (($row['situacao'] == 1) ? 'Desativar' : 'Ativar') . '</button>';
    echo '<input type="submit" name="excluir_banner" value="Excluir">';
    echo '</form>';
    echo '</div>';
}

// Fecha a conexão com o banco de dados
mysqli_close($conn);
