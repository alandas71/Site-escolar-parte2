<?php
// Conecta ao banco de dados
include('configImages.php');

// Consulta os valores únicos da coluna "turma"
$stmt = $conn->query('SELECT DISTINCT turma FROM turmas');
$turmas = $stmt->fetchAll(PDO::FETCH_COLUMN);

// Consulta os valores únicos da coluna "turno"
$stmt = $conn->query('SELECT DISTINCT turno FROM turmas');
$turnos = $stmt->fetchAll(PDO::FETCH_COLUMN);
?>

<h1 class="title">POSTAR HORÁRIOS</h1>
<br>
<!-- Exibe o formulário de envio de imagem -->
<form action="add_horario.php" method="POST" enctype="multipart/form-data">
    <label for="imagem">Escolha a imagem:</label>
    <input type="file" name="imagem" id="imagem"><br><br>
    <label for="turma">Turma:</label>
    <select name="turma" id="turma">
        <?php foreach ($turmas as $turma) : ?>
            <option value="<?php echo $turma; ?>"><?php echo $turma; ?></option>
        <?php endforeach; ?>
    </select><br><br>
    <label for="turno">Turno:</label>
    <select name="turno" id="turno">
        <?php foreach ($turnos as $turno) : ?>
            <option value="<?php echo $turno; ?>"><?php echo $turno; ?></option>
        <?php endforeach; ?>
    </select><br><br>
    <input type="submit" value="Enviar">
</form>