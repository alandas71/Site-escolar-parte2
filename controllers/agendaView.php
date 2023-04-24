<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8' />
    <script src='../assets/js/fullCalendar/dist/index.global.js'></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');

            var calendar = new FullCalendar.Calendar(calendarEl, {
                initialDate: '<?= date('Y-m-d') ?>',
                editable: false,
                selectable: false,
                businessHours: true,
                dayMaxEvents: true, // allow "more" link when too many events
                events: [
                    <?php foreach ($events as $event) : ?> {
                            title: '<?= $event['title'] ?>',
                            start: '<?= $event['start'] ?>',
                            end: '<?= $event['end'] ?>'
                        },
                    <?php endforeach; ?>
                ]
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
            max-width: 1100px;
            margin: 0 auto;
        }
    </style>
</head>

<body>

    <div id='calendar'></div>

</body>

</html>