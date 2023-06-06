<form method="post" action="<?php echo BASE_URL; ?>portalProf/notas/<?php echo $nome['id']; ?>" class="aluno-form">
    <h1><?php echo $nome['nome']; ?></h1>
    <table>
        <thead>
            <tr>
                <th>Matéria</th>
                <th colspan="2">1° unidade</th>
                <th colspan="2">2° unidade</th>
                <th colspan="2">3° unidade</th>
                <th colspan="2">4° unidade</th>
                <th>Média</th>
                <th>Faltas</th>
                <th>Resultado final</th>
            </tr>
        </thead>
        <thead>
            <tr>
                <th></th>
                <th>Nota</th>
                <th>Falta</th>
                <th>Nota</th>
                <th>Falta</th>
                <th>Nota</th>
                <th>Falta</th>
                <th>Nota</th>
                <th>Falta</th>
                <th></th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($notas_materias as $materia) : ?>
                <tr>
                    <td><?php echo $materia['nome']; ?></td>
                    <td><input type="text" autocomplete="off" pattern="[0-9]+([,\.][0-9]+)?" value="<?php echo $materia['nota1'] ?? ''; ?>" name="<?php echo $materia['nome']; ?>_nota1" style="width:60px;"></td>
                    <td><input type="text" autocomplete="off" pattern="[0-9]+([,\.][0-9]+)?" value="<?php echo $materia['falta1'] ?? ''; ?>" name="<?php echo $materia['nome']; ?>_falta1" style="width:60px;"></td>
                    <td><input type="text" autocomplete="off" pattern="[0-9]+([,\.][0-9]+)?" value="<?php echo $materia['nota2'] ?? ''; ?>" name="<?php echo $materia['nome']; ?>_nota2" style="width:60px;"></td>
                    <td><input type="text" autocomplete="off" pattern="[0-9]+([,\.][0-9]+)?" value="<?php echo $materia['falta2'] ?? ''; ?>" name="<?php echo $materia['nome']; ?>_falta2" style="width:60px;"></td>
                    <td><input type="text" autocomplete="off" pattern="[0-9]+([,\.][0-9]+)?" value="<?php echo $materia['nota3'] ?? ''; ?>" name="<?php echo $materia['nome']; ?>_nota3" style="width:60px;"></td>
                    <td><input type="text" autocomplete="off" pattern="[0-9]+([,\.][0-9]+)?" value="<?php echo $materia['falta3'] ?? ''; ?>" name="<?php echo $materia['nome']; ?>_falta3" style="width:60px;"></td>
                    <td><input type="text" autocomplete="off" pattern="[0-9]+([,\.][0-9]+)?" value="<?php echo $materia['nota4'] ?? ''; ?>" name="<?php echo $materia['nome']; ?>_nota4" style="width:60px;"></td>
                    <td><input type="text" autocomplete="off" pattern="[0-9]+([,\.][0-9]+)?" value="<?php echo $materia['falta4'] ?? ''; ?>" name="<?php echo $materia['nome']; ?>_falta4" style="width:60px;"></td>
                    <td style="width:60px;"><?php echo $materia['media']; ?></td>
                    <td style="width:60px;"><?php echo $materia['faltas']; ?></td>
                    <td style="width:60px;"><?php echo $materia['resultado']; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <br>
    <input type="hidden" name="id_aluno" value="<?= $id_aluno ?>">
    <button type="submit">Salvar</button>
</form>