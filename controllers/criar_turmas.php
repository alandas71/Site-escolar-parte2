<?php
// Conexão com o banco de dados
include('configServer.php');

// Verifica se a conexão foi estabelecida corretamente
if (!$conn) {
    die("Conexão falhou: " . mysqli_connect_error());
}

// Se o formulário foi submetido, insere as informações na tabela users
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST["nome"];
    $turma = $_POST["turma"];
    $turno = $_POST["turno"];

    if ($turno == "Matutino") {
        $turma_coluna = "turma1";
    } elseif ($turno == "Vespertino") {
        $turma_coluna = "turma2";
    } else {
        // Tratar erro caso o valor selecionado para turno seja inválido
        die("Valor inválido para turno.");
    }

    $sql = "UPDATE users SET $turma_coluna='$turma' WHERE nome='$nome'";

    if (mysqli_query($conn, $sql)) {
        header("location: dashboard.php?view=turma");
    } else {
        echo "Erro ao atualizar registro: " . mysqli_error($conn);
    }
}
echo '<h1 class="title">Trocar de turma</h1>';
echo '<br>';
echo '<form method="post" action="turma.php">';
echo 'Nome:';
echo '<select name="nome" required>';
echo '<option selected disabled value="">Selecione</option>';

// Consulta a tabela users para obter os valores únicos da coluna "nome"
$sql = "SELECT DISTINCT nome FROM users";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<option value='" . $row["nome"] . "'>" . $row["nome"] . "</option>";
    }
} else {
    echo "Não foram encontrados registros na tabela users.";
}

echo '</select><br>';
echo '<br>';
echo 'Turma:';
echo '<select name="turma" required>';
echo '<option selected disabled value="">Selecione</option>';

// Consulta a tabela turmas para obter os valores da coluna "turma"
$sql = "SELECT DISTINCT turma FROM turmas";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<option value='" . $row["turma"] . "'>" . $row["turma"] . "</option>";
    }
} else {
    echo "Não foram encontrados registros na tabela turmas.";
}

echo '</select><br>';
echo '<br>';
echo 'Turno:';
echo '<select name="turno" required>';
echo '<option selected disabled value="">Selecione</option>';
echo '<option value="Matutino">Matutino</option>';
echo '<option value="Vespertino">Vespertino</option>';
echo '</select><br>';
echo '<br>';
echo '<input type="submit" value="Atualizar">';
echo '</form>';

// Fecha a conexão com o banco de dados
mysqli_close($conn);
