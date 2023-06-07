<?php
if (isset($_SESSION["usuario"]) && is_array($_SESSION["usuario"])) {
    require("app/login/connLogin.php");

    $conexaoClass = new Conexao();
    $conn = $conexaoClass->conectar();

    $adm  = $_SESSION["usuario"][1];
    $nome = $_SESSION["usuario"][0];

    if ($adm != 1) {
        header("Location:" . BASE_URL . "diretor");
        exit();
    }
} else {
    header("Location:" . BASE_URL . "diretor");
    exit();
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Arco-íris</title>
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/css/style.css" />
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/css/tablet.css" />
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/css/mobile.css" />
    <link rel="shortcut icon" href="<?php echo BASE_URL; ?>assets/images/icone.ico" type="image/x-icon">
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="<?php echo BASE_URL; ?>assets/js/sidebar_hide.js" defer></script>
</head>

<body style="overflow-x: hidden;">
    <?php if ($adm) : ?>
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
                            <a href="<?php echo BASE_URL; ?>dashboard" id="menu-dashboard">
                                <i class="fas fa-tachometer-alt"></i>
                                <p data-aos="fade-right">DASHBOARD</p>
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo BASE_URL; ?>dashboard/estudantes">
                                <i class="fas fa-users"></i>
                                <p data-aos="fade-right">ESTUDANTES</p>
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo BASE_URL; ?>dashboard/professores">
                                <i class="fas fa-chalkboard-teacher"></i>
                                <p data-aos="fade-right">PROFESSORES</p>
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo BASE_URL; ?>dashboard/turmas">
                                <i class="fas fa-door-open"></i>
                                <p data-aos="fade-right">TURMAS</p>
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo BASE_URL; ?>dashboard/horarios">
                                <i class="far fa-clock"></i>
                                <p data-aos="fade-right">HORÁRIOS</p>
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo BASE_URL; ?>dashboard/matriculas">
                                <i class="fas fa-clipboard"></i>
                                <p data-aos="fade-right">MATRÍCULAS</p>
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo BASE_URL; ?>dashboard/album">
                                <i class="fas fa-images"></i>
                                <p data-aos="fade-right">ÁLBUM</p>
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo BASE_URL; ?>dashboard/site">
                                <i class="fas fa-globe"></i>
                                <p data-aos="fade-right">SITE</p>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="view">
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
<script src="<?php echo BASE_URL; ?>assets/js/login.js"></script>
<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
<script>
    const fotoInput = document.querySelector('#foto');
    const fotoPreview = document.querySelector('#foto-preview');

    fotoPreview.addEventListener('click', () => {
        fotoInput.click();
    });

    fotoInput.addEventListener('change', () => {
        const file = fotoInput.files[0];
        const reader = new FileReader();
        reader.readAsDataURL(file);
        reader.onload = () => {
            fotoPreview.src = reader.result;
        };
    });
</script>
<script>
    function submitForm() {
        document.forms[0].submit();
    }
</script>