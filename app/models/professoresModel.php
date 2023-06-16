<?php
class ProfessoresModel extends Model
{
    public function createProf($nome, $email, $senha, $turma1, $turma2)
    {
        $pdo = "INSERT INTO users (nome, email, senha, tipo, turma1, turma2) VALUES (:nome, :email, :senha, 'prof', :turma1, :turma2)";
        $stmt = $this->conn->prepare($pdo);
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':senha', $senha);
        $stmt->bindParam(':turma1', $turma1);
        $stmt->bindParam(':turma2', $turma2);
        $stmt->execute();

        return true;
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
        $pdo_turma1 = "SELECT * FROM users WHERE tipo = 'prof' AND turma1 IS NOT NULL";
        $result_turma1 = $this->conn->prepare($pdo_turma1);
        $result_turma1->execute();

        return $result_turma1;
    }

    public function readTurma2()
    {
        $pdo_turma2 = "SELECT * FROM users WHERE tipo = 'prof' AND turma2 IS NOT NULL";
        $result_turma2 = $this->conn->prepare($pdo_turma2);
        $result_turma2->execute();

        return $result_turma2;
    }

    public function deleteProf($id)
    {
        $pdo_excluir = "DELETE FROM users WHERE id = :id";
        $stmt = $this->conn->prepare($pdo_excluir);
        $stmt->bindParam(':id', $id);
        $stmt->execute();

        return true;
    }
}
