<!DOCTYPE html>
<html>

<head>
    <title>Boletim Escolar</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            padding: 20px;
            background-color: #f2f2f2;
        }

        .boletim {
            max-width: 800px;
            margin: 0 auto;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, .2);
            border-radius: 5px;
            padding: 30px;
            margin-bottom: 30px;
        }

        .boletim h1 {
            text-align: center;
            font-size: 36px;
            margin-bottom: 40px;
            color: #333;
            text-transform: uppercase;
        }

        table {
            border-collapse: collapse;
            margin: 20px 0;
            width: 100%;
            table-layout: fixed;
        }

        th,
        td {
            padding: 15px;
            text-align: center;
            font-size: 18px;
            vertical-align: middle;
        }

        .fullborder {
            border: 1px solid #ccc;
        }

        th {
            background-color: #f1f1f1;
            color: #333;
            font-weight: bold;
            text-align: left;
            padding-top: 20px;
            padding-bottom: 20px;
        }

        .nota {
            font-weight: bold;
            color: #28a745;
        }

        .falta {
            font-weight: bold;
            color: #dc3545;
        }

        .resultado {
            font-weight: bold;
            font-size: 24px;
            margin-top: 20px;
            text-align: center;
            text-transform: uppercase;
        }

        .aprovado {
            color: #28a745;
        }

        .reprovado {
            color: #dc3545;
        }

        /* Estilos adicionais para dispositivos móveis */
        @media (max-width: 767px) {
            .boletim {
                padding: 20px;
            }

            .boletim h1 {
                font-size: 28px;
                margin-bottom: 30px;
            }

            th,
            td {
                padding: 10px;
                font-size: 16px;
            }

            th:first-child,
            td:first-child {
                padding-left: 10px;
            }

            th:last-child,
            td:last-child {
                padding-right: 10px;
            }
        }
    </style>
</head>

<body>
    <h1>Boletim Escolar</h1>
    <table>
        <thead>
            <tr>
                <th style=" border: 1px solid #ccc; border-bottom: none;">Matéria</th>
                <th class='fullborder' colspan="2">1° unidade</th>
                <th class='fullborder' colspan="2">2° unidade</th>
                <th class='fullborder' colspan="2">3° unidade</th>
                <th class='fullborder' colspan="2">4° unidade</th>
                <th style=" border: 1px solid #ccc; border-bottom: none;">Média</th>
                <th style=" border: 1px solid #ccc; border-bottom: none;">Total de Faltas</th>
                <th style=" border: 1px solid #ccc; border-bottom: none;">Resultado Final</th>
            </tr>
        </thead>
        <thead>
            <tr>
                <th style=" border: 1px solid #ccc; border-top: none;"></th>
                <th class='fullborder'>Nota</th>
                <th class='fullborder'>Falta</th>
                <th class='fullborder'>Nota</th>
                <th class='fullborder'>Falta</th>
                <th class='fullborder'>Nota</th>
                <th class='fullborder'>Falta</th>
                <th class='fullborder'>Nota</th>
                <th class='fullborder'>Falta</th>
                <th style=" border: 1px solid #ccc; border-top: none;"></th>
                <th style=" border: 1px solid #ccc; border-top: none;"></th>
                <th style=" border: 1px solid #ccc; border-top: none;"></th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td class="fullborder">Matemática</td>
                <td class="fullborder nota">8.5</td>
                <td class="fullborder falta">5</td>
                <td class="fullborder nota">7.0</td>
                <td class="fullborder falta">5</td>
                <td class="fullborder nota">9.0</td>
                <td class="fullborder falta">5</td>
                <td class="fullborder nota">9.0</td>
                <td class="fullborder falta">5</td>
                <td class="fullborder media">5</td>
                <td class="fullborder total-faltas">5</td>
                <td class="fullborder resultado">Aprovado</td>
            </tr>
            <tr>
                <td class="fullborder">Português</td>
                <td class="fullborder nota">9.0</td>
                <td class="fullborder falta">5</td>
                <td class="fullborder nota">8.5</td>
                <td class="fullborder falta">5</td>
                <td class="fullborder nota">7.5</td>
                <td class="fullborder falta">5</td>
                <td class="fullborder nota">9.0</td>
                <td class="fullborder falta">5</td>
                <td class="fullborder media">2</td>
                <td class="fullborder total-faltas">5</td>
                <td class="fullborder resultado">Aprovado</td>
            </tr>
        </tbody>
    </table>
</body>

</html>