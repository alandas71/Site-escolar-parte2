<?php
include('configServer.php');

// Obtém os valores das sessões
$turmas = isset($_SESSION["usuario"]) ? $_SESSION["usuario"] : array();

// Verifica se foram definidas pelo menos duas turmas
if (count($turmas) < 2) {
    // Retorna uma mensagem de erro indicando que pelo menos duas turmas devem ser definidas
    echo "Erro: pelo menos duas turmas devem ser definidas.";
} else {
    // Monta a consulta SQL para obter as linhas da tabela 'horarios' correspondentes a cada turma
    $query = "SELECT * FROM horarios WHERE turma IN ('" . implode("', '", $turmas) . "')";

    // Executa a consulta SQL
    $resultado = mysqli_query($conn, $query);

    // Verifica se a consulta retornou algum resultado
    if (mysqli_num_rows($resultado) > 0) {
        // Imprime a imagem correspondente a cada turma
        while ($linha = mysqli_fetch_assoc($resultado)) {
            $turma = $linha['turma'];
            $horario = $linha['horario'];

            echo "<div style='text-align: center;'>";
            echo "<h2>Horário da Turma $turma</h2>";
            echo "<img style='width: 50vw;' src='../assets/images/horarios/$horario'>";
            echo "</div>";
        }
    } else {
        // Não há nenhum resultado para essas turmas
        echo "Nenhum horário encontrado para essas turmas.";
    }
}
