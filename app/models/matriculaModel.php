<?php
class MatriculaModel extends pdoModel
{
    public function getVagas()
    {
        $query = "SELECT vaga FROM vagas";
        $vagas = $this->conn->query($query);

        return $vagas;
    }

    public function createVagas($nova_vaga)
    {
        $sql = "INSERT INTO vagas (vaga) VALUES ('$nova_vaga')";
        $this->conn->query($sql);
    }

    public function deleteVagas($excluir_vaga)
    {
        $sql = "DELETE FROM vagas WHERE vaga = '$excluir_vaga'";
        $this->conn->query($sql);
    }

    public function createAluno($email, $nome, $turno, $turma)
    {
        $num_aleatorio = str_pad(rand(0, 9999), 4, '0', STR_PAD_LEFT);

        if ($turno == 'Matutino') {
            $sql = "INSERT INTO users (email, senha, nome, tipo, adm, turma1) VALUES (:email, CONCAT('ceai', :num_aleatorio), :nome, 'aluno', 0, :turma)";
            $result = $this->conn->prepare($sql);
            $result->bindParam(':email', $email);
            $result->bindParam(':num_aleatorio', $num_aleatorio);
            $result->bindParam(':nome', $nome);
            $result->bindParam(':turma', $turma);
            $result->execute();
        } else if ($turno == 'Vespertino') {
            $sql = "INSERT INTO users (email, senha, nome, tipo, adm, turma2) VALUES (:email, CONCAT('ceai', :num_aleatorio), :nome, 'aluno', 0, :turma)";
            $result = $this->conn->prepare($sql);
            $result->bindParam(':email', $email);
            $result->bindParam(':num_aleatorio', $num_aleatorio);
            $result->bindParam(':nome', $nome);
            $result->bindParam(':turma', $turma);
            $result->execute();
        }
    }

    public function readMatriculas()
    {
        $sql = "SELECT * FROM matricula";
        $matriculas = $this->conn->query($sql);

        return $matriculas;
    }

    public function deleteMatriculas($id)
    {
        $sql = "DELETE FROM matricula WHERE id = :id";
        $result = $this->conn->prepare($sql);
        $result->bindParam(':id', $id);
        $result->execute();
    }

    public function getEmail()
    {
        $sql = "SELECT users.email FROM users INNER JOIN matricula ON users.email = matricula.email1 COLLATE utf8mb4_unicode_ci";
        $emails = $this->conn->prepare($sql);
        $emails->execute();

        return $emails;
    }
}
