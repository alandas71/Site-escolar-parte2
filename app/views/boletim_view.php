<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>assets\css\viewNotas.css" />
    <title>Arco-íris</title>
    <style>
        .view {
            position: relative;
        }
    </style>
</head>

<body>
    <div id="print-boletim">
        <img src="<?php echo BASE_URL; ?>assets\images\iconetopo.png" width="150px" style="float:left;">
        <div style="display:flex; justify-content:center;">
            <div style="text-align:center;">
                <h1 style="font-size:25px;">Centro Educar Arco-íris</h1>
                <p>BOLETIM DO ALUNO</p>
            </div>
        </div>
        <p style="margin-bottom: 0;"><?php echo $nome; ?><?php echo ' - ' . $turma1 . $turma2; ?></p>
        <p style="font-size:12px; margin-top: 0;"><?php echo 'Registro acadêmico - ' . $id; ?></p>
        <div id="tabelaView">
            <div>
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
    </div>
    <br>
    <button id="btn_imp">Imprimir</button>
    <script>
        const btn_imp = document.getElementById("btn_imp");
        const conteudo = document.getElementById('print-boletim').innerHTML;

        btn_imp.addEventListener("click", (evt) => {
            let estilo = "<style>";
            estilo += "@media print { @page {size: A4;margin: 0;padding:0;}}";
            estilo += ".print-boletim img {transform: rotate(90deg); width: 110px;}";
            estilo += "table {border-collapse: collapse; width: 100%; height: 100%; text-align: center;}";
            estilo += "th, td {padding: 15px; text-align: center;font-size: 18px;vertical-align: middle; box-sizing: border-box;}";
            estilo += ".btnone {border: 1px solid #000; border-right: none;}";
            estilo += ".bbnone {border: 1px solid #000; border-left: none;}";
            estilo += ".fullborder {border: 1px solid #000;}";
            estilo += ".print-boletim {writing-mode: vertical-rl; transform: rotate(180deg) scale(0.72, 0.9);  transform-origin: 45% 50%;}";
            estilo += "</style>";

            const newWindow = window.open('', '', 'height=1000,width=1000');
            newWindow.document.write('<html><head>');
            newWindow.document.write('<title>Boletim Arco-íris</title>');
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