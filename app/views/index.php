<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Arco-íris</title>
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>assets\css\style.css" />
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>assets\css\tablet.css" />
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>assets\css\mobile.css" />
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>assets\css\owl.carousel.css" />
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>assets\css\owl.carousel.default.css" />
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="shortcut icon" href="assets/images/icone.ico" type="image/x-icon">
    <script src="<?php echo BASE_URL; ?>assets/js/script1.js" defer></script>
    <script src="<?php echo BASE_URL; ?>assets/js/submenu_login.js" defer></script>
</head>

<body>
    <div class="topoHome">
        <div class="topointerior">
            <div class="icones">
                <a href="https://wa.me/557182662374" target="_blank"><i class="fab fa-whatsapp"></i></a>
                <a href="https://instagram.com/centroeduc.arcoiris?igshid=YmMyMTA2M2Y=" target="_blank"><i class="fab fa-instagram"></i></a>
                <a href="mailto:centroeducacionalarcoiris2021@gmail.com" target="_blank"><i class="fas fa-envelope"></i></a>
            </div>
            <div class="menu-hamburguer">
                <input type="checkbox" id=checkbox-menu>
                <label id="labelMenu" for="checkbox-menu">
                    <span class="spanMenu"></span>
                    <span class="spanMenu"></span>
                    <span class="spanMenu"></span>
                </label>
                <ul>
                    <a href="<?php echo BASE_URL; ?>index">
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

            <img class="bodyLogo" data-aos="fade-right" src="<?php echo BASE_URL; ?>assets\images\bodyLogo.png">
            <img class="sunLogo" data-aos="fade-right" data-aos-delay="1000" src="<?php echo BASE_URL; ?>assets\images\sunLogo.png"></a>
            <img class="textLogo" data-aos="fade-right" data-aos-delay="1600" src="<?php echo BASE_URL; ?>assets\images\logoText.png"></a>
            <div class="menu">
                <ul>
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

    <div class="slider-container">
        <div class="slid">
            <div class="owl-carousel">
                <?php
                foreach ($imagem as $slide) {
                    $imagem = $slide['imagem'];
                ?>
                    <img src="<?php echo BASE_URL; ?>assets/images/banners/<?php echo $imagem; ?>">
                <?php
                }
                ?>
            </div>
        </div>
    </div>
    </div>
    <div id="wallpaper4">
        <div class="flutuante">
            <i class="fa fa-star"></i>
        </div>
        <div class="flutuante2">
            <i class="fa fa-heart"></i>
        </div>
        <div class="container5">
            <img class="imgRowBelow" src="<?php echo BASE_URL; ?>assets/images/abc21.jpg" />
            <div class="rowHome">
                <img class="imgRow" src="<?php echo BASE_URL; ?>assets/images/abc13.jpg" />
            </div>
            <div class="rowHome textRow">
                <h1 class="rowTitle">Centro Educar Arco-íris</h1>
                <p class=mural>
                    O Centro Educar Arco-íris foi fundado em 2022 pela psicopedagoga Luciane, uma educadora apaixonada
                    pelo ensino e comprometida em oferecer uma educação de qualidade para as crianças de sua comunidade. Ela queria criar uma escola que valorizasse a
                    individualidade de cada aluno, ajudando-os a descobrir seus talentos e habilidades
                    únicas.
                </p>
                <p class=mural>
                    A escola cresceu rapidamente e é reconhecida por sua excelência acadêmica
                    e preocupação com o bem-estar emocional e social de seus alunos. Luciane continua
                    liderando a escola, com projetos para expansão, buscando sempre novas maneiras
                    de melhorar a experiência de aprendizagem das suas crianças e tornar o Arco-íris
                    uma escola ainda mais inclusiva e acolhedora.
                </p>
            </div>
        </div>
    </div>
    <div id=wallpaper1>
        <div class=container>
            <div id='bloco1' data-aos="fade-right">
                <img src="<?php echo BASE_URL; ?>assets/images/bloco1.png" class="imgbloco">
                <h1><b>EDUCAÇÃO TECNOLÓGICA</b></h1>
                <p class="mural">
                    A tecnologia é uma grande aliada no processo de aprendizagem. Nossas crianças
                    contam com aulas em slide, vídeos, aplicativos e jogos educacionais, pois eles
                    incentivam a participação dos alunos nas atividades propostas.
                </p>
            </div>
            <hr>
            <div id=bloco2 data-aos="fade-right">
                <img src="<?php echo BASE_URL; ?>assets/images/bloco2.png" class="imgbloco">
                <h1><b>AULAS DE BALLET</b></h1>
                <p class="mural"> O ballet auxilia na concentração, postura e ritmo, que são importantes para
                    muitas outras atividades, pois combina atividades físicas com musicalidade,
                    flexibilidade, coordenação motora e um pouco de teatro.
                </p>
            </div>
            <hr>
        </div>
        <div class=container2>
            <div id="bloco3" data-aos="fade-right">
                <img src="<?php echo BASE_URL; ?>assets/images/bloco3.png" class="imgbloco">
                <h1><b>BRINQUEDOTECA</b></h1>
                <p class="mural">
                    O brincar tem influência no desenvolvimento das crianças, através do “faz de conta”,
                    a criança explora e reflete sobre a realidade e a cultura na qual está inserida.
                    Brincar é uma maneira segura que a criança tem para encenar seus medos e suas
                    angustias e tentar supera-las.
                </p>
            </div>
            <hr>
            <div id="bloco4" data-aos="fade-right">
                <img src="<?php echo BASE_URL; ?>assets/images/bloco4.png" class="imgbloco">
                <h1><b>AULAS DINÂMICAS</b></h1>
                <p class="mural"> Promover uma educação de qualidade é essêncial para que os alunos tenham prazer em aprender,
                    pensando nisso trabalhamos com atividades lúdicas, onde as crianças aprendem brincando.
                </p>
            </div>
        </div>
    </div>
    <div class="container4">
        <h1 class="title">NOSSA EQUIPE</h1>
        <div class="sobre1">
            <?php foreach ($prof as $professores) : ?>
                <div class='profa'>
                    <img class='radiusProfa' src='<?php echo BASE_URL; ?>assets/images/professores/<?php echo $professores['face']; ?>' width='150px' height='150px' />
                    <br>
                    <h1><?php echo $professores['nome']; ?></h1>
                    <p class='sobreprof'><?php echo $professores['info']; ?></p>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
    <div id="wallpaper2">
        <i class="flutuantes fa fa-fish"></i>
        <i class="flutuantes2 fa fa-fish"></i>
        <div class="container3" data-aos="fade-up">
            <div class="album">
                <h1 class="title">DEPOIMENTOS</h1>
                <br>
                <div class="w3-content w3-display-container">
                    <?php
                    foreach ($depoimentos as $depoimento) {
                        $depoimento = $depoimento['depoimento'];
                    ?>
                        <img class='mySlides' src="<?php echo BASE_URL; ?>assets/images/depoimentos/<?php echo $depoimento; ?>" style='width:100%'>
                    <?php
                    }
                    ?>
                    <button class="w3-button w3-display-left" onclick="plusDivs(-1)">&#10094;</button>
                    <button class="w3-button w3-display-right" onclick="plusDivs(1)">&#10095;</button>
                </div>
            </div>
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
    <footer class="main-footer">
        <div class="contact-container">
            <h3>Contato</h3>
            <ul>
                <li>Endereço: Rua Santa Filomena, N° 04, São Tomé de Paripe</li>
                <li>Telefone: (71) 98266-2374</li>
                <li>E-mail: <br>centroeducacionalarcoiris2021<br>@gmail.com</li>
            </ul>
        </div>
        <div class="links-container">
            <h1>LOCALIZAÇÃO</h1>
            <div class="container-map"><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d420.
                903186875285!2d-38.47927497791088!3d-12.821739913311044!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.
                1!3m3!1m2!1s0x71613a1ae99de1b%3A0xe7178b7fff4303f!2sCentro%20Educar%20Arco-%C3%8Dris!5e0!3m2!1spt-BR!2sbr!4v1677480753527!5m2!1spt-BR!2sbr
                " class="map" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
        <div class="image-container">
            <h3>Parceria:</h3>
            <div>
                <a href="https://wa.me/557194116610" target="_blank">
                    <img src="<?php echo BASE_URL; ?>assets/images/rifabot.jpg" alt="Rifa bot" style="width: 100px;">
                </a>
            </div>
            <p style="text-align:justify; display: block;">Imagine só: você cria um grupo no WhatsApp para a sua
                rifa e adiciona o RIFA BOT como um dos membros. Em seguida, basta enviar algumas mensagens
                simples para configurar as regras da rifa e pronto! O RIFA BOT vai cuidar de tudo para você,
                você economiza tempo e dinheiro, além de garantir que sua rifa seja justa e transparente.
                Você nunca mais precisará se preocupar em organizar manualmente as suas rifas.
            </p>
        </div>
        <div style="position:inherit; bottom:0;" class="copyright">
            <p>&copy; 2023 Centro Educar Arco-íris. Todos os direitos reservados.</p>
        </div>
    </footer>
    </div>
    <script src="<?php echo BASE_URL; ?>assets/js/jquery-3.6.1.min.js"></script>
    <script src="<?php echo BASE_URL; ?>assets/js/owl.carousel.min.js"></script>
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        $(document).ready(function() {
            $('.aluno-login').click(function() {
                window.location.href = 'controllers/login_aluno.php';
            });

            $('.professor-login').click(function() {
                window.location.href = 'controllers/login_prof.php';
            });

            $('.diretor-login').click(function() {
                window.location.href = 'controllers/login.php';
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
    <script>
        AOS.init({
            duration: 1000,
        });
    </script>
</body>

</html>