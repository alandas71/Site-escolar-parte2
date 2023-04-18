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
            <a href="../">
                <img class="logotopo" src="../assets\images\iconetopo.png" title="Ir para início" width="74 px"></a>
            <div class="menu">
                <ul>
                    <a href="sobre.php">
                        <li style="background-color: #FFD700;">SOBRE</li>
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
        <div class="header">
            <div class="div1">
                <div class="conteudo-sobre">
                    <p class=sobretext><b>Centro Educar Arco-Íris<b></p>
                    <h1 class="sobretext"> Focado em ensino de qualidade, com educação baseadas nos valores cristãos
                        sem perder de vista o desenvolvimento humano de nossos estudantes. A ludicidade é o nosso
                        diferencial, através do lúdico a criança desenvolve melhor suas habilidades cognitivas,
                        sociais e psicomotoras. Viemos com a metodologia Paulo Freiriana, trazendo os educadores
                        como facilitadores de aprendizagem, estimulando os diferentes saberes: analisar, pesquisar,
                        sintetizar e comparar.
                    </h1>
                    <p class=sobretext><b>Endereço: Rua Santa Filomena, N° 04, São Tomé de Paripe.</b></p>
                    <br>
                </div>
                <h1 class=titulo>Nossa equipe</h1>
                <div class="sobre1">
                    <div id="prof1"><img src="../assets/images/errorimg2.png" width="150px" height="150px" />
                        <h1>Janaina Santos</h1>
                        <h1 class=sobreprof>Grupo 2 e 3</h1>
                    </div>
                    <div id="prof2"><img src="../assets/images/errorimg2.png" width="150px" height="150px" />
                        <h1>Viviane Andrade</h1>
                        <h1 class=sobreprof>Grupo 4</h1>
                    </div>
                </div>
                <div class="sobre1">
                    <div id="prof3"><img src="../assets/images/errorimg2.png" width="150px" height="150px" />
                        <br>
                        <h1>Luciane Alves</h1>
                        <h1 class=sobreprof>Grupo 5 e 1° ano
                        </h1>
                    </div>
                    <div id="prof4"><img src="../assets/images/errorimg2.png" width="150px" height="150px" />
                        <h1>Deise</h1>
                        <h1 class=sobreprof>Auxiliar de classes</h1>
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
        </div>
        <footer class="main-footer">
            <div class="center" id="insta"><a href="https://instagram.com/centroeduc.arcoiris?igshid=YmMyMTA2M2Y=" target="_blank"><img src="../assets/images/insta.png" width="30px" height="30px" />
                </a></div>
            <div class="center" id="whats"><a href="https://wa.me/557182662374" target="_blank"><img src="../assets/images/whats.png" width="30px" height="30px" />
                </a></div>
        </footer>
</body>

</html>