<?php

include('configServer.php');

$query = "SELECT materia, nota1, nota2, nota3, nota4, falta1, falta2, falta3, falta4, faltas, media, resultado FROM notas WHERE id_aluno = $id_aluno";
$result = mysqli_query($conn, $query);

$notas_materias = [
    ['nome' => 'Matemática', 'nota1' => '', 'falta1' => '', 'nota2' => '', 'falta2' => '', 'nota3' => '', 'falta3' => '', 'nota4' => '', 'falta4' => '', 'media' => '', 'faltas' => '', 'resultado' => ''],
    ['nome' => 'Português', 'nota1' => '', 'falta1' => '', 'nota2' => '', 'falta2' => '', 'nota3' => '', 'falta3' => '', 'nota4' => '', 'falta4' => '', 'media' => '', 'faltas' => '', 'resultado' => ''],
    ['nome' => 'História', 'nota1' => '', 'falta1' => '', 'nota2' => '', 'falta2' => '', 'nota3' => '', 'falta3' => '', 'nota4' => '', 'falta4' => '', 'media' => '', 'faltas' => '', 'resultado' => ''],
    ['nome' => 'Ciências', 'nota1' => '', 'falta1' => '', 'nota2' => '', 'falta2' => '', 'nota3' => '', 'falta3' => '', 'nota4' => '', 'falta4' => '', 'media' => '', 'faltas' => '', 'resultado' => ''],
    ['nome' => 'Geografia', 'nota1' => '', 'falta1' => '', 'nota2' => '', 'falta2' => '', 'nota3' => '', 'falta3' => '', 'nota4' => '', 'falta4' => '', 'media' => '', 'faltas' => '', 'resultado' => ''],
    ['nome' => 'Artes', 'nota1' => '', 'falta1' => '', 'nota2' => '', 'falta2' => '', 'nota3' => '', 'falta3' => '', 'nota4' => '', 'falta4' => '', 'media' => '', 'faltas' => '', 'resultado' => ''],
    ['nome' => 'Inglês', 'nota1' => '', 'falta1' => '', 'nota2' => '', 'falta2' => '', 'nota3' => '', 'falta3' => '', 'nota4' => '', 'falta4' => '', 'media' => '', 'faltas' => '', 'resultado' => ''],
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
<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="..\assets\css\viewNotas.css" />
    <title>Boletim Escolar</title>
</head>

<body>
    <h1>Boletim Escolar</h1>
    <table>
        <thead>
            <tr>
                <th style=" border: 1px solid #ccc; border-bottom: none;">Matéria</th>
                <th class='fullborder' colspan="2">1° unidade</th>
                <th class='fullborder' colspan="2">2° unidade</th>
                <th class='fullborder' colspan="2">3° unidade</th>
                <th class='fullborder' colspan="2">4° unidade</th>
                <th style=" border: 1px solid #ccc; border-bottom: none;">Média</th>
                <th style=" border: 1px solid #ccc; border-bottom: none;">Total de Faltas</th>
                <th style=" border: 1px solid #ccc; border-bottom: none;">Resultado Final</th>
            </tr>
        </thead>
        <thead>
            <tr>
                <th style=" border: 1px solid #ccc; border-top: none;"></th>
                <th class='fullborder'>Nota</th>
                <th class='fullborder'>Falta</th>
                <th class='fullborder'>Nota</th>
                <th class='fullborder'>Falta</th>
                <th class='fullborder'>Nota</th>
                <th class='fullborder'>Falta</th>
                <th class='fullborder'>Nota</th>
                <th class='fullborder'>Falta</th>
                <th style=" border: 1px solid #ccc; border-top: none;"></th>
                <th style=" border: 1px solid #ccc; border-top: none;"></th>
                <th style=" border: 1px solid #ccc; border-top: none;"></th>
            </tr>
        </thead>

        <tbody>
            <?php foreach ($notas_materias as $materia) : ?>
                <tr>
                    <td class="fullborder"><?php echo $materia['nome']; ?></td>
                    <td name="<?php echo $materia['nome']; ?>_nota1" class="fullborder nota"> <?php echo $materia['nota1']; ?></td>
                    <td name="<?php echo $materia['nome']; ?>_falta1" class="fullborder falta"><?php echo $materia['falta1']; ?></td>
                    <td name="<?php echo $materia['nome']; ?>_nota2" class="fullborder nota"><?php echo $materia['nota2']; ?></td>
                    <td name="<?php echo $materia['nome']; ?>_falta2" class="fullborder falta"><?php echo $materia['falta2']; ?></td>
                    <td name="<?php echo $materia['nome']; ?>_nota3" class="fullborder nota"><?php echo $materia['nota3']; ?></td>
                    <td name="<?php echo $materia['nome']; ?>_falta3" class="fullborder falta"><?php echo $materia['falta3']; ?></td>
                    <td name="<?php echo $materia['nome']; ?>_nota4" class="fullborder nota"><?php echo $materia['nota4']; ?></td>
                    <td name="<?php echo $materia['nome']; ?>_falta4" class="fullborder falta"><?php echo $materia['falta4']; ?></td>
                    <td class="fullborder media"><?php echo $materia['media']; ?></td>
                    <td class="fullborder total-faltas"><?php echo $materia['faltas']; ?></td>
                    <td class="fullborder resultado"><?php echo $materia['resultado']; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>

</html>