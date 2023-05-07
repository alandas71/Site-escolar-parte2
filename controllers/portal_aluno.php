<?php
session_start();

if (isset($_SESSION["usuario"]) && is_array($_SESSION["usuario"])) {
    require("connLogin.php");

    $conexaoClass = new Conexao();
    $conn = $conexaoClass->conectar();

    $turma2 = $_SESSION["usuario"][4];
    $turma1 = $_SESSION["usuario"][3];
    $id = $_SESSION["usuario"][2];
    $tipo = $_SESSION["usuario"][1];
    $nome = $_SESSION["usuario"][0];

    if ($tipo !== "aluno") {
        // Redireciona para página de login se não for aluno
        header("Location: login_aluno.php");
        exit();
    }
} else {

    // Redireciona para página de login se não estiver logado
    header("Location: login_aluno.php");
    exit();
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
    <link rel="shortcut icon" href="../assets/images/icone.ico" type="image/x-icon">
    <script src="../assets/js/sidebar_hide.js" defer></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.3.1/jspdf.umd.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" crossorigin="anonymous" referrerpolicy="no-referrer" />
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
                        <a href="../">
                            <li>INÍCIO</li>
                        </a>
                        <a href="matricula.php">
                            <li>MATRÍCULA</li>
                        </a>
                        <a href="album.php">
                            <li>ÁLBUM</li>
                        </a>
                        <a href="sobre.php">
                            <li>SOBRE</li>
                        </a>
                        <a href="logout.php">
                            <li>SAIR</li>
                        </a>
                    </ul>
                </div>
                <div class="menu" style="padding: 0;">
                    <ul>
                        <li>
                            <a href="../">INÍCIO</a>
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
                        <li>
                            <a href="logout.php">SAIR</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="dashboard">
            <div class="wrapper">
                <div class="sidebar">
                    <h1>Centro Educar Arco-íris</h1>
                    <div class="sidebar-header"></div>
                    <ul class="sidebar-menu">
                        <form action="foto_cliente_aluno.php" method="post" enctype="multipart/form-data" id="myForm">
                            <div class='img_dashboard'>
                                <label for="foto"></label>
                                <input type="file" id="foto" name="foto" accept="image/*" style="display: none" onchange="submitForm()">
                                <?php

                                // Busca o caminho da imagem na tabela "users"
                                $stmt = $conn->prepare("SELECT foto FROM users WHERE id = ?");
                                $stmt->execute(array($id)); // alteração aqui
                                $row = $stmt->fetch(PDO::FETCH_ASSOC);
                                $caminho_imagem = $row['foto'];
                                ?>
                                <img class='client_foto' src='<?php echo isset($caminho_imagem) ? $caminho_imagem : '../assets/images/user.jpg' ?>' width='100px' height='100px' id='foto-preview'>
                            </div>
                            <input type="hidden" id="cropped-image" name="cropped-image">
                        </form>
                        <p class='img_dashboard'><?php echo $nome ?></p>
                        <hr>
                        <br>
                        <li>
                            <a href="portal_aluno.php?view=horario">
                                <i class="far fa-clock"></i>
                                <p>HORÁRIOS</p>
                            </a>
                        </li>
                        <li>
                            <a href="portal_aluno.php?view=notas">
                                <i class="fas fa-graduation-cap"></i>
                                <p>NOTAS</p>
                            </a>
                        </li>
                        <li>
                            <a href="portal_aluno.php?view=calendario">
                                <i class="fas fa-calendar"></i>
                                <p>CALENDÁRIO</p>
                            </a>
                        </li>
                        <hr>
                        <br>
                        <li>
                            <a href="#">
                                <i class="fas fa-credit-card"></i>
                                <p>FINANCEIRO</p>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="view">
                    <?php
                    if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["view"])) {
                        $view = $_GET["view"];
                        switch ($view) {
                            case "horario":
                                include('horario.php');
                                break;
                            case "notas":
                                include('boletim_view.php');
                                break;
                            case "calendario":
                                include('agendaView-item.php');
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
<script src="../assets/js/login_aluno.js"></script>
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