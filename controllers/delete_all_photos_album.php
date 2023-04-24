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

// Verificar se o formulário foi enviado
if (isset($_POST['id_album'])) {
    // Obter o ID do álbum selecionado
    $id_album = $_POST['id_album'];

    // Excluir todas as fotos do álbum
    $sql = "SELECT * FROM fotos WHERE id_album = '$id_album'";
    $result = mysqli_query($conn, $sql);

    while ($row = mysqli_fetch_assoc($result)) {
        // Consulta o nome do arquivo no banco de dados
        $id = $row['id'];
        $sql = "SELECT * FROM fotos WHERE id = $id";
        $result2 = mysqli_query($conn, $sql);
        $row2 = mysqli_fetch_assoc($result2);
        $nome_arquivo = $row2['foto'];

        // Exclui o registro do banco de dados
        $sql = "DELETE FROM fotos WHERE id = $id";
        mysqli_query($conn, $sql);

        // Exclui o arquivo do diretório de imagens
        $diretorio = "../assets/images/album/fotos/";
        $caminho_arquivo = $diretorio . $nome_arquivo;
        unlink($caminho_arquivo);
    }

    // Redireciona de volta para a página do álbum
    header("location: dashboard.php?view=album");
} else {
    // O formulário não foi enviado
    header("location: dashboard.php?view=album");
}

// Fecha a conexão com o banco de dados
mysqli_close($conn);
