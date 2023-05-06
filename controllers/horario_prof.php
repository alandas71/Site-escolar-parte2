<?php
// Faz a conexão com o banco de dados
include('configServer.php');

// Obtém os valores das sessões
$turma1prof  = isset($_SESSION["usuario"][3]) ? $_SESSION["usuario"][3] : null;
$turma2prof  = isset($_SESSION["usuario"][4]) ? $_SESSION["usuario"][4] : null;

// Monta a consulta SQL para obter a linha da tabela 'horarios' correspondente à turma
if (!is_null($turma1prof)) {
    $query = "SELECT * FROM horarios WHERE turma = '$turma1prof' AND turno = 'Matutino'";
} else if (!is_null($turma2prof)) {
    $query = "SELECT * FROM horarios WHERE turma = '$turma2prof' AND turno = 'Vespertino'";
}

// Executa a consulta SQL
$resultado = mysqli_query($conn, $query);

// Verifica se a consulta retornou algum resultado
if (mysqli_num_rows($resultado) > 0) {
    // Obtém o resultado da consulta em forma de array associativo
    $linha = mysqli_fetch_assoc($resultado);

    // Obtém a imagem da coluna 'horario'
    $imagem = $linha['horario'];

    // Imprime a imagem
    echo "<div style='text-align: center;'>";
    echo "<img style='width: 50vw;' src='../assets/images/horarios/$imagem'>";
    echo "</div>";
} else {
    // Não há nenhum resultado para essa turma e turno
    echo "Nenhum horário encontrado para essa turma e turno.";
}
