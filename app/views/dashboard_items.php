<?php
if (isset($_SESSION["usuario"]) && is_array($_SESSION["usuario"])) {

    $adm  = $_SESSION["usuario"][1];
    $nome = $_SESSION["usuario"][0];
} else {
    echo "<script>window.location = 'diretor'</script>";
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Arco-íris</title>
    <link rel="stylesheet" href="assets\css\style.css" />
    <link rel="stylesheet" href="assets\css\tablet.css" />
    <link rel="stylesheet" href="assets\css\mobile.css" />
    <style>
        body {
            padding: 0;
            font-family: Arial, Helvetica Neue, Helvetica, sans-serif;
            font-size: 14px;
        }
    </style>
    <script src="assets/js/jquery-3.6.1.min.js"></script>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/luxon/2.3.1/luxon.min.js"></script>
    <script src='assets/js/fullCalendar/dist/index.global.js'></script>
    <script src='assets/js/fullCalendar/packages/core/locales/pt-br.global.js'></script>

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

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');

            var calendar = new FullCalendar.Calendar(calendarEl, {
                locale: 'pt-br',
                initialDate: '<?= date('Y-m-d') ?>',
                editable: true,
                selectable: true,
                businessHours: true,
                dayMaxEvents: true,
                eventTimeFormat: {
                    hour: 'numeric',
                    minute: '2-digit',
                    meridiem: false
                },
                events: [
                    <?php foreach ($events as $event) : ?> {
                            title: '<?= $event['title'] ?>',
                            start: '<?= $event['start'] ?>',
                            end: '<?= $event['end'] ?>',
                            id: <?= $event['id'] ?>,
                            extendedProps: {
                                deleteLink: '<?php BASE_URL ?>dashboard/index/<?= $event['id'] ?>'
                            }
                        },
                    <?php endforeach; ?>
                ],
                dateClick: function(info) {
                    var title = prompt('Digite o título do evento:');
                    if (title) {
                        var xhr = new XMLHttpRequest();
                        xhr.open('POST', '<?php BASE_URL ?>dashboard/');
                        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
                        xhr.onload = function() {
                            location.reload();
                        };
                        xhr.send('title=' + encodeURIComponent(title) +
                            '&start=' + encodeURIComponent(info.dateStr) +
                            '&end=' + encodeURIComponent(info.dateStr));
                    }
                },
                eventClick: function(info) {
                    if (confirm('Tem certeza de que deseja deletar este evento?')) {
                        var xhr = new XMLHttpRequest();
                        xhr.open('GET', info.event.extendedProps.deleteLink);
                        xhr.onload = function() {
                            location.reload();
                        };
                        xhr.send();
                    }
                }
            });

            calendar.render();
        });
    </script>
</head>

<body>
    <div class='container-dash cont-dash'>
        <div class="items-dash">
            <div class="container-count">
                <div class="top-left">
                    <p class="count-title">TOTAL DE ALUNOS</p>
                    <div class="dsh-count" id="contador-alunos"></div>
                </div>
                <div class="top-right">
                    <p class="count-title">TOTAL DE PROFESSORES</p>
                    <div class="dsh-count" id="contador-prof"></div>
                </div>
                <div class="bottom-left">
                    <p class="count-title">TOTAL DE TURMAS</p>
                    <div class="dsh-count" id="contador-turma"></div>
                </div>
            </div>

        </div>
        <div class="items-dash">
            <div id="piechart"></div>
        </div>
        <div style="clear: both;"></div>
    </div>
    <div class='container-dash'>
        <br>
        <div>
            <div id='calendar'></div>
        </div>
    </div>

    <footer style="margin: 0; padding: 0; width: 100%; height: 100px; text-align:center;">
        <p>&copy; 2023 Centro Educar Arco-íris</p>
    </footer>

    <script>
        var limite = <?= $count ?>; // define o número limite da contagem
        var contador = 0; // inicializa o contador
        var intervalo = setInterval(function() {
            if (<?= $count ?> > 0) {
                contador++;
            } else {
                contador
            }
            document.getElementById("contador-alunos").innerHTML = contador;
            if (contador == limite) {
                clearInterval(intervalo); // para a animação quando alcançar o limite
            }
        }, 100); // define o intervalo de tempo entre cada contagem (1000ms = 1s)
    </script>
    <script>
        var limite2 = <?= $count2 ?>; // define o número limite da contagem
        var contador2 = 0; // inicializa o contador
        var intervalo2 = setInterval(function() {
            if (<?= $count2 ?> > 0) {
                contador2++;
            } else {
                contador2
            }
            document.getElementById("contador-prof").innerHTML = contador2;
            if (contador2 == limite2) {
                clearInterval(intervalo2); // para a animação quando alcançar o limite
            }
        }, 100); // define o intervalo de tempo entre cada contagem (1000ms = 1s)
    </script>
    <script>
        var limite3 = <?= $count3 ?>; // define o número limite da contagem
        var contador3 = 0; // inicializa o contador
        var intervalo3 = setInterval(function() {
            if (<?= $count3 ?> > 0) {
                contador3++;
            } else {
                contador3
            }
            document.getElementById("contador-turma").innerHTML = contador3;
            if (contador3 == limite3) {
                clearInterval(intervalo3); // para a animação quando alcançar o limite
            }
        }, 100); // define o intervalo de tempo entre cada contagem (1000ms = 1s)
    </script>
</body>

</html>