<?php
session_start();

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
    <script src="../assets/js/dashboard.js" defer></script>
    <script src="../assets/js/sidebar_optionActive.js" defer></script>
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body style="overflow-x: hidden;">
    <?php if ($adm) : ?>
        <div class="topo_dashboard">
            <div class="topointerior">
                <div class="menu-hamburguer">
                    <input type="checkbox" id=checkbox-menu>
                    <label id="labelMenu" for="checkbox-menu">
                        <span class="spanMenu"></span>
                        <span class="spanMenu"></span>
                        <span class="spanMenu"></span>
                    </label>
                    <ul>
                        <a href="sobre.php">
                            <li>SOBRE</li>
                        </a>
                        <a href="album.php">
                            <li>ALBUM</li>
                        </a>
                        <a href="login.php">
                            <li>ALUNO</li>
                        </a>
                        <a href="matricula.php">
                            <li>MATRÍCULA</li>
                        </a>
                        <a href="../">
                            <li>INÍCIO</li>
                        </a>
                    </ul>
                </div>
                <div class="menu">
                    <ul>
                        <a href="sobre.php">
                            <li>SOBRE</li>
                        </a>
                        <a href="album.php">
                            <li>ALBUM</li>
                        </a>
                        <a href="login.php">
                            <li>ALUNO</li>
                        </a>
                        <a href="matricula.php">
                            <li>MATRÍCULA</li>
                        </a>
                        <a href="../">
                            <li>INÍCIO</li>
                        </a>
                    </ul>
                </div>
            </div>
        </div>

        <div class="dashboard">
            <div class="wrapper">
                <div class="sidebar">
                    <h1>Centro Educar Arco-íris</h1>
                    <div class="sidebar-header">
                    </div>
                    <ul class="sidebar-menu">
                        <li>
                            <a href="dashboard.php?view=dashboard" id="menu-dashboard">
                                <i class="fas fa-tachometer-alt"></i>
                                DASHBOARD
                            </a>
                        </li>
                        <li>
                            <a href="dashboard.php?view=estudantes">
                                <i class="fas fa-users" id="menu-estudantes"></i>
                                ESTUDANTES
                            </a>
                        </li>
                        <li>
                            <a href="dashboard.php?view=assuntos">
                                <i class="fas fa-book" id="menu-assuntos"></i>
                                ASSUNTOS
                            </a>
                        </li>
                        <li>
                            <a href="dashboard.php?view=notas">
                                <i class="fas fa-clipboard-list" id="menu-notas"></i>
                                NOTAS
                            </a>
                        </li>
                        <li>
                            <a href="dashboard.php?view=professores">
                                <i class="fas fa-chalkboard-teacher" id="menu-professores"></i>
                                PROFESSORES
                            </a>
                        </li>
                        <li>
                            <a href="dashboard.php?view=album">
                                <i class="fas fa-door-open" id="menu-album"></i>
                                ÁLBUM
                            </a>
                        </li>
                        <li>
                            <a href="dashboard.php?view=site">
                                <i class="fas fa-door-open" id="menu-site"></i>
                                EDITAR SITE
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="view">
                    <?php
                    if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["view"])) {
                        $view = $_GET["view"];
                        switch ($view) {
                            case "estudantes":
                                include('relacao_alunos.php');
                                break;
                            case "album":
                                include('painel_album.php');
                                break;
                            case "site":
                                include('painel.php');
                                break;
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
    <?php endif; ?>
</body>

</html>
<script src="../assets/js/jquery-3.6.1.min.js"></script>
<script src="../assets/js/login.js"></script>