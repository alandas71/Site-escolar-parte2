<?php
$turma2 = $_SESSION["usuario"][4];
$turma1 = $_SESSION["usuario"][3];
$id_aluno = $_SESSION["usuario"][2];
$nome = $_SESSION["usuario"][0];

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
    $media = $row['media'];
    $faltas = $row['faltas'];
    $resultado = $row['resultado'];

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
            $materia_atual['media'] = $media;
            $materia_atual['faltas'] = $faltas;
            $materia_atual['resultado'] = $resultado;
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
    <div id="print-boletim">
        <img src="..\assets\images\iconetopo.png" width="150px" style="float:left;">
        <div style="display:flex; justify-content:center;">
            <div style="text-align:center;">
                <h1 style="font-size:25px;">Centro Educar Arco-Íris</h1>
                <p>BOLETIM DO ALUNO</p>
            </div>
        </div>
        <br>
        <p style="margin-bottom: 0;"><?php echo $nome; ?><?php echo ' - ' . $turma1 . $turma2; ?></p>
        <p style="font-size:12px; margin-top: 0;"><?php echo 'Registro acadêmico - ' . $id; ?></p>
        <div id="tabelaView">
            <table>
                <thead>
                    <tr>
                        <th class="bbnone">Matéria</th>
                        <th class='fullborder' colspan="2">1° unidade</th>
                        <th class='fullborder' colspan="2">2° unidade</th>
                        <th class='fullborder' colspan="2">3° unidade</th>
                        <th class='fullborder' colspan="2">4° unidade</th>
                        <th class="bbnone">Média</th>
                        <th class="bbnone">Total de Faltas</th>
                        <th class="bbnone">Resultado Final</th>
                        <th class="bbnone">Recuperação</th>
                    </tr>
                </thead>
                <thead>
                    <tr>
                        <th class='btnone'></th>
                        <th class='fullborder'>Nota</th>
                        <th class='fullborder'>Falta</th>
                        <th class='fullborder'>Nota</th>
                        <th class='fullborder'>Falta</th>
                        <th class='fullborder'>Nota</th>
                        <th class='fullborder'>Falta</th>
                        <th class='fullborder'>Nota</th>
                        <th class='fullborder'>Falta</th>
                        <th class='btnone'></th>
                        <th class='btnone'></th>
                        <th class='btnone'></th>
                        <th class='btnone'></th>
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
                            <td class="fullborder recuperacao"></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
    <br>
    <button id="btn_imp">Imprimir</button>
    <script>
        const btn_imp = document.getElementById("btn_imp");
        const conteudo = document.getElementById('print-boletim').innerHTML;

        btn_imp.addEventListener("click", (evt) => {
            let estilo = "<style>";
            estilo += "@media print { @page {size: A4;margin: 0;padding:0;}}";
            estilo += ".print-boletim img {transform: rotate(90deg);}";
            estilo += "table {border-collapse: collapse; width: 100%; height: 100%; text-align: center;}";
            estilo += "th, td {padding: 15px;text-align: center;font-size: 18px;vertical-align: middle;}";
            estilo += ".btnone {border: 1px solid #ccc; border-top: none;}";
            estilo += ".bbnone {border: 1px solid #ccc; border-bottom: none;}";
            estilo += ".fullborder {border: 1px solid #ccc;}";
            estilo += ".print-boletim {writing-mode: vertical-rl;transform: rotate(180deg); width: 100vw; height: 122vh;";
            estilo += "</style>";

            const newWindow = window.open('', '', 'height=1000,width=1000');
            newWindow.document.write('<html><head>');
            newWindow.document.write('<title>Boletim Arco-Íris</title>');
            newWindow.document.write(estilo);
            newWindow.document.write('</head>');
            newWindow.document.write('<body>');
            newWindow.document.write('<div class="print-boletim">' + conteudo + '</div>');
            newWindow.document.write('</body></html>');
            newWindow.document.close();
            newWindow.focus();
            newWindow.print();
            newWindow.close();
        })
    </script>

</body>

</html>