        <div class="header" style="min-height: 100vh;">
            <div class="gallery-container2">
                <?php
                foreach ($albuns as $album) {
                    $id_album = str_replace(" ", "", $album['id_album']);
                    $id_album = strtolower($id_album);
                    $capa = $album['capa'];
                ?>
                    <div class='title'>
                        <p class='title'><?php echo $id_album; ?></p>
                        <img onclick="openModal('.<?php echo $id_album; ?>')" src='assets/images/album/<?php echo $capa; ?>' class='gallery-items2' alt='album'>
                    </div>
                    <div class='<?php echo $id_album; ?> modal-containerr'>
                        <div class='btns'>
                            <button class='btnClose btns' onclick="closeModal('.<?php echo $id_album; ?>')">Fechar</button>
                        </div>
                        <div class='modall'>
                            <span>
                                <main>
                                    <div class='gallery-container'>
                                        <?php
                                        $fotos = $albumModel->getFotos($album['id_album']);
                                        foreach ($fotos as $foto) {
                                            echo "<img class='gallery-items' src='assets/images/album/fotos/{$foto['foto']}' alt='{$id_album}'>";
                                        }
                                        ?>
                                    </div>
                                </main>
                            </span>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
        <script src="assets/js/jquery-3.6.1.min.js"></script>
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