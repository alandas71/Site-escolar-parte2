<?php
class NotasModel extends pdoModel
{
    private $id_aluno;

    public function existeNota($id_aluno, $materia)
    {
        $sql = "SELECT * FROM notas WHERE id_aluno = ? AND materia = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$this->id_aluno, $materia]);
        $existe = $stmt->fetch();

        return $existe;
    }

    public function exiteAtualiza($notas, $faltas, $total_faltas, $media, $resultado, $id_aluno, $materia)
    {
        $sql = "UPDATE notas SET nota1 = ?, nota2 = ?, nota3 = ?, nota4 = ?, falta1 = ?, falta2 = ?, falta3 = ?, falta4 = ?, faltas = ?, media = ?, resultado = ? WHERE id_aluno = ? AND materia = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$notas[0], $notas[1], $notas[2], $notas[3], $faltas[0], $faltas[1], $faltas[2], $faltas[3], $total_faltas, $media, $resultado, $id_aluno, $materia]);
    }

    public function naoExisteInsere($id_aluno, $materia, $notas, $faltas, $total_faltas, $media, $resultado)
    {
        $sql = "INSERT INTO notas (id_aluno, materia, nota1, nota2, nota3, nota4, falta1, falta2, falta3, falta4, faltas, media, resultado) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$id_aluno, $materia, $notas[0], $notas[1], $notas[2], $notas[3], $faltas[0], $faltas[1], $faltas[2], $faltas[3], $total_faltas, $media, $resultado]);
    }

    public function readNotas($id_aluno)
    {
        $query = "SELECT materia, nota1, nota2, nota3, nota4, falta1, falta2, falta3, falta4, faltas, media, resultado FROM notas WHERE id_aluno = :id_aluno";
        $result = $this->conn->prepare($query);
        $result->bindParam(':id_aluno', $id_aluno);
        $result->execute();

        return $result;
    }

    public function setIdAluno($id)
    {
        $this->id_aluno = $id;
    }

    public function getIdAluno()
    {
        return $this->id_aluno;
    }

    public function readAlunoName()
    {
        $sql = "SELECT nome, id FROM users WHERE id = :id_aluno";
        $nome = $this->conn->prepare($sql);
        $nome->bindParam(':id_aluno', $this->id_aluno);
        $nome->execute();

        $row = $nome->fetch(PDO::FETCH_ASSOC);

        return $row;
    }
}
