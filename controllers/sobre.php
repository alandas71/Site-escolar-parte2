<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ARCO-ÍRIS</title>
    <link rel="stylesheet" href="..\assets\css\style.css" />
    <link rel="stylesheet" href="..\assets\css\tablet.css" />
    <link rel="stylesheet" href="..\assets\css\mobile.css" />
    <link rel="shortcut icon" href="../assets/images/icone.ico" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300&display=swap" rel="stylesheet">
    <script src="../assets/js/submenu_login.js" defer></script>
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
        <div class="header">
            <div class="div1">
                <div class="conteudo-sobre">
                    <p class=sobretext><b>Centro Educar Arco-Íris<b></p>
                    <p class="sobretext">Somos uma escola comprometida em oferecer uma educação inclusiva e de qualidade para todos os nossos alunos. Fundada em 2022,
                        nossa escola tem sido um modelo de excelência em educação.
                    </p>
                    <p class="sobretext"> Nosso currículo é personalizado para atender às necessidades de cada aluno. Nossos educadores incentivam a criatividade,
                        a colaboração e o pensamento crítico em todos os aspectos do aprendizado. Com uma abordagem holística, buscamos não apenas desenvolver habilidades
                        acadêmicas, mas também sociais e emocionais.

                    </p>
                    <p class="sobretext"> No Centro Educar Arco-Íris, nossos alunos têm acesso a aulas informatizadas com slides, jogos digitais e físicos exclusivos feitos
                        pela própria instituição. Acreditamos que o uso da tecnologia pode ser uma ferramenta poderosa para melhorar a aprendizagem, estimulando a interatividade
                        e a imersão nas aulas. Além disso, temos uma brinquedoteca equipada com jogos educativos, televisão e brinquedos para estimular o desenvolvimento cognitivo
                        e social das crianças mais novas. Todas as salas possuem um sistema de climatização eficiente, com ventiladores industriais de alta qualidade, que não apenas
                        garantem a temperatura agradável em dias quentes, mas também proporcionam um visual elegante e moderno ao ambiente.
                    </p>
                    <p class="sobretext">Estamos orgulhosos de ter uma equipe de educadores altamente qualificados e apaixonados. Eles são nossos principais ativos e estão comprometidos
                        em garantir que cada aluno alcance todo o seu potencial.

                    </p>
                    <p class="sobretext"> Estamos comprometidos em fornecer um ambiente acolhedor, seguro e estimulante para todos os nossos alunos. Nossa equipe de profissionais dedicados
                        e apaixonados está sempre trabalhando para garantir que cada aluno alcance todo o seu potencial e tenha a melhor experiência educacional possível no Centro Educar Arco-Íris.
                        Venha nos visitar e conheça nosso espaço!
                    </p>
                    <p class=sobretext><b>Endereço: Rua Santa Filomena, N° 04, São Tomé de Paripe.</b></p>
                    <br>
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
        </div>
        <footer class="main-footer">
            <div class="center" id="insta"><a href="https://instagram.com/centroeduc.arcoiris?igshid=YmMyMTA2M2Y=" target="_blank"><img src="../assets/images/insta.png" width="30px" height="30px" />
                </a></div>
            <div class="center" id="whats"><a href="https://wa.me/557182662374" target="_blank"><img src="../assets/images/whats.png" width="30px" height="30px" />
                </a></div>
        </footer>
        <script src="../assets/js/jquery-3.6.1.min.js"></script>
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