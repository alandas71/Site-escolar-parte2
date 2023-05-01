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

    // Exibe os resultados em tabelas HTML
    echo "<h2>Matutino</h2>";
    echo "<table>";
    echo "<tr><th>Nome</th></tr>";
    foreach ($alunos_turma1 as $aluno) {
        echo "<tr><td>{$aluno['nome']}</td></tr>";
    }
    echo "</table>";

    echo "<h2>Vespertino</h2>";
    echo "<table>";
    echo "<tr><th>Nome</th></tr>";
    foreach ($alunos_turma2 as $aluno) {
        echo "<tr><td>{$aluno['nome']}</td></tr>";
    }
    echo "</table>";
} else {
    echo "ID do professor não encontrado na sessão.";
}
