<?php
require_once('configImages.php');

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
                editable: false, // desabilitar edição
                selectable: false, // desabilitar seleção
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