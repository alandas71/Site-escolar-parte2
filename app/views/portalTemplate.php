<?php
if (isset($_SESSION["usuario"]) && is_array($_SESSION["usuario"])) {
    require("app/login/connLogin.php");

    $conexaoClass = new Conexao();
    $conn = $conexaoClass->conectar();

    $turma2 = $_SESSION["usuario"][4];
    $turma1 = $_SESSION["usuario"][3];
    $id = $_SESSION["usuario"][2];
    $tipo = $_SESSION["usuario"][1];
    $nome = $_SESSION["usuario"][0];

    if ($tipo !== "aluno") {
        header("Location:" . BASE_URL . "aluno");
        exit();
    }
} else {
    header("Location:" . BASE_URL . "aluno");
    exit();
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Arco-íris</title>
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/js/bootstrap-3.3.7/css/bootstrap.css" />
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>assets\css\style.css" />
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>assets\css\tablet.css" />
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>assets\css\mobile.css" />
    <link rel="shortcut icon" href="<?php echo BASE_URL; ?>assets/images/icone.ico" type="image/x-icon">
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="<?php echo BASE_URL; ?>assets/js/sidebar_hide.js" defer></script>
    <script src='<?php echo BASE_URL; ?>assets/js/fullCalendar/dist/index.global.js'></script>
    <script src='<?php echo BASE_URL; ?>assets/js/fullCalendar/packages/core/locales/pt-br.global.js'></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.3.1/jspdf.umd.min.js"></script>
    <style>
        .legend {
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }

        .legend-item {
            display: flex;
            align-items: center;
            margin-right: 10px;
        }

        .legend-item span {
            font-size: 10px;
        }

        .legend-color {
            width: 10px;
            height: 10px;
            margin-right: 5px;
        }

        .red {
            background-color: red;
        }

        .blue {
            background-color: blue;
        }

        .green {
            background-color: green;
        }
    </style>
</head>

<body style="overflow-x: hidden;">
    <?php if ($tipo == "aluno") : ?>
        <div class="topo_dashboard">
            <div class="topointerior">
                <div class="hide-sidebar">
                    <i style="color: #133d6d;" class="fas fa-angle-right"></i>
                    <input type="checkbox" id="checkbox-sidebar">
                </div>
                <div class="menu-hamburguer">
                    <input type="checkbox" id=checkbox-menu>
                    <label id="labelMenu" for="checkbox-menu">
                        <span class="spanMenu"></span>
                        <span class="spanMenu"></span>
                        <span class="spanMenu"></span>
                    </label>
                    <ul>
                        <a href="<?php echo BASE_URL; ?>">
                            <li>INÍCIO</li>
                        </a>
                        <a href="<?php echo BASE_URL; ?>matricula">
                            <li>MATRÍCULA</li>
                        </a>
                        <a href="<?php echo BASE_URL; ?>album">
                            <li>ÁLBUM</li>
                        </a>
                        <a href="<?php echo BASE_URL; ?>sobre">
                            <li>SOBRE</li>
                        </a>
                        <a href="<?php echo BASE_URL; ?>logout">
                            <li>SAIR</li>
                        </a>
                    </ul>
                </div>
                <div class="menu" style="padding: 0;">
                    <ul>
                        <li>
                            <a href="<?php echo BASE_URL; ?>">INÍCIO</a>
                        </li>
                        <li>
                            <a href="<?php echo BASE_URL; ?>album">ÁLBUM</a>
                        </li>
                        <li>
                            <a href="<?php echo BASE_URL; ?>matricula">MATRÍCULA</a>
                        </li>
                        <li>
                            <a href="<?php echo BASE_URL; ?>sobre">SOBRE</a>
                        </li>
                        <li>
                            <a href="<?php echo BASE_URL; ?>logout">SAIR</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="dashboard">
            <div class="wrapper">
                <div class="sidebar">
                    <div class="sidebar-header"></div>
                    <ul class="sidebar-menu">
                        <li>
                            <a href="<?php echo BASE_URL; ?>portalAluno">
                                <i class="far fa-user"></i>
                                <p>PERFIL</p>
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo BASE_URL; ?>portalAluno/notas">
                                <i class="fas fa-graduation-cap"></i>
                                <p>NOTAS</p>
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo BASE_URL; ?>portalAluno/calendario">
                                <i class="fas fa-calendar"></i>
                                <p>CALENDÁRIO</p>
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo BASE_URL; ?>portalAluno/horarios">
                                <i class="far fa-clock"></i>
                                <p>HORÁRIOS</p>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="view" style="background-color: #f5f5f5;">
                    <?php
                    if (isset($_SESSION['mensagem'])) {
                        echo '<div class="mensagem">' . $_SESSION['mensagem'] . '</div>';
                        unset($_SESSION['mensagem']);
                    }

                    $this->loadViewInTemplate($viewName, $viewData);
                    ?>
                </div>
            </div>
        </div>
    <?php endif; ?>
</body>

</html>
<script src="<?php echo BASE_URL; ?>assets/js/jquery-3.6.1.min.js"></script>
<script src="<?php echo BASE_URL; ?>assets/js/login_aluno.js"></script>
<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
<script src="<?php echo BASE_URL; ?>assets/js/bootstrap-3.3.7/js/bootstrap.js"></script>