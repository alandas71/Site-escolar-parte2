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

// Verifica se a conexão é bem-sucedida
if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}

// Verifica se o ID do álbum a ser excluído foi passado como parâmetro
if (isset($_POST["id_album"])) {
    $id_album = $_POST["id_album"];

    // Define a variável $id_album antes do loop while
    $id_album_to_delete = $id_album;

    // Seleciona as fotos do álbum que será excluído
    $sql = "SELECT id_album, foto FROM fotos WHERE id_album = '$id_album'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Deleta cada arquivo de imagem e remove o registro correspondente da tabela "fotos"
        while ($row = $result->fetch_assoc()) {
            $caminho_foto = "../assets/images/album/fotos/" . $row["foto"];
            if (file_exists($caminho_foto)) {
                unlink($caminho_foto);
            }
            $id_foto = $row["id_album"];
            $sql = "DELETE FROM fotos WHERE id_album = '$id_foto'";
            $conn->query($sql);
        }
    }

    // Obtenha o nome do arquivo de capa do álbum que está sendo excluído
    $sql = "SELECT capa FROM albuns WHERE id_album = '$id_album_to_delete'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $nome_capa = $row['capa'];

    // Exclua o registro de álbum do banco de dados
    $sql = "DELETE FROM albuns WHERE id_album = '$id_album_to_delete'";
    if ($conn->query($sql) === TRUE) {
        // Exclua a capa do diretório, se existir
        $caminho_capa = "../assets/images/album/" . $nome_capa;
        if (file_exists($caminho_capa)) {
            unlink($caminho_capa);
        }

        header('Location: dashboard.php?view=album');
        exit();
    }
}
