<div class="formularios">
    <h1 class="title">Criar álbum</h1>
    <br>
    <form method="POST" enctype="multipart/form-data">
        <label for="nome_album">Nome do Álbum:</label>
        <input type="text" id="nome_album" name="nome_album" required>

        <label for="capa_album">Capa do Álbum:</label>
        <input type="file" id="capa_album" name="capa_album" required>

        <input type="submit" name="criar_album" value="Criar Álbum" style="text-align:center;">
    </form>
    <br>
    <h1 class="title">Adicionar foto</h1>
    <form method="post" enctype="multipart/form-data">
        <select name="id_album" required>
            <option selected disabled value=''>Selecione o álbum</option>
            <?php foreach ($albuns as $row_album) {
                list("id_album" => $id_album) = $row_album;
                $id_album = strtolower(str_replace(" ", "", $id_album));
                ini_set('upload_max_filesize', '100M');
                ini_set('post_max_size', '100M');
                echo "<option value='$id_album'>$id_album</option>";
            } ?>
        </select>
        <input type="hidden" name="nova_foto">
        <input type="file" name="nova_foto[]" multiple>
        <button type="submit">Enviar</button>
    </form>
    <br>
    <h1 class="title">Excluir álbum</h1>
    <br>
    <form method="post">
        <select name="id_album" required>
            <option selected disabled value=''>Selecione o álbum</option>
            <?php foreach ($albuns as $row_album) {
                $id_album = $row_album["id_album"];
                $id_album_lower = strtolower(str_replace(" ", "", $id_album));
                echo "<option value='$id_album_lower'>$id_album</option>";
            } ?>
        </select>
        <input type="submit" name="excluir_album" value="Excluir álbum" onclick="return confirm('Tem certeza de que deseja excluir esse album?')">
    </form>
    <br>
    <h1 class="title">Excluir fotos</h1>
    <div class="deleteft">
        <form method="post">
            <select id="album" name="id_album" required>
                <option selected disabled value="">Escolha um álbum</option>
                <?php
                foreach ($albuns as $row_album) {
                    $id_album = $row_album['id_album'];
                    echo "<option value='$id_album'>$id_album</option>";
                }
                ?>
            </select>
            <input type="submit" name="excluir_fotos" value="Excluir fotos" onclick="return confirm('Tem certeza de que deseja excluir todas as fotos desse álbum?')">
        </form>
    </div>
</div>
<br>
<footer style="margin-top: 50px; padding: 0; width: 100%; height: 100px; text-align:center;">
    <p>&copy; 2023 Centro Educar Arco-íris</p>
</footer>