<?php
// fazer a conexão com o banco de dados
$mysqli = new mysqli('localhost', 'root', '', 'banco-dados');

// verificar se ocorreu algum erro na conexão
if ($mysqli->connect_error) {
    die("Erro ao conectar ao banco de dados: " . $mysqli->connect_error);
}

// executar a consulta SQL
$sql = "SELECT * FROM users WHERE tipo = 'aluno'";
$result = $mysqli->query($sql);

// verificar se ocorreu algum erro na consulta
if (!$result) {
    die("Erro ao executar a consulta: " . $mysqli->error);
}

// exibir os resultados em uma tabela HTML
echo "<table style='box-shadow: -10px 10px 15px rgba(0, 0, 0, 0.5); width: 95%;'>";
while ($row = $result->fetch_assoc()) {
    echo    '<thead><tr><th>Nome</th><th>E-mail</th><th>Senha</th></tr></thead>';
    echo    "<tbody><tr><td>" . $row['nome'] . "</td><td>" . $row["email"] . "</td><td>" . $row["senha"] . "</td></tr></tbody>";
}
echo '</table>';

// liberar os resultados e fechar a conexão
$result->free();
$mysqli->close();
