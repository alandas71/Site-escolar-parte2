<?php
if (isset($_POST['excluir_fotos'])) {
    $id = $_POST['id'];

    // Consulta o nome do arquivo no banco de dados
    $sql = "SELECT * FROM fotos WHERE id = $id";
    $resultado = mysqli_query($mysqli, $sql);
    $row = mysqli_fetch_assoc($resultado);
    $nome_arquivo = $row['foto'];

    // Exclui o registro do banco de dados
    $sql = "DELETE FROM fotos WHERE id = $id";
    mysqli_query($mysqli, $sql);

    // Exclui o arquivo do diretório de imagens
    $diretorio = "../assets/images/album/fotos/";
    $caminho_arquivo = $diretorio . $nome_arquivo;
    unlink($caminho_arquivo);
    header("location: dashboard.php?view=album");
} elseif (isset($_POST['alterar-situacao_fotos'])) {
    $id = $_POST['id'];
    $situacao = $_POST['situacao'] == 1 ? 2 : 1;
    $sql = "UPDATE fotos SET situacao = $situacao WHERE id = $id";
    mysqli_query($mysqli, $sql);
    header("location: dashboard.php?view=album");
}

// Consulta as imagens no banco de dados
$sql = "SELECT * FROM fotos";
$resultado = mysqli_query($mysqli, $sql);

while ($row = mysqli_fetch_assoc($resultado)) {
    echo '<div>';
    echo '<img style="height: 100px; width: 100px;" src="../assets/images/album/fotos/' . $row['foto'] . '">';
    echo '<form method="post" action="delete_fotos.php">';
    echo '<input type="hidden" name="id" value="' . $row['id'] . '">';
    echo '<input type="hidden" name="situacao" value="' . $row['situacao'] . '">';
    echo '<button style=" font-size:10px;" type="submit" name="alterar-situacao_fotos">' . (($row['situacao'] == 1) ? 'Desativar' : 'Ativar') . '</button>';
    echo '<input style=" font-size:10px;" type="submit" name="excluir_fotos" value="Excluir">';
    echo '</form>';
    echo '</div>';
}
