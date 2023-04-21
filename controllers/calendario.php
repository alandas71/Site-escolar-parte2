<?php
// Conexão com o banco de dados
include('configServer.php');

// Verifica se houve uma solicitação para salvar uma data marcada
if (isset($_POST['data']) && isset($_POST['cor'])) {
    $data = $_POST['data'];
    $cor = $_POST['cor'];

    // Insere a data marcada na tabela calendario
    $sql = "INSERT INTO calendario (data, cor) VALUES ('$data', '$cor')";
    $conn->query($sql);
}

// Retorna as datas marcadas para o calendário em formato JSON
$sql = "SELECT data, cor FROM calendario";
$result = $conn->query($sql);
$dates = array();
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $dates[] = array(
            'date' => $row['data'],
            'color' => $row['cor']
        );
    }
}
echo json_encode($dates);
