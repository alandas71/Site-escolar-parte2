<?php
// conexão com o banco de dados
include('configServer.php');

// consulta para selecionar todas as matérias e suas notas
$sql = "SELECT m.nome, n.valor, n.data FROM materias m LEFT JOIN notas n ON m.id = n.materia_id";

// preparar a consulta
$stmt = $conn->prepare($sql);

// executar a consulta
$stmt->execute();

// obter os resultados da consulta
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<table>
    <thead>
        <tr>
            <th>Matéria</th>
            <th>Nota</th>
            <th>Data</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($result as $row) { ?>
            <tr>
                <td><?php echo $row['nome']; ?></td>
                <td><?php echo $row['valor']; ?></td>
                <td><?php echo $row['data']; ?></td>
            </tr>
        <?php } ?>
    </tbody>
</table>

<?php
// fechar conexão com o banco de dados
$conn = null;
?>