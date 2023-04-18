<?php
// Conexão com o banco de dados
$dbHost = 'localhost';
$dbUserName = 'root';
$dbPassword = '';
$dbName = 'banco-dados';

$conn = mysqli_connect($dbHost, $dbUserName, $dbPassword, $dbName);

if (isset($_POST['excluir_prof'])) {
    $id = $_POST['id'];

    // Consulta o nome do arquivo no banco de dados
    $sql = "SELECT * FROM professores WHERE id = $id";
    $resultado = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($resultado);
    $nome_arquivo = $row['face'];

    // Exclui o registro do banco de dados
    $sql = "DELETE FROM professores WHERE id = $id";
    mysqli_query($conn, $sql);

    // Exclui o arquivo do diretório de imagens
    $diretorio = "../assets/images/professores/";
    $caminho_arquivo = $diretorio . $nome_arquivo;
    unlink($caminho_arquivo);
} elseif (isset($_POST['alterar-situacao_prof'])) {
    $id = $_POST['id'];
    $situacao = $_POST['situacao'] == 1 ? 2 : 1;
    $sql = "UPDATE professores SET situacao = $situacao WHERE id = $id";
    mysqli_query($conn, $sql);
}

// Consulta as imagens no banco de dados
$sql = "SELECT * FROM professores";
$resultado = mysqli_query($conn, $sql);

while ($row = mysqli_fetch_assoc($resultado)) {
    echo '<div>';
    echo '<img class="radiusProfa" style="height: 100px; width: 100px;" src="../assets/images/professores/' . $row['face'] . '">';
    echo '<form method="post" action="">';
    echo '<input type="hidden" name="id" value="' . $row['id'] . '">';
    echo '<input type="hidden" name="situacao" value="' . $row['situacao'] . '">';
    echo '<button type="submit" name="alterar-situacao_prof">' . (($row['situacao'] == 1) ? 'Desativar' : 'Ativar') . '</button>';
    echo '<input type="submit" name="excluir_prof" value="Excluir">';
    echo '</form>';
    echo '</div>';
}

// Fecha a conexão com o banco de dados
mysqli_close($conn);
