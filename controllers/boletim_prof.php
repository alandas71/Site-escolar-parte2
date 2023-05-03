<?php
if (isset($_GET["id_aluno"])) {
    $id_aluno = $_GET["id_aluno"];
}

include('configServer.php');

$query = "SELECT materia, nota1, nota2, nota3, nota4, falta1, falta2, falta3, falta4, faltas, media, resultado FROM notas WHERE id_aluno = $id_aluno";
$result = mysqli_query($conn, $query);

$notas_materias = [
    ['nome' => 'Matemática', 'nota1' => '', 'falta1' => '', 'nota2' => '', 'falta2' => '', 'nota3' => '', 'falta3' => '', 'nota4' => '', 'falta4' => ''],
    ['nome' => 'Português', 'nota1' => '', 'falta1' => '', 'nota2' => '', 'falta2' => '', 'nota3' => '', 'falta3' => '', 'nota4' => '', 'falta4' => ''],
    ['nome' => 'História', 'nota1' => '', 'falta1' => '', 'nota2' => '', 'falta2' => '', 'nota3' => '', 'falta3' => '', 'nota4' => '', 'falta4' => ''],
    ['nome' => 'Ciências', 'nota1' => '', 'falta1' => '', 'nota2' => '', 'falta2' => '', 'nota3' => '', 'falta3' => '', 'nota4' => '', 'falta4' => ''],
    ['nome' => 'Geografia', 'nota1' => '', 'falta1' => '', 'nota2' => '', 'falta2' => '', 'nota3' => '', 'falta3' => '', 'nota4' => '', 'falta4' => ''],
    ['nome' => 'Artes', 'nota1' => '', 'falta1' => '', 'nota2' => '', 'falta2' => '', 'nota3' => '', 'falta3' => '', 'nota4' => '', 'falta4' => ''],
    ['nome' => 'Inglês', 'nota1' => '', 'falta1' => '', 'nota2' => '', 'falta2' => '', 'nota3' => '', 'falta3' => '', 'nota4' => '', 'falta4' => ''],
];

while ($row = mysqli_fetch_assoc($result)) {
    $materia = $row['materia'];
    $nota1 = $row['nota1'];
    $nota2 = $row['nota2'];
    $nota3 = $row['nota3'];
    $nota4 = $row['nota4'];
    $falta1 = $row['falta1'];
    $falta2 = $row['falta2'];
    $falta3 = $row['falta3'];
    $falta4 = $row['falta4'];
    $faltas = $row['faltas'];
    $media = $row['media'];

    foreach ($notas_materias as &$materia_atual) {
        if ($materia_atual['nome'] == $materia) {
            $materia_atual['nota1'] = $nota1;
            $materia_atual['nota2'] = $nota2;
            $materia_atual['nota3'] = $nota3;
            $materia_atual['nota4'] = $nota4;
            $materia_atual['falta1'] = $falta1;
            $materia_atual['falta2'] = $falta2;
            $materia_atual['falta3'] = $falta3;
            $materia_atual['falta4'] = $falta4;
            break;
        }
    }
}

?>

<script>
    // recupera o id_aluno do localStorage
    var id_aluno = localStorage.getItem('id_aluno');
    // atribui o valor do ID do aluno ao input
    $('input[name="id_aluno"]').val(id_aluno);
</script>

<script>
    // Seleciona todos os elementos com o atributo placeholder
    var placeholders = document.querySelectorAll('[placeholder]');

    // Para cada elemento, define o valor do campo de entrada com o valor do placeholder
    placeholders.forEach((placeholder) => {
        const input = placeholder.parentElement.querySelector('input, textarea, select');
        input.value = placeholder.getAttribute('placeholder');
    });
</script>

<form method="post" action="salvar_boletim.php?id_aluno={$aluno['id']" class="aluno-form">

    <table>
        <thead>
            <tr>
                <th>Matéria</th>
                <th colspan="2">1° unidade</th>
                <th colspan="2">2° unidade</th>
                <th colspan="2">3° unidade</th>
                <th colspan="2">4° unidade</th>
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
            </tr>
        </thead>
        <tbody>
            <?php foreach ($notas_materias as $materia) : ?>
                <tr>
                    <td><?php echo $materia['nome']; ?></td>
                    <td><input type="number" placeholder="<?php echo $materia['nota1']; ?>" name="<?php echo $materia['nome']; ?>_nota1" style="width:60px;"></td>
                    <td><input type="number" placeholder="<?php echo $materia['falta1']; ?>" name="<?php echo $materia['nome']; ?>_falta1" style="width:60px;"></td>
                    <td><input type="number" placeholder="<?php echo $materia['nota2']; ?>" name="<?php echo $materia['nome']; ?>_nota2" style="width:60px;"></td>
                    <td><input type="number" placeholder="<?php echo $materia['falta2']; ?>" name="<?php echo $materia['nome']; ?>_falta2" style="width:60px;"></td>
                    <td><input type="number" placeholder="<?php echo $materia['nota3']; ?>" name="<?php echo $materia['nome']; ?>_nota3" style="width:60px;"></td>
                    <td><input type="number" placeholder="<?php echo $materia['falta3']; ?>" name="<?php echo $materia['nome']; ?>_falta3" style="width:60px;"></td>
                    <td><input type="number" placeholder="<?php echo $materia['nota4']; ?>" name="<?php echo $materia['nome']; ?>_nota4" style="width:60px;"></td>
                    <td><input type="number" placeholder="<?php echo $materia['falta4']; ?>" name="<?php echo $materia['nome']; ?>_falta4" style="width:60px;"></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <br>
    <input type="hidden" name="id_aluno" value="">
    <button type="submit">Salvar</button>
</form>