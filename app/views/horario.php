<?php foreach ($horario as $linha) : ?>
    <div style='text-align: center;'>
        <h2>Horário da Turma <?php echo $linha['turma']; ?></h2>
        </h2>
        <img style='width: 50vw;' src='<?php echo BASE_URL ?>assets/images/horarios/<?php echo $linha['horario']; ?>'>
    </div>
<?php endforeach; ?>