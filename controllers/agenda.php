<?php
if (isset($_SESSION["usuario"]) && is_array($_SESSION["usuario"])) {
    require("configImages.php");

    $adm  = $_SESSION["usuario"][1];
    $nome = $_SESSION["usuario"][0];
} else {
    echo "<script>window.location = 'login.php'</script>";
}
// incluir o arquivo de conexão com o banco de dados
require_once('configImages.php');

// verificar se foi feita uma requisição para salvar um evento
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // obter os dados do evento
    $title = $_POST['title'];
    $startLocal = $_POST['start'];
    $startUTC = new DateTime($startLocal, new DateTimeZone('UTC'));
    $start = $startUTC->format('Y-m-d H:i:s');

    $endLocal = $_POST['end'];
    $endUTC = new DateTime($endLocal, new DateTimeZone('UTC'));
    $end = $endUTC->format('Y-m-d H:i:s');

    // inserir o evento no banco de dados
    $stmt = $conn->prepare('INSERT INTO events (title, start, end) VALUES (?, ?, ?)');
    $stmt->execute([$title, $start, $end]);


    // redirecionar de volta para a página inicial
    header('Location: dashboard.php?view=dashboard');
    exit();
}

// obter os eventos do banco de dados
$stmt = $conn->query('SELECT * FROM events');
$events = $stmt->fetchAll(PDO::FETCH_ASSOC);

// adicionar a hora automática no início do evento
foreach ($events as &$event) {
    $start = new DateTime($event['start']);
    $event['start'] = $start->format('Y-m-d H:i:s');
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8' />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/luxon/2.3.1/luxon.min.js"></script>
    <script src='../assets/js/fullCalendar/dist/index.global.js'></script>
    <script src='../assets/js/fullCalendar/packages/core/locales/pt-br.global.js'></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');

            var calendar = new FullCalendar.Calendar(calendarEl, {
                timeZone: 'America/Sao_Paulo',
                slotLabelFormat: {
                    hour: 'numeric',
                    minute: '2-digit',
                    omitZeroMinute: false,
                    meridiem: 'short'
                },
                locale: 'pt-br',
                initialDate: '<?= date('Y-m-d H:i:s') ?>',
                editable: true,
                selectable: true,
                businessHours: true,
                dayMaxEvents: true,
                events: [
                    <?php foreach ($events as $event) : ?> {
                            title: '<?= $event['title'] ?>',
                            start: '<?= $event['start'] ?>',
                            end: '<?= $event['end'] ?>',
                            id: <?= $event['id'] ?>,
                            extendedProps: {
                                deleteLink: 'deleteEvent.php?id=<?= $event['id'] ?>'
                            }
                        },
                    <?php endforeach; ?>
                ],

                dateClick: function(info) {
                    var title = prompt('Digite o título do evento:');
                    if (title) {
                        var xhr = new XMLHttpRequest();
                        xhr.open('POST', 'configAgenda.php');
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

    <style>
        body {
            margin: 40px 10px;
            padding: 0;
            font-family: Arial, Helvetica Neue, Helvetica, sans-serif;
            font-size: 14px;
        }

        #calendar {
            max-width: 900px;
            margin: 0 auto;
            font-size: 14px;
        }
    </style>
</head>

<body>
    <div id='calendar'></div>
</body>

</html>