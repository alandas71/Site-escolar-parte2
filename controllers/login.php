<?php
include_once('config_recaptcha.php');
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script type="text/javascript" src="../assets/js/jquery-3.6.1.min.js"></script>
    <script type="text/javascript" src="../assets/js/login.js"></script>
    <script src="../assets/js/submenu_login.js" defer></script>
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
                    <a href="./">
                        <li>INÍCIO</li>
                    </a>
                    <hr>
                    <a href="matricula.php">
                        <li>MATRÍCULA</li>
                    </a>
                    <hr>
                    <a href="#" class="login-menu">
                        <li>LOGIN <i class="fas fa-caret-down"></i></li>
                    </a>
                    <div class="sub-menu">
                        <br>
                        <a href="#" class="aluno-login" style="font-size:18px;">ALUNO</a>
                        <br><br>
                        <a href="#" class="professor-login" style="font-size:18px;">PROFESSOR</a>
                        <br><br>
                        <a href="#" class="diretor-login" style="font-size:18px;">DIREÇÃO</a>
                        <br><br>
                    </div>
                    <hr>
                    <a href="album.php">
                        <li>ÁLBUM</li>
                    </a>
                    <hr>
                    <a href="sobre.php">
                        <li>SOBRE</li>
                    </a>
                </ul>
            </div>
            <a href="../">
                <img class="logotopo" src="../assets\images\iconetopo.png" title="Ir para início" width="74 px"></a>
            <div class="menu" style="padding: 0;">
                <ul>
                    <li>
                        <a href="../">INÍCIO</a>
                    </li>
                    <li data-submenu>
                        <a href="#">LOGIN</a>
                        <ul class="submenu">
                            <li><a href="portal_aluno.php">ALUNO</a></li>
                            <li><a href="portal_prof.php">PROFESSOR</a></li>
                            <li><a href="dashboard.php?view=dashboard">DIREÇÃO</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="album.php">ÁLBUM</a>
                    </li>
                    <li>
                        <a href="matricula.php">MATRÍCULA</a>
                    </li>
                    <li>
                        <a href="sobre.php">SOBRE</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="bordertopo"></div>




    <div class="header">
        <div class="login-container">
            <div class="telalogin">
                <div id="mensagem"></div>
                <h1>DIREÇÃO</h1>
                <form id="formularioLogin">
                    <input class=inputlogin name="email" type="email" placeholder="Email" id="email">
                    <br><br>
                    <input class=inputlogin name="senha" type="password" placeholder="Senha" id="senha">
                    <br><br>
                    <div class="g-recaptcha" data-sitekey="<?php echo SITE_KEY; ?>"></div>
                    <br>
                    <button class=loginbtn id="btnLogin">Entrar</button>
                </form>
            </div>
        </div>




        <svg class="waves" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 24 150 28" preserveAspectRatio="none" shape-rendering="auto">
            <defs>
                <path id="gentle-wave" d="M-160 44c30 0 58-18 88-18s 58 18 88 18 58-18 88-18 58 18 88 18 v44h-352z" />
            </defs>
            <g class="parallax">
                <use xlink:href="#gentle-wave" x="48" y="0" fill="rgba(255,255,255,0.7" />
                <use xlink:href="#gentle-wave" x="48" y="3" fill="rgba(255,255,255,0.5)" />
                <use xlink:href="#gentle-wave" x="48" y="5" fill="rgba(255,255,255,0.3)" />
                <use xlink:href="#gentle-wave" x="48" y="7" fill="#fff" />
            </g>
        </svg>
    </div>
    <footer class="main-footer">
        <div class="center" id="insta"><a href="https://instagram.com/centroeduc.arcoiris?igshid=YmMyMTA2M2Y=" target="_blank"><img src="../assets/images/insta.png" width="30px" height="30px" />
            </a></div>
        <div class="center" id="whats"><a href="https://wa.me/557182662374" target="_blank"><img src="../assets/images/whats.png" width="30px" height="30px" />
            </a></div>
    </footer>
    <script>
        $(document).ready(function() {
            $('.aluno-login').click(function() {
                window.location.href = 'login_aluno.php';
            });

            $('.professor-login').click(function() {
                window.location.href = 'login_prof.php';
            });

            $('.diretor-login').click(function() {
                window.location.href = 'login.php';
            });

            $('.login-menu').click(function() {
                $('.sub-menu').toggle();
                if ($('.sub-menu').is(':visible')) {
                    $('.login-menu i').removeClass('fa-caret-down').addClass('fa-caret-up');
                } else {
                    $('.login-menu i').removeClass('fa-caret-up').addClass('fa-caret-down');
                }
            });
        });
    </script>
</body>

</html>