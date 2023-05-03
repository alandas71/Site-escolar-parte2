<?php
// configurações de conexão com o banco de dados
include('configImages.php');

if (!isset($_POST['id_aluno']) || $_POST['id_aluno'] === '') {
    echo 'ID do aluno inválido';
    exit;
}

$id_aluno = $_POST['id_aluno'];

$notas = [];
$faltas = [];

// percorre as notas e faltas enviadas pelo formulário
foreach ($_POST as $key => $value) {
    // verifica se é uma nota de alguma matéria
    if (strpos($key, '_nota1') !== false) {
        // extrai o nome da matéria a partir do nome do campo
        $materia = str_replace('_nota1', '', $key);

        // pega os valores das notas e faltas correspondentes, ignorando os valores vazios
        $notas = array_filter([
            $_POST[$key],
            $_POST[str_replace('_nota1', '_nota2', $key)],
            $_POST[str_replace('_nota1', '_nota3', $key)],
            $_POST[str_replace('_nota1', '_nota4', $key)],
        ]);
        $faltas = array_filter([
            $_POST[str_replace('_nota1', '_falta1', $key)],
            $_POST[str_replace('_nota1', '_falta2', $key)],
            $_POST[str_replace('_nota1', '_falta3', $key)],
            $_POST[str_replace('_nota1', '_falta4', $key)],
        ]);

        // calcula a média das notas
        $media = number_format(array_sum($notas) / count($notas), 1);

        // soma as faltas
        $total_faltas = array_sum($faltas);

        if (!empty($notas) && !empty($faltas) && count($notas) == 4) {
            // verifica se a média é maior ou igual a 6 e define o resultado
            $resultado = $media >= 6 ? 'Aprovado' : 'Reprovado';

            // verifica se o aluno tem mais de 50 faltas e define o resultado como 'reprovado' se tiver
            if ($total_faltas > 50) {
                $resultado = 'Reprovado';
            }
        } else {
            $resultado = null;
        }


        // verifica se já existe um registro para o aluno e matéria correspondentes
        $sql = "SELECT * FROM notas WHERE id_aluno = ? AND materia = ?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$id_aluno, $materia]);
        $row = $stmt->fetch();

        // se já existe um registro, atualiza as colunas
        if ($row) {
            $sql = "UPDATE notas SET nota1 = ?, nota2 = ?, nota3 = ?, nota4 = ?, falta1 = ?, falta2 = ?, falta3 = ?, falta4 = ?, faltas = ?, media = ?, resultado = ? WHERE id_aluno = ? AND materia = ?";
            $stmt = $conn->prepare($sql);
            $stmt->execute([$notas[0], $notas[1], $notas[2], $notas[3], $faltas[0], $faltas[1], $faltas[2], $faltas[3], $total_faltas, $media, $resultado, $id_aluno, $materia]);
        }
        // se não existe um registro, insere um novo
        else {
            $sql = "INSERT INTO notas (id_aluno, materia, nota1, nota2, nota3, nota4, falta1, falta2, falta3, falta4, faltas, media, resultado) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->execute([$id_aluno, $materia, $notas[0], $notas[1], $notas[2], $notas[3], $faltas[0], $faltas[1], $faltas[2], $faltas[3], $total_faltas, $media, $resultado]);
        }

        // redireciona de volta para a página de notas
        header('Location: portal_prof.php?view=mturmas');
    }
}
