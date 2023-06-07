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

<div id='calendar'></div>