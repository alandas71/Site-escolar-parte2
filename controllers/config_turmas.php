<?php
// Conexão com o banco de dados
include('configServer.php');

// Verifica se o formulário para criar nova turma foi enviado
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Verifica se a conexão foi realizada com sucesso
    if (!$conn) {
        die("Conexão falhou: " . mysqli_connect_error());
    }

    // Recebe os valores do formulário
    $turma = $_POST['turma'];
    $turno = $_POST['turno'];
    $vagas = $_POST['vagas'];

    // Verifica se a turma já existe
    $sql = "SELECT * FROM turmas WHERE turma = '$turma' AND turno = '$turno'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        echo "Essa turma já existe.";
    } else {
        // Insere a nova turma na tabela "turmas"
        $sql = "INSERT INTO turmas (turma, turno, vagas) VALUES ('$turma', '$turno', '$vagas')";
        if (mysqli_query($conn, $sql)) {
            header('Location: dashboard.php?view=turma');
            exit;
        } else {
            echo "Erro ao criar nova turma: " . mysqli_error($conn);
        }
    }
}

// Verifica se foi enviado um pedido para excluir uma turma
if (isset($_GET['id']) && $_GET['action'] == 'excluir') {
    // Recebe o ID da turma a ser excluída
    $id_turma = $_GET['id'];

    // Verifica se a conexão foi realizada com sucesso
    if (!$conn) {
        die("Conexão falhou: " . mysqli_connect_error());
    }

    // Exclui a turma da tabela "turmas"
    $sql = "DELETE FROM turmas WHERE id = $id_turma";
    if (mysqli_query($conn, $sql)) {
        header('Location: dashboard.php?view=turma');
        exit;
    } else {
        echo "Erro ao excluir turma: " . mysqli_error($conn);
    }
}

// Exibe o formulário HTML para criar novas turmas
echo '<h1 class="title">Criar nova turma</h1>';
echo '<form method="POST" action="config_turmas.php">';
echo '<label for="turma">Nome da turma:</label>';
echo '<input type="text" id="turma" name="turma" required>';
echo '<br><br>';
echo '<label for="turno">Turno:</label>';
echo '<select id="turno" name="turno" required>';
echo '<option selected disabled value="">Selecione</option>';
echo '<option value="Matutino">Matutino</option>';
echo '<option value="Vespertino">Vespertino</option>';
echo '</select>';
echo '<br><br>';
echo '<label for="vagas">Limite de vagas:</label>';
echo '<input type="number" id="vagas" name="vagas" required>';
echo '<br><br>';
echo '<input type="submit" value="Criar turma">';
echo '</form>';

// Exibe a lista de turmas existentes
echo '<h2>Lista de turmas</h2>';

// Verifica se a conexão foi realizada com sucesso
if (!$conn) {
    die("Conexão falhou: " . mysqli_connect_error());
}

// Seleciona todas as turmas da tabela "turmas"
$sql = "SELECT * FROM turmas";
$result = mysqli_query($conn, $sql);

// Seleciona todas as turmas da tabela "turmas"
$sql = "SELECT * FROM turmas";
$result = mysqli_query($conn, $sql);

// Verifica se foi solicitada a exclusão de uma turma
if (isset($_GET['delete'])) {
    $turma_id = $_GET['delete'];

    // Deleta a turma da tabela "turmas"
    $sql = "DELETE FROM turmas WHERE id = '$turma_id'";
    if (mysqli_query($conn, $sql)) {
        echo "";
    } else {
        echo "Erro ao excluir turma: " . mysqli_error($conn);
    }
}

// Exibe as turmas cadastradas na tabela "turmas"
$sql = "SELECT * FROM turmas";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    echo "<table>";
    echo "<tr><th>ID</th><th>Turma</th><th>Turno</th><th>Vagas</th><th>Ações</th></tr>";
    // Consulta para contar valores repetidos em 'turma1'
    $sql_quantidade_turma1 = "SELECT turma1, COUNT(*) as quantidade FROM users GROUP BY turma1";
    $result_quantidade_turma1 = mysqli_query($conn, $sql_quantidade_turma1);
    $quantidades_turma1 = array();
    if (mysqli_num_rows($result_quantidade_turma1) > 0) {
        while ($row_quantidade_turma1 = mysqli_fetch_assoc($result_quantidade_turma1)) {
            $quantidades_turma1[$row_quantidade_turma1['turma1']] = $row_quantidade_turma1['quantidade'];
        }
    }

    // Consulta para contar valores repetidos em 'turma2'
    $sql_quantidade_turma2 = "SELECT turma2, COUNT(*) as quantidade FROM users GROUP BY turma2";
    $result_quantidade_turma2 = mysqli_query($conn, $sql_quantidade_turma2);
    $quantidades_turma2 = array();
    if (mysqli_num_rows($result_quantidade_turma2) > 0) {
        while ($row_quantidade_turma2 = mysqli_fetch_assoc($result_quantidade_turma2)) {
            $quantidades_turma2[$row_quantidade_turma2['turma2']] = $row_quantidade_turma2['quantidade'];
        }
    }

    // Loop while para imprimir as turmas
    while ($row = mysqli_fetch_assoc($result)) {
        $quantidade_turma1 = isset($quantidades_turma1[$row["turma"]]) ? $quantidades_turma1[$row["turma"]] : 0;
        $quantidade_turma2 = isset($quantidades_turma2[$row["turma"]]) ? $quantidades_turma2[$row["turma"]] : 0;
        echo "<tr>";
        echo "<td>" . $row["id"] . "</td>";
        echo "<td>" . $row["turma"] . "</td>";
        echo "<td>" . $row["turno"] . "</td>";
        if ($row["turno"] == 'Matutino') {
            echo "<td>" . ($quantidade_turma1 + $quantidade_turma2) . "/" . $row["vagas"] . "</td>";
        } else {
            echo "<td>" . $quantidade_turma2 . "/" . $row["vagas"] . "</td>";
        }
        echo "<td><a href='dashboard.php?view=turma&delete=" . $row["id"] . "'>Excluir</a></td>";
        echo "</tr>";
    }

    echo "</table>";
} else {
    echo "Nenhuma turma cadastrada.";
}
