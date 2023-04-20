<?php
// fazer a conexão com o banco de dados
$mysqli = new mysqli('localhost', 'root', '', 'banco-dados');

// verificar se ocorreu algum erro na conexão
if ($mysqli->connect_error) {
    die("Erro ao conectar ao banco de dados: " . $mysqli->connect_error);
}

// executar a consulta SQL para a turma1
$sql_turma1 = "SELECT * FROM users WHERE tipo = 'prof' AND turma1 IS NOT NULL";
$result_turma1 = $mysqli->query($sql_turma1);

// verificar se ocorreu algum erro na consulta
if (!$result_turma1) {
    die("Erro ao executar a consulta: " . $mysqli->error);
}

// exibir os resultados da turma1 em uma tabela HTML
echo "<h2>Matutino</h2>";
echo "<table style='box-shadow: -10px 10px 15px rgba(0, 0, 0, 0.5); width: 95%;'>";
echo    '<thead><tr><th>Nome</th><th>Turma</th><th>E-mail</th><th>Senha</th></tr></thead>';
while ($row_turma1 = $result_turma1->fetch_assoc()) {
    echo    "<tbody><tr><td>" . $row_turma1['nome'] . "</td><td>" . $row_turma1['turma1'] . "</td><td>" . $row_turma1["email"] . "</td><td>" . $row_turma1["senha"] . "</td></tr></tbody>";
}
echo '</table>';

// liberar os resultados da turma1
$result_turma1->free();

// executar a consulta SQL para a turma2
$sql_turma2 = "SELECT * FROM users WHERE tipo = 'prof' AND turma2 IS NOT NULL";
$result_turma2 = $mysqli->query($sql_turma2);

// verificar se ocorreu algum erro na consulta
if (!$result_turma2) {
    die("Erro ao executar a consulta: " . $mysqli->error);
}

// exibir os resultados da turma2 em uma tabela HTML
echo "<h2>Vespertino</h2>";
echo "<table style='box-shadow: -10px 10px 15px rgba(0, 0, 0, 0.5); width: 95%;'>";
echo    '<thead><tr><th>Nome</th><th>Turma</th><th>E-mail</th><th>Senha</th></tr></thead>';
while ($row_turma2 = $result_turma2->fetch_assoc()) {
    echo    "<tbody><tr><td>" . $row_turma2['nome'] . "</td><td>" . $row_turma2['turma2'] . "</td><td>" . $row_turma2["email"] . "</td><td>" . $row_turma2["senha"] . "</td></tr></tbody>";
}
echo '</table>';

// liberar os resultados da turma2 e fechar a conexão
$result_turma2->free();
$mysqli->close();
