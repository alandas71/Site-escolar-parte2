<!DOCTYPE html>
<html>

<head>
    <title>Calendário</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.0/fullcalendar.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/6.1.5/index.global.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment.min.js"></script>

    <script>
        $(document).ready(function() {
            // Carrega as datas marcadas do banco de dados para o calendário
            $.ajax({
                url: 'calendario.php',
                type: 'GET',
                success: function(response) {
                    var events = JSON.parse(response);
                    $('#calendario').fullCalendar('renderEvents', events, true);
                }
            });

            // Configura o calendário
            $('#calendario').fullCalendar({
                selectable: true,
                select: function(start, end) {
                    // Exibe um formulário para o usuário selecionar a cor
                    var cor = prompt("Informe a cor:");
                    if (cor != null) {
                        // Salva a data marcada com a cor no banco de dados
                        $.ajax({
                            url: 'calendario.php',
                            type: 'POST',
                            data: {
                                data: start.format(),
                                cor: cor
                            },
                            success: function(response) {
                                var event = {
                                    start: start,
                                    end: end,
                                    color: cor
                                };
                                $('#calendario').fullCalendar('renderEvent', event, true);
                            }
                        });
                    }
                },
                editable: true,
                eventDrop: function(event, delta, revertFunc) {
                    // Atualiza a data marcada no banco de dados ao arrastar o evento
                    $.ajax({
                        url: 'calendario.php',
                        type: 'POST',
                        data: {
                            data: event.start.format(),
                            cor: event.color
                        }
                    });
                },
                eventResize: function(event, delta, revertFunc) {
                    // Atualiza a data marcada no banco de dados ao redimensionar o evento
                    $.ajax({
                        url: 'calendario.php',
                        type: 'POST',
                        data: {
                            data: event.start.format(),
                            cor: event.color
                        }
                    });
                }
            });
        });
    </script>
</head>

<body>
    <div id="calendario"></div>
</body>

</html>