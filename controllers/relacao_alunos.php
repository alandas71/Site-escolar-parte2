<?php
// fazer a conexão com o banco de dados
$mysqli = new mysqli('localhost', 'root', '', 'banco-dados');

// verificar se ocorreu algum erro na conexão
if ($mysqli->connect_error) {
    die("Erro ao conectar ao banco de dados: " . $mysqli->connect_error);
}

// verificar se foi submetido um formulário para remover um aluno
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['remover_aluno'])) {
    $id = $_POST['remover_aluno'];

    // executar a consulta SQL para excluir o aluno
    $sql_excluir = "DELETE FROM users WHERE id = ?";
    $stmt = $mysqli->prepare($sql_excluir);
    $stmt->bind_param('i', $id);
    $stmt->execute();
    $stmt->close();
    header("location: dashboard.php?view=estudantes");
}

// executar a consulta SQL para a turma1
$sql_turma1 = "SELECT * FROM users WHERE tipo = 'aluno' AND turma1 IS NOT NULL";
$result_turma1 = $mysqli->query($sql_turma1);

// verificar se ocorreu algum erro na consulta
if (!$result_turma1) {
    die("Erro ao executar a consulta: " . $mysqli->error);
}

echo "<h2>Matutino</h2>";
echo "<table style='box-shadow: -10px 10px 15px rgba(0, 0, 0, 0.5); width: 95%;'>";
echo '<thead><tr><th>Nome</th><th>Turma</th><th>E-mail</th><th>Senha</th><th>Ações</th></tr></thead>';
while ($row_turma1 = $result_turma1->fetch_assoc()) {
    echo "<tbody><tr>";
    echo "<td>" . $row_turma1['nome'] . "</td>";
    echo "<td>" . $row_turma1['turma1'] . "</td>";
    echo "<td>" . $row_turma1["email"] . "</td>";
    echo "<td><span class='senha' data-senha='" . $row_turma1["senha"] . "'>Mostrar senha</span></td>";
    echo "<td><form method='post' action='relacao_alunos.php'>";
    echo "<button type='submit' name='remover_aluno' value='" . $row_turma1['id'] . "' onclick='return confirm(\"Tem certeza de que deseja remover este aluno?\")'>Remover</button></form></td>";
    echo "</tr></tbody>";
}
echo '</table>';

// liberar os resultados da turma1
$result_turma1->free();

// executar a consulta SQL para a turma2
$sql_turma2 = "SELECT * FROM users WHERE tipo = 'aluno' AND turma2 IS NOT NULL";
$result_turma2 = $mysqli->query($sql_turma2);

// verificar se ocorreu algum erro na consulta
if (!$result_turma2) {
    die("Erro ao executar a consulta: " . $mysqli->error);
}

// exibir os resultados da turma2 em uma tabela HTML
echo "<h2>Vespertino</h2>";
echo "<table style='box-shadow: -10px 10px 15px rgba(0, 0, 0, 0.5); width: 95%;'>";
echo '<thead><tr><th>Nome</th><th>Turma</th><th>E-mail</th><th>Senha</th><th>Ações</th></tr></thead>';
while ($row_turma2 = $result_turma2->fetch_assoc()) {
    echo "<tbody><tr>";
    echo "<td>" . $row_turma2['nome'] . "</td>";
    echo "<td>" . $row_turma2['turma2'] . "</td>";
    echo "<td>" . $row_turma2["email"] . "</td>";
    echo "<td><span class='senha' data-senha='" . $row_turma2["senha"] . "'>Mostrar senha</span></td>";
    echo "<td><form method='POST' action='relacao_alunos.php'>";
    echo "<button type='submit' name='remover_aluno' value='" . $row_turma2['id'] . "' onclick='return confirm(\"Tem certeza de que deseja remover este aluno?\")'>Remover</button></form></td>";
    echo "</tr></tbody>";
}
echo '</table>';

// liberar os resultados da turma2
$result_turma2->free();
$mysqli->close();

include('add_aluno.php');

echo '<script>'; // selecionar todas as tags <span> com a classe "senha"
echo "var spansSenha = document.querySelectorAll('.senha');";

// adicionar um manipulador de eventos de clique em cada tag <span>
echo "spansSenha.forEach(function(span) {";
echo "span.addEventListener('click', function() {";
// obter o valor do atributo "data-senha" da tag <span>
echo "var senha = this.getAttribute('data-senha');";

// substituir o texto "Mostrar senha" pelo valor da senha
echo 'this.textContent = senha;';
echo ' });';
echo ' });';
echo '</script>';
