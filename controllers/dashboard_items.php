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
    <div class='container-dash' id="container-dash">
        <div style="display: inline-block; float: left; margin-left:50px;">
            <?php include('count.php'); ?>
        </div>
        <div style="display: inline-block; float: left; margin-left:50px;">
            <?php include('grafico.php'); ?>
        </div>
        <div style="clear: both;"></div>
    </div>
    <div class='container-dash' style=" background-color: white; margin-top: 50px; padding-bottom:50px; margin-right:40px; box-shadow: -10px 10px 15px rgba(0, 0, 0, 0.5);">
        <br>
        <div>
            <?php include('agenda.php'); ?>
        </div>
    </div>
    <footer style="margin: 0; padding: 0; width: 100%; height: 100px; text-align:center;">
        <p>&copy; 2022 Centro Educar Arco-íris</p>
    </footer>
</body>

</html>