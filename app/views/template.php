<?php include('app/login/config_recaptcha.php'); ?>
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
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script type="text/javascript" src="<?php echo BASE_URL; ?>assets/js/jquery-3.6.1.min.js"></script>
    <script type="text/javascript" src="<?php echo BASE_URL; ?>assets/js/login_aluno.js"></script>
    <script type="text/javascript" src="<?php echo BASE_URL; ?>assets/js/login_prof.js"></script>
    <script type="text/javascript" src="<?php echo BASE_URL; ?>assets/js/login.js"></script>
    <script src="<?php echo BASE_URL; ?>assets/js/album.js" defer></script>
    <script src="<?php echo BASE_URL; ?>assets/js/zoom_image.js" defer></script>
    <script src="<?php echo BASE_URL; ?>assets/js/submenu_login.js" defer></script>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
</head>

<body>
    <div class="topo">
        <div class="topointerior">
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
                    <hr>
                    <a href="<?php echo BASE_URL; ?>matricula">
                        <li>MATRÍCULA</li>
                    </a>
                    <hr>
                    <a href="#" class="login-menu">
                        <li>LOGIN <i class="fas fa-caret-down"></i></li>
                    </a>
                    <div class="sub-menu">
                        <br>
                        <a href="<?php echo BASE_URL; ?>aluno" class="aluno-login" style="font-size:18px;">ALUNO</a>
                        <br><br>
                        <a href="<?php echo BASE_URL; ?>professor" class="professor-login" style="font-size:18px;">PROFESSOR</a>
                        <br><br>
                        <a href="<?php echo BASE_URL; ?>dashboard" class="diretor-login" style="font-size:18px;">DIREÇÃO</a>
                        <br><br>
                    </div>
                    <hr>
                    <a href="<?php echo BASE_URL; ?>album">
                        <li>ÁLBUM</li>
                    </a>
                    <hr>
                    <a href="<?php echo BASE_URL; ?>sobre">
                        <li>SOBRE</li>
                    </a>
                </ul>
            </div>
            <div class="menu-section">
                <div class="menu-toggle">
                    <div class="one"></div>
                    <div class="two"></div>
                    <div class="tree"></div>
                </div>
            </div>

            <a href="<?php echo BASE_URL; ?>">
                <img class="logotopo" src="<?php echo BASE_URL; ?>assets\images\iconetopo.png" title="Ir para início" width="74 px"></a>
            <div class="menu" style="padding: 0;">
                <ul>
                    <li>
                        <a href="<?php echo BASE_URL; ?>">INÍCIO</a>
                    </li>
                    <li data-submenu>
                        <a href="#">LOGIN</a>
                        <ul class="submenu">
                            <li><a href="<?php echo BASE_URL; ?>aluno">ALUNO</a></li>
                            <li><a href="<?php echo BASE_URL; ?>professor">PROFESSOR</a></li>
                            <li><a href="<?php echo BASE_URL; ?>dashboard">DIREÇÃO</a></li>
                        </ul>
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
                </ul>
            </div>
        </div>
    </div>

    <?php $this->loadViewInTemplate($viewName, $viewData); ?>