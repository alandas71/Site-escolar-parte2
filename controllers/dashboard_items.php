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
<html>

<head>
    <title>Contagem Progressiva</title>
    <link rel="stylesheet" href="..\assets\css\style.css" />
    <link rel="stylesheet" href="..\assets\css\tablet.css" />
    <link rel="stylesheet" href="..\assets\css\mobile.css" />
</head>

<body>
    <div class='container-dash cont-dash'>
        <div class="items-dash">
            <?php include('count.php'); ?>
        </div>
        <div class="items-dash">
            <?php include('grafico.php'); ?>
        </div>
        <div style="clear: both;"></div>
    </div>
    <div class='container-dash'>
        <br>
        <div>
            <?php include('agenda.php'); ?>
        </div>
    </div>
    <footer style="margin: 0; padding: 0; width: 100%; height: 100px; text-align:center;">
        <p>&copy; 2023 Centro Educar Arco-íris</p>
    </footer>
</body>

</html>