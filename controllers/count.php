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
    <div class="container-count">
        <div class="top-left">
            <p class="count-title">TOTAL DE ALUNOS</p>
            <div class="dsh-count" id="contador-alunos"></div>
        </div>
        <div class="top-right">
            <p class="count-title">TOTAL DE PROFESSORES</p>
            <div class="dsh-count" id="contador-prof"></div>
        </div>
        <div class="bottom-left">
            <p class="count-title">TOTAL DE TURMAS</p>
            <div class="dsh-count" id="contador-turma"></div>
        </div>
    </div>


    <?php
    include('configImages.php');

    // define a consulta SQL
    $sql = "SELECT COUNT(*) FROM users WHERE tipo = 'aluno'";

    // executa a consulta e armazena o resultado na variável $count
    $count = $conn->query($sql)->fetchColumn();
    ?>
    <?php
    include('configImages.php');

    // define a consulta SQL
    $sql2 = "SELECT COUNT(*) FROM users WHERE tipo = 'prof'";

    // executa a consulta e armazena o resultado na variável $count
    $count2 = $conn->query($sql2)->fetchColumn();
    ?>
    <?php
    include('configImages.php');

    // define a consulta SQL
    $sql3 = "SELECT COUNT(id) FROM turmas";

    // executa a consulta e armazena o resultado na variável $count
    $count3 = $conn->query($sql3)->fetchColumn();
    ?>




    <script>
        var limite = <?= $count ?>; // define o número limite da contagem
        var contador = 0; // inicializa o contador
        var intervalo = setInterval(function() {
            if (<?= $count ?> > 0) {
                contador++;
            } else {
                contador
            }
            document.getElementById("contador-alunos").innerHTML = contador;
            if (contador == limite) {
                clearInterval(intervalo); // para a animação quando alcançar o limite
            }
        }, 100); // define o intervalo de tempo entre cada contagem (1000ms = 1s)
    </script>
    <script>
        var limite2 = <?= $count2 ?>; // define o número limite da contagem
        var contador2 = 0; // inicializa o contador
        var intervalo2 = setInterval(function() {
            if (<?= $count2 ?> > 0) {
                contador2++;
            } else {
                contador2
            }
            document.getElementById("contador-prof").innerHTML = contador2;
            if (contador2 == limite2) {
                clearInterval(intervalo2); // para a animação quando alcançar o limite
            }
        }, 100); // define o intervalo de tempo entre cada contagem (1000ms = 1s)
    </script>
    <script>
        var limite3 = <?= $count3 ?>; // define o número limite da contagem
        var contador3 = 0; // inicializa o contador
        var intervalo3 = setInterval(function() {
            if (<?= $count3 ?> > 0) {
                contador3++;
            } else {
                contador3
            }
            document.getElementById("contador-turma").innerHTML = contador3;
            if (contador3 == limite3) {
                clearInterval(intervalo3); // para a animação quando alcançar o limite
            }
        }, 100); // define o intervalo de tempo entre cada contagem (1000ms = 1s)
    </script>
</body>

</html>