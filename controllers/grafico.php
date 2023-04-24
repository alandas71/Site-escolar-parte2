<?php
if (isset($_SESSION["usuario"]) && is_array($_SESSION["usuario"])) {
    require("configImages.php");

    $adm  = $_SESSION["usuario"][1];
    $nome = $_SESSION["usuario"][0];
} else {
    echo "<script>window.location = 'login.php'</script>";
}
?>
<html>

<head>
    <link rel="stylesheet" href="..\assets\css\style.css" />
    <?php
    include('configImages.php');

    // define a consulta SQL
    $sql = "SELECT turma1, turma2 FROM users WHERE tipo = 'aluno'";

    // executa a consulta
    $result = $conn->query($sql);

    // inicializa um array vazio para armazenar os valores de turma
    $turmas = array();

    // percorre os resultados da consulta
    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
        // verifica se o valor da turma1 é válido
        if (!empty($row['turma1'])) {
            // adiciona o valor da turma1 ao array de turmas
            $turmas[] = $row['turma1'];
        }

        // verifica se o valor da turma2 é válido
        if (!empty($row['turma2'])) {
            // adiciona o valor da turma2 ao array de turmas
            $turmas[] = $row['turma2'];
        }
    }

    // conta a frequência de cada valor no array de turmas
    $frequencias = array_count_values($turmas);

    ?>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        google.charts.load('current', {
            'packages': ['corechart']
        });
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {

            var data = google.visualization.arrayToDataTable([
                <?php
                $total_turmas = count($frequencias);
                echo "['Turma', 'Alunos'],\n";
                foreach ($frequencias as $valor => $frequencia) {
                    echo "['" . strval($valor) . "', " . $frequencia * $total_turmas . "],\n";
                }
                ?>
            ]);

            var options = {
                title: 'Alunos por turma',
                backgroundColor: 'transparent',
            };

            var chart = new google.visualization.PieChart(document.getElementById('piechart'));

            chart.draw(data, options);
        }
    </script>
</head>

<body>
    <div id="piechart" style="width: 600px; height:300px;  text-align: center;"></div>
</body>

</html>