<?php
// incluir o arquivo de conexão com o banco de dados
require_once('configImages.php');

$stmt = $conn->query('SELECT * FROM events');
$events = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8' />
    <link rel="stylesheet" href="..\assets\css\style.css" />
    <link rel="stylesheet" href="..\assets\css\tablet.css" />
    <link rel="stylesheet" href="..\assets\css\mobile.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/luxon/2.3.1/luxon.min.js"></script>
    <script src='../assets/js/fullCalendar/dist/index.global.js'></script>
    <script src='../assets/js/fullCalendar/packages/core/locales/pt-br.global.js'></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');

            var calendar = new FullCalendar.Calendar(calendarEl, {
                locale: 'pt-br',
                initialDate: '<?= date('Y-m-d') ?>',
                editable: false,
                selectable: false,
                businessHours: true,
                dayMaxEvents: true,
                dayPopoverFormat: {
                    year: 'numeric',
                    month: 'short',
                    day: 'numeric',
                    weekday: 'short'
                },
                events: [
                    <?php foreach ($events as $event) : ?> {
                            title: '<?= $event['title'] ?>',
                            start: '<?= $event['start'] ?>',
                            end: '<?= $event['end'] ?>',
                            id: <?= $event['id'] ?>,
                        },
                    <?php endforeach; ?>
                ],

            });

            calendar.on('eventClick', function(info) {
                // Obter o título do evento clicado pelo usuário
                var title = info.event.title;

                // Mostrar o título do evento em um alerta
                alert(title);
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
    </style>
</head>

<body>
    <div id='calendar'></div>
</body>

</html>