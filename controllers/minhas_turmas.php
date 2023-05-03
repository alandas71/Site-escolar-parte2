<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="..\assets\css\style.css" />
    <link rel="stylesheet" href="..\assets\css\tablet.css" />
    <link rel="stylesheet" href="..\assets\css\mobile.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="../assets/js/jquery-3.6.1.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <title>Notas</title>
    <style>
        .modal-backdrop.in {
            opacity: 0;
        }

        .modal-backdrop {
            z-index: 0;
        }
    </style>
</head>

<body>
    <?php
    $id_professor = $id;

    // Obtém o ID do professor logado a partir da sessão
    if (isset($id_professor)) {

        // Conexão com o banco de dados
        $dbHost = 'localhost';
        $dbUserName = 'root';
        $dbPassword = '';
        $dbName = 'banco-dados';

        try {
            $db = new PDO("mysql:host=$dbHost;dbname=" . $dbName, $dbUserName, $dbPassword);
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }

        // Consulta SQL para buscar todos os alunos da turma1 do professor logado
        $sql_turma1 = "SELECT * FROM users WHERE tipo = 'aluno' AND turma1 IN (SELECT turma1 FROM users WHERE tipo = 'prof' AND id = $id_professor)";

        // Consulta SQL para buscar todos os alunos da turma2 do professor logado
        $sql_turma2 = "SELECT * FROM users WHERE tipo = 'aluno' AND turma2 IN (SELECT turma2 FROM users WHERE tipo = 'prof' AND id = $id_professor)";


        // Executa as consultas SQL
        $alunos_turma1 = $db->query($sql_turma1)->fetchAll(PDO::FETCH_ASSOC);
        $alunos_turma2 = $db->query($sql_turma2)->fetchAll(PDO::FETCH_ASSOC);
        echo "<p class='title'>Minhas turmas</p>";
        echo "<br>";
        // Exibe os resultados em tabelas HTML
        echo "<h2>Matutino</h2>";
        echo "<div style=' box-shadow: -10px 10px 15px rgba(0, 0, 0, 0.5); width: 95%; overflow-x: auto; box-sizing:'>";
        echo "<table>";
        echo "<tr><th>Foto</th><th>Nome</th><th>Notas</th></tr>";
        foreach ($alunos_turma1 as $aluno) {
            echo "<tr>";
            if ($aluno['foto'] && file_exists($aluno['foto'])) {
                echo "<td><img src='{$aluno['foto']}' width='50px'></td>";
            } else {
                echo "<td><img src='../assets/images/user.jpg' width='50px'></td>";
            }
            echo "<td>{$aluno['nome']}</td>";
            echo "<td><a href='boletim_prof.php?id_aluno={$aluno['id']}' data-toggle='modal' data-target='#notasModal{$aluno['id']}' class='edit-notas fas fa-edit' data-aluno='{$aluno['id']}'></a></td>";
            echo "</tr>";
        }
        echo "</table>";
        echo "</div>";

        echo "<h2>Vespertino</h2>";
        echo "<div style='box-shadow: -10px 10px 15px rgba(0, 0, 0, 0.5); width: 95%; overflow-x: auto; box-sizing:border-box;'>";
        echo "<table>";
        echo "<tr><th>Foto</th><th>Nome</th><th>Notas</th></tr>";
        foreach ($alunos_turma2 as $aluno) {
            echo "<tr>";
            if ($aluno['foto'] && file_exists($aluno['foto'])) {
                echo "<td><img src='{$aluno['foto']}' width='50px'></td>";
            } else {
                echo "<td><img src='../assets/images/user.jpg' width='50px'></td>";
            }
            echo "<td>{$aluno['nome']}</td>";
            echo "<td><a href='boletim_prof.php?id_aluno={$aluno['id']}' data-toggle='modal' data-target='#notasModal{$aluno['id']}' class='edit-notas fas fa-edit' data-aluno='{$aluno['id']}'></a></td>";
            echo "</tr>";
        }
        echo "</table>";
        echo "</div>";


        // Adicione esse trecho no final da sua página, depois do último loop foreach
        foreach ($alunos_turma1 as $aluno) {
            echo "<div id='notasModal{$aluno['id']}' class='modal-notas fade'>";
            echo "<div class='modal-dialog modal-lg'>";
            echo "<div class='modal-content'>";
            echo "<div class='modal-header'>";
            echo "<h4 class='modal-title'>Notas de {$aluno['nome']}</h4>";
            echo "<button type='button' class='close' data-dismiss='modal'>&times;</button>";
            echo "</div>";
            echo "<div class='modal-body'>";
            // Aqui você pode adicionar um formulário para inserir as notas do aluno
            echo "</div>";
            echo "<div class='modal-footer'>";
            echo "<button type='button' class='btn btn-secondary' data-dismiss='modal'>Fechar</button>";
            echo "</div>";
            echo "</div>";
            echo "</div>";
            echo "</div>";
        }
        foreach ($alunos_turma2 as $aluno) {
            echo "<div id='notasModal{$aluno['id']}' class='modal-notas fade'>";
            echo "<div class='modal-dialog modal-lg'>";
            echo "<div class='modal-content'>";
            echo "<div class='modal-header'>";
            echo "<h4 class='modal-title'>Notas de {$aluno['nome']}</h4>";
            echo "<button type='button' class='close' data-dismiss='modal'>&times;</button>";
            echo "</div>";
            echo "<div class='modal-body'>";
            // Aqui você pode adicionar um formulário para inserir as notas do aluno
            echo "</div>";
            echo "<div class='modal-footer'>";
            echo "<button type='button' class='btn btn-secondary' data-dismiss='modal'>Fechar</button>";
            echo "</div>";
            echo "</div>";
            echo "</div>";
            echo "</div>";
        }
    } else {
        echo "ID do professor não encontrado na sessão.";
    }
    ?>
    <script>
        $('.edit-notas').click(function(event) {
            event.preventDefault();
            var alunoId = $(this).data('aluno');

            // salva o valor do id_aluno no localStorage
            localStorage.setItem('id_aluno', alunoId);
        });
    </script>
    <script>
        $('#btn-salvar').click(function() {
            // recupera o id_aluno do localStorage
            var id_aluno = localStorage.getItem('id_aluno');

            // envia a requisição AJAX para salvar as notas
            $.ajax({
                url: 'controllers/salvar_boletim.php',
                type: 'POST',
                data: {
                    id_aluno: id_aluno
                },
                success: function(response) {
                    window.location.href = 'portal_prof.php?view=mturmas';
                },
                error: function(error) {
                    console.log(error);
                    alert('Erro ao enviar requisição AJAX!');
                }
            });
        });
    </script>

</body>

</html>