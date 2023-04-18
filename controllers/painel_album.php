<?php
include_once('configImages.php');
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ARCO-ÍRIS</title>
    <link rel="stylesheet" href="..\assets\css\style.css" />
    <link rel="stylesheet" href="..\assets\css\tablet.css" />
    <link rel="stylesheet" href="..\assets\css\mobile.css" />
    <link rel="shortcut icon" href="icone.ico" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300&display=swap" rel="stylesheet">
</head>

<body>
    <div class="header" style="text-align: left; padding-left: 20px; background: none;">
        <br>
        <h1 class="title">Criar álbum</h1>
        <br>
        <form action="criar_album.php" method="POST" enctype="multipart/form-data">
            <label for="nome_album">Nome do Álbum:</label>
            <input type="text" id="nome_album" name="nome_album" required>

            <label for="capa_album">Capa do Álbum:</label>
            <input type="file" id="capa_album" name="capa_album" required>

            <input type="submit" value="Criar Álbum">
        </form>
        <br>
        <h1 class="title">Adicionar foto</h1>
        <?php
        $query_album = "SELECT id, capa, id_album FROM albuns WHERE situacao = 1";
        $result_album = $conn->prepare($query_album);
        $result_album->execute();

        $quantidade_album = $result_album->rowCount();
        ?>
        <form method="post" action="add_foto_album.php" enctype="multipart/form-data">
            <select name="id_album" required>
                <option selected disabled value=''>Selecione o álbum</option>
                <?php while ($row_album = $result_album->fetch(PDO::FETCH_ASSOC)) {
                    list("id_album" => $id_album) = $row_album;
                    $id_album = strtolower(str_replace(" ", "", $id_album));
                    echo "<option value='$id_album'>$id_album</option>";
                } ?>
            </select>
            <input type="file" name="nova_foto">
            <input type="submit" value="Adicionar foto">
        </form>
        <br>
        <h1 class="title">Excluir álbum</h1>
        <?php
        $query_album = "SELECT id, capa, id_album FROM albuns WHERE situacao = 1";
        $result_album = $conn->prepare($query_album);
        $result_album->execute();

        $quantidade_album = $result_album->rowCount();
        ?>
        <br>
        <form method="post" action="delete_album.php">
            <select name="id_album" required>
                <option selected disabled value=''>Selecione o álbum</option>
                <?php while ($row_album = $result_album->fetch(PDO::FETCH_ASSOC)) {
                    $id_album = $row_album["id_album"];
                    $id_album_lower = strtolower(str_replace(" ", "", $id_album));
                    echo "<option value='$id_album_lower'>$id_album</option>";
                } ?>
            </select>
            <input type="submit" value="Excluir álbum">
        </form>
        <br>
        <h1 class="title">Todas as fotos</h1>
        <div class="delete">
            <?php
            include('delete_fotos.php');
            ?>
        </div>
    </div>
</body>

</html>
<script src="../assets/js/jquery-3.6.1.min.js"></script>
<script src="../assets/js/login.js"></script>