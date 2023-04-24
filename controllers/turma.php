<?php
if (isset($_SESSION["usuario"]) && is_array($_SESSION["usuario"])) {
    require("configImages.php");

    $adm  = $_SESSION["usuario"][1];
    $nome = $_SESSION["usuario"][0];
} else {
    echo "<script>window.location = 'login.php'</script>";
}
include_once('configImages.php');
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ARCO-ÍRIS</title>
</head>

<body>
    <div>
        <?php include('config_turmas.php'); ?>
    </div>
    <br>
    <div>
        <?php include('criar_turmas.php'); ?>
    </div>
</body>

</html>