<div style="width: 700px;">
    <h1 class="title">POSTAR HORÁRIOS</h1>
    <br>
    <form method="POST" enctype="multipart/form-data">
        <label for="imagem">Escolha a imagem:</label>
        <input type="file" name="imagem" id="imagem">
        <label for="turma">Turma:</label>
        <select name="turma" id="turma">
            <option selected disabled value="">Selecione</option>
            <?php foreach ($turmas as $turma) : ?>
                <option value="<?php echo $turma; ?>"><?php echo $turma; ?></option>
            <?php endforeach; ?>
        </select>
        <label for="turno">Turno:</label>
        <select name="turno" id="turno">
            <option selected disabled value="">Selecione</option>
            <?php foreach ($turnos as $turno) : ?>
                <option value="<?php echo $turno; ?>"><?php echo $turno; ?></option>
            <?php endforeach; ?>
        </select><br>
        <input type="submit" value="Enviar">
    </form>
</div>
<footer style="margin: 0; padding: 0; width: 100%; height: 100px; text-align:center;">
    <p>&copy; 2023 Centro Educar Arco-íris</p>
</footer>