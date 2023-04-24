<?php
if (isset($_SESSION["usuario"]) && is_array($_SESSION["usuario"])) {
    require("configImages.php");

    $adm  = $_SESSION["usuario"][1];
    $nome = $_SESSION["usuario"][0];
} else {
    echo "<script>window.location = 'login.php'</script>";
}
// fazer a conexão com o banco de dados
$mysqli = new mysqli('localhost', 'root', '', 'banco-dados');

// verificar se ocorreu algum erro na conexão
if ($mysqli->connect_error) {
    die("Erro ao conectar ao banco de dados: " . $mysqli->connect_error);
}

echo ' <br>';
echo '<h1 class="title">Adicionar professor</h1>';
echo ' <br>';
echo '<form method="post" action="add_prof.php">';
echo '  <label for="nome">Nome:</label>';
echo '  <input type="text" id="nome" name="nome" required>';
echo ' <br>';
echo ' <br>';
echo '  <label for="email">E-mail:</label>';
echo '  <input type="email" id="email" name="email" required>';
echo ' <br>';
echo ' <br>';
echo ' <label for="senha">Senha:</label>';
echo '  <input type="password" id="senha" name="senha" required>';
echo '  <br>';
echo ' <br>';
echo ' <label for="turma">Turma:</label>';
echo ' <select id="turma" name="turma" required>';
echo '<option selected disabled value="">Selecione</option>';

// Consulta a tabela turmas para obter os valores únicos da coluna "turma"
$sql_turmas = "SELECT DISTINCT turma FROM turmas";
$result_turmas = $mysqli->query($sql_turmas);

if ($result_turmas->num_rows > 0) {
    while ($row = $result_turmas->fetch_assoc()) {
        echo "<option value='" . $row["turma"] . "'>" . $row["turma"] . "</option>";
    }
} else {
    echo "Não foram encontrados registros na tabela turmas.";
}

echo '</select>';
echo '<br>';
echo '<br>';
echo 'Turno:';
echo '<select name="turno">';
echo '<option selected disabled value="">Selecione</option>';
echo '<option value="Matutino">Matutino</option>';
echo '<option value="Vespertino">Vespertino</option>';
echo '</select>';
echo '<br>';
echo '<br>';
echo '<button type="submit">Adicionar professor</button>';
echo '</form>';

// verificar se foi submetido um formulário para adicionar um professor
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['nome']) && isset($_POST['email']) && isset($_POST['senha']) && isset($_POST['turma']) && isset($_POST['turno'])) {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $turma = $_POST['turma'];
    $turno = $_POST['turno'];

    // definir a coluna correspondente para "turma"
    if ($turno === 'Matutino') {
        $turma1 = $turma;
        $turma2 = null;
    } else if ($turno === 'Vespertino') {
        $turma1 = null;
        $turma2 = $turma;
    } else {
        $turma1 = null;
        $turma2 = null;
    }

    // inserir o professor no banco de dados
    $sql_inserir = "INSERT INTO users (nome, email, senha, tipo, turma1, turma2) VALUES (?, ?, ?, 'prof', ?, ?)";
    $stmt = $mysqli->prepare($sql_inserir);
    $stmt->bind_param('sssss', $nome, $email, $senha, $turma1, $turma2);
    $stmt->execute();
    $stmt->close();

    // redirecionar para a página de visualização do professor
    header("location: dashboard.php?view=professores");
} else {
    echo "</br>";
    echo "Por favor, preencha todos os campos do formulário para adicionar um professor.";
}

// fechar a conexão com o banco de dados
$mysqli->close();
