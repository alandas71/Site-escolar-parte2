<div style="width: 700px;">
    <div class="header" style="text-align: left; padding-left: 20px; background: none;">
        <form method="post" enctype="multipart/form-data">
            <h1 class="title">Banners</h1>
            <label for="image">Selecione um banner:</label>
            <input type="file" name="image" id="image">
            <input type="submit" name="submitBanner" value="Enviar">
        </form>
        <br>
        <div class="delete">
            <?php
            foreach ($resultadoBanners as $row) : ?>
                <div>
                    <img style="height: 90px; width: 300px;" src="<?php echo BASE_URL ?>assets/images/banners/<?php echo $row['imagem']; ?>">
                    <form method="post">
                        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                        <input type="hidden" name="situacao" value="<?php echo $row['situacao']; ?>">
                        <button type="submit" name="alterar-situacao_banner"><?php echo ($row['situacao'] == 1) ? 'Desativar' : 'Ativar'; ?></button>
                        <input type="submit" name="excluir_banner" value="Excluir" onclick="return confirm('Tem certeza de que deseja remover este banner?')" style="background-color: #B30000;">
                    </form>
                </div>
            <?php endforeach; ?>
        </div>
        <br>
        <br>
        <br>
        <br>
        <form method="post" enctype="multipart/form-data">
            <h1 class="title">Nossa equipe</h1>
            <input type="text" name="nome" placeholder="Nome ">
            <label for="nome"></label>
            <input type="text" name="info" placeholder="ex: Grupo 1 e 2">
            <label for="info"></label>
            <label for="image">Selecione uma foto:</label>
            <input type="file" name="image" id="image">
            <input type="submit" name="submitProf" value="Enviar">
        </form>
        <br>
        <div class="delete">
            <?php foreach ($resultadoProf as $row) : ?>
                <div>
                    <img class="radiusProfa" style="height: 100px; width: 100px;" src="<?php echo BASE_URL ?>assets/images/professores/<?php echo $row['face']; ?>">
                    <form method="post">
                        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                        <input type="hidden" name="situacao" value="<?php echo $row['situacao']; ?>">
                        <button type="submit" name="alterar-situacao_prof"><?php echo ($row['situacao'] == 1) ? 'Desativar' : 'Ativar'; ?></button>
                        <input type="submit" name="excluir_prof" value="Excluir" onclick="return confirm('Tem certeza de que deseja remover essa professora?')" style="background-color: #B30000;">
                    </form>
                </div>
            <?php endforeach; ?>
        </div>
        <br>
        <br>
        <form method="post" enctype="multipart/form-data">
            <h1 class="title">Depoimentos</h1>
            <label for="image">Selecione um depoimento:</label>
            <input type="file" name="image" id="image">
            <input type="submit" name="submitDepoimentos" value="Enviar">
        </form>
        <br>
        <div class="delete">
            <?php foreach ($resultadoDepoimentos as $row) : ?>
                <div>
                    <img style="height: 100px; width: 125px;" src="../assets/images/depoimentos/<?php echo $row['depoimento']; ?>">
                    <form method="post">
                        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                        <input type="hidden" name="situacao" value="<?php echo $row['situacao']; ?>">
                        <button type="submit" name="alterar-situacao_depoimentos"><?php echo ($row['situacao'] == 1) ? 'Desativar' : 'Ativar'; ?></button>
                        <input type="submit" name="excluir_depoimentos" value="Excluir" onclick="return confirm('Tem certeza de que deseja remover este depoimento?')" style="background-color: #B30000;">
                    </form>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>
<br>
<footer style="margin-top: 50px; padding: 0; width: 100%; height: 100px; text-align:center;">
    <p>&copy; 2023 Centro Educar Arco-íris</p>
</footer>