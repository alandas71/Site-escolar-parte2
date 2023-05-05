<?php
include_once('configImages.php');
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
    <script src="../assets/js/album.js" defer></script>
    <script src="../assets/js/zoom_image.js" defer></script>
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
        <div class="header" style="min-height: 100vh;">
            <?php
            $query_album = "SELECT id, capa, id_album FROM albuns WHERE situacao = 1";
            $result_album = $conn->prepare($query_album);
            $result_album->execute();

            ?>
            <div class="gallery-container2">
                <?php
                while ($row_album = $result_album->fetch(PDO::FETCH_ASSOC)) {
                    extract($row_album);
                    $id_album = str_replace(" ", "", $id_album);
                    $id_album = strtolower($id_album);
                    echo " <div class='title'>";
                    echo "<p class='title'>$id_album</p>";
                    echo "<img onclick=\"openModal('.$id_album')\" src='../assets/images/album/$capa' class='gallery-items2' alt='album'>";
                    echo "</div>";

                    echo "<div class='$id_album modal-container'>";
                    echo " <div class='btns'>";
                    echo "<button class='btnClose btns' onclick=\"closeModal('.$id_album')\">Fechar</button>";
                    echo "</div>";

                    $query_foto = "SELECT id, foto, id_album FROM fotos WHERE situacao = 1 AND id_album = :id_album";
                    $result_foto = $conn->prepare($query_foto);
                    $result_foto->bindValue(':id_album', $id_album, PDO::PARAM_STR);
                    $result_foto->execute();

                    echo "<div class='modal'>";
                    echo "<span>";
                    echo "<main>";
                    echo "<div class='gallery-container'>";

                    while ($row_foto = $result_foto->fetch(PDO::FETCH_ASSOC)) {
                        extract($row_foto);
                        echo "<img class='gallery-items' src='../assets/images/album/fotos/$foto' alt='$id_album'>";
                    }

                    echo "</div>";
                    echo "</main>";
                    echo "</span>";
                    echo "</div>";
                    echo "</div>";
                }

                ?>
            </div>

        </div>
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