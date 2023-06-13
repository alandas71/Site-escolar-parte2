<?php

class EstudantesModel extends pdoModel
{
    public function createAluno($nome, $email, $senha, $turma1, $turma2)
    {
        $pdo = "INSERT INTO users (nome, email, senha, tipo, turma1, turma2) VALUES (:nome, :email, :senha, 'aluno', :turma1, :turma2)";
        $stmt = $this->conn->prepare($pdo);
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':senha', $senha);
        $stmt->bindParam(':turma1', $turma1);
        $stmt->bindParam(':turma2', $turma2);
        $stmt->execute();
    }

    public function readTurmas()
    {
        $pdo_turmas = "SELECT DISTINCT turma FROM turmas";
        $result_turmas = $this->conn->prepare($pdo_turmas);
        $result_turmas->execute();

        return $result_turmas;
    }

    public function readTurma1()
    {
        $pdo_turma1 = "SELECT * FROM users WHERE tipo = 'aluno' AND turma1 IS NOT NULL ORDER BY nome ASC";
        $result_turma1 = $this->conn->prepare($pdo_turma1);
        $result_turma1->execute();

        return $result_turma1;
    }

    public function readTurma2()
    {
        $pdo_turma2 = "SELECT * FROM users WHERE tipo = 'aluno' AND turma2 IS NOT NULL ORDER BY nome ASC";
        $result_turma2 =  $this->conn->prepare($pdo_turma2);
        $result_turma2->execute();

        return $result_turma2;
    }

    public function readAlunoPorId($id)
    {
        $pdo = "SELECT nome, turma1, turma2 FROM users WHERE id = :id";
        $result = $this->conn->prepare($pdo);
        $result->bindValue(':id', $id);
        $result->execute();

        $row = $result->fetch(PDO::FETCH_ASSOC);

        return $row;
    }

    public function deleteAluno($id)
    {
        $pdo_excluir = "DELETE FROM users WHERE id = :id";
        $stmt = $this->conn->prepare($pdo_excluir);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
    }
}
