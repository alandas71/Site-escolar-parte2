<?php
class  TurmasModel extends pdoModel
{

    public function createTurmas($turma, $turno, $vagas)
    {
        $query = ("INSERT INTO turmas (turma, turno, vagas) VALUES (:turma, :turno, :vagas)");
        $stmt =  $this->conn->prepare($query);
        $stmt->bindParam(':turma', $turma);
        $stmt->bindParam(':turno', $turno);
        $stmt->bindParam(':vagas', $vagas);
        $stmt->execute();
    }

    public function readTurmas()
    {
        $pdo = "SELECT * FROM turmas";
        $result = $this->conn->query($pdo);

        return $result;
    }

    public function readTurma1($id_professor)
    {
        $sql_turma1 = "SELECT * FROM users WHERE tipo = 'aluno' AND turma1 IN (SELECT turma1 FROM users WHERE tipo = 'prof' AND id = :id_professor) ORDER BY nome ASC";
        $alunos_turma1 = $this->conn->prepare($sql_turma1);
        $alunos_turma1->bindParam(':id_professor', $id_professor);
        $alunos_turma1->execute();

        return $alunos_turma1;
    }

    public function readTurma2($id_professor)
    {
        $sql_turma2 = "SELECT * FROM users WHERE tipo = 'aluno' AND turma2 IN (SELECT turma2 FROM users WHERE tipo = 'prof' AND id = :id_professor) ORDER BY nome ASC";
        $alunos_turma2 = $this->conn->prepare($sql_turma2);
        $alunos_turma2->bindParam(':id_professor', $id_professor);
        $alunos_turma2->execute();

        return $alunos_turma2;
    }

    public function updateTurmas($turma_coluna, $turma, $nome)
    {
        $query = "UPDATE users SET $turma_coluna = :turma WHERE nome = :nome";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':turma', $turma);
        $stmt->bindParam(':nome', $nome);
        $stmt->execute();
    }

    public function deleteTurmas($id_turma)
    {
        $query = "DELETE FROM turmas WHERE id = :id_turma";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id_turma', $id_turma);
        $stmt->execute();
    }

    public function getDistinctUsers()
    {
        $pdo = "SELECT DISTINCT nome FROM users";
        $nomes = $this->conn->prepare($pdo);
        $nomes->execute();

        return $nomes;
    }


    public function getDistinctTurmas()
    {
        $pdo = "SELECT DISTINCT turma FROM turmas";
        $classes = $this->conn->prepare($pdo);
        $classes->execute();

        return $classes;
    }

    public function verifyTurmas($turma, $turno)
    {
        $pdo = "SELECT * FROM turmas WHERE turma = :turma AND turno = :turno";
        $existeTurma = $this->conn->prepare($pdo);
        $existeTurma->bindParam(':turma', $turma);
        $existeTurma->bindParam(':turno', $turno);
        $existeTurma->execute();

        return $existeTurma;
    }

    public function qtAlunosTurma1()
    {
        $pdo_quantidade_turma1 = "SELECT turma1, COUNT(*) as quantidade FROM users WHERE tipo = 'aluno' GROUP BY turma1";
        $result_quantidade_turma1 = $this->conn->query($pdo_quantidade_turma1);

        return $result_quantidade_turma1;
    }

    public function qtAlunosTurma2()
    {
        $pdo_quantidade_turma2 = "SELECT turma2, COUNT(*) as quantidade FROM users WHERE tipo = 'aluno' GROUP BY turma2";
        $result_quantidade_turma2 = $this->conn->query($pdo_quantidade_turma2);

        return $result_quantidade_turma2;
    }
}
