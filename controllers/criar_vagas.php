<?php
if (isset($_SESSION["usuario"]) && is_array($_SESSION["usuario"])) {
    require("configImages.php");

    $adm  = $_SESSION["usuario"][1];
    $nome = $_SESSION["usuario"][0];
} else {
    echo "<script>window.location = 'login.php'</script>";
}
// Conexão com o banco de dados
include('configServer.php');

// Verifica se houve um envio de formulário
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Se o campo de entrada de texto não estiver vazio, insere o novo valor na tabela
    if (!empty($_POST['nova_vaga'])) {
        $nova_vaga = $_POST['nova_vaga'];
        $sql = "INSERT INTO vagas (vaga) VALUES ('$nova_vaga')";
        header('Location: dashboard.php?view=matricula');
        $conn->query($sql);
    }

    // Se a opção de exclusão for selecionada, remove o valor correspondente da tabela
    if (isset($_POST['excluir'])) {
        $excluir_vaga = $_POST['vaga'];
        $sql = "DELETE FROM vagas WHERE vaga = '$excluir_vaga'";
        header('Location: dashboard.php?view=matricula');
        $conn->query($sql);
    }
}

// Cria o formulário com os campos de entrada de texto e seleção
echo '<h1 class="title">Postar vagas de matrícula</h1>';
echo "<br>";
echo "<form method='post' action='criar_vagas.php'>";
echo "Turma: <select name='nova_vaga'>";
$sql = "SELECT DISTINCT turma FROM turmas";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    echo '<option selected disabled value="">Selecione</option>';
    while ($row = $result->fetch_assoc()) {
        echo "<option value='" . $row['turma'] . "'>" . $row['turma'] . "</option>";
    }
}
echo "</select><br>";
echo "<br>";
echo "Disponibilidade de vagas na pré-matrícula:";
echo "<br>";

// Seleciona todas as vagas existentes na tabela e as adiciona como opções na seleção
$sql = "SELECT vaga FROM vagas";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<select name='vaga'>";
    echo '<option selected disabled value="">Selecione</option>';
    while ($row = $result->fetch_assoc()) {
        echo "<option value='" . $row['vaga'] . "'>" . $row['vaga'] . "</option>";
    }
    echo "</select>";
    echo " <input type='submit' name='excluir' value='Excluir' onclick='return confirm(\"Tem certeza de que deseja excluir a disponibilidade de vaga?\")'>";
} else {
    echo "Nenhuma vaga encontrada.";
}

echo "<br>";
echo "<br>";
echo "<input type='submit' name='inserir' value='Inserir vaga'>";
echo "</form>";
// Fecha a conexão com o banco de dados
$conn->close();
