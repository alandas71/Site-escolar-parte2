document.addEventListener('DOMContentLoaded', function () {
    var calendarEl = document.getElementById('calendar');

    var calendar = new FullCalendar.Calendar(calendarEl, {
        locale: 'pt-br',
        initialDate: '<?= date('Y- m - d') ?>',
        editable: true,
        selectable: true,
        businessHours: true,
        dayMaxEvents: true,
        timeFormat: 'H(:mm)', // definindo o formato de exibição do horário

        events: [
            <? php foreach($events as $event) : ?> {
            title: '<?= $event['title'] ?>',
            start: '<?= $event['start'] ?>',
            end: '<?= $event['end'] ?>',
            id: <?= $event['id'] ?>,
            extendedProps: {
                deleteLink: 'deleteEvent.php?id=<?= $event['id'] ?>'
                    }
        },
            <? php endforeach; ?>
        ],

    dateClick: function(info) {
        var title = prompt('Digite o título do evento:');
        if (title) {
            var xhr = new XMLHttpRequest();
            xhr.open('POST', 'configAgenda.php');
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            xhr.onload = function () {
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
            xhr.onload = function () {
                location.reload();
            };
            xhr.send();
        }
    }
});

calendar.render();
});