<?php
if (isset($_SESSION["usuario"]) && is_array($_SESSION["usuario"])) {
    require("configImages.php");

    $adm  = $_SESSION["usuario"][1];
    $nome = $_SESSION["usuario"][0];
} else {
    echo "<script>window.location = 'login.php'</script>";
}
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
    <br>
    <div class="header" style="text-align: left; padding-left: 20px; background: none;">
        <form action="banners_upload.php" method="post" enctype="multipart/form-data">
            <h1 class="title">Banners</h1>
            <label for="image">Selecione um banner:</label>
            <input type="file" name="image" id="image">
            <input type="submit" name="submit" value="Enviar">
        </form>
        <br>
        <div class="delete">
            <?php
            include_once('delete_banners.php');
            ?>
        </div>
        <br>
        <br>
        <br>
        <br>
        <form action="prof_upload.php" method="post" enctype="multipart/form-data">
            <h1 class="title">Nossa equipe</h1>
            <input type="text" name="nome" placeholder="Nome ">
            <label for="nome"></label>
            <input type="text" name="info" placeholder="ex: Grupo 1 e 2">
            <label for="info"></label>
            <label for="image">Selecione uma foto:</label>
            <input type="file" name="image" id="image">
            <input type="submit" name="submit" value="Enviar">
        </form>
        <br>
        <div class="delete">
            <?php
            include_once('delete_prof.php');
            ?>
        </div>
        <br>
        <br>
        <form action="depoimentos_upload.php" method="post" enctype="multipart/form-data">
            <h1 class="title">Depoimentos</h1>
            <label for="image">Selecione um depoimento:</label>
            <input type="file" name="image" id="image">
            <input type="submit" name="submit" value="Enviar">
        </form>
        <br>
        <div class="delete">
            <?php
            include_once('delete_depoimentos.php');
            ?>
        </div>
        <div>
            <footer style="margin-top: 50px; padding: 50px; width: 100%; text-align:center;">
                <p>&copy; 2023 Centro Educar Arco-íris</p>
            </footer>
        </div>
    </div>

</body>

</html>
<script src="../assets/js/jquery-3.6.1.min.js"></script>
<script src="../assets/js/login.js"></script>