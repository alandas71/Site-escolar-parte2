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
</head>

<body>
    <div style=" background-color: white; display: flex; justify-content: center; align-items: center; margin-left:20px; padding-bottom:50px; box-shadow: -10px 10px 15px rgba(0, 0, 0, 0.5);">
        <div style="display: inline-block; float: left; margin-left:50px;">
            <?php include('count.php'); ?>
        </div>
        <div style="display: inline-block; float: left; margin-left:50px;">
            <?php include('grafico.php'); ?>
        </div>
        <div style="clear: both;"></div>
    </div>
    <div style=" background-color: white; margin-top: 50px; margin-left:20px; padding-bottom:50px; box-shadow: -10px 10px 15px rgba(0, 0, 0, 0.5);">
        <br>
        <div>
            <?php include('agenda.php'); ?>
        </div>
    </div>
    <br>

</body>

</html>