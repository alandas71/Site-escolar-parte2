<?php
class CountModel extends Model
{
    public function getCountAlunos()
    {
        $sql = "SELECT COUNT(*) FROM users WHERE tipo = 'aluno'";
        $count = $this->conn->query($sql)->fetchColumn();

        return $count;
    }

    public function getCountProfessor()
    {
        $sql2 = "SELECT COUNT(*) FROM users WHERE tipo = 'prof'";
        $count2 = $this->conn->query($sql2)->fetchColumn();

        return $count2;
    }

    public function getCountTurmas()
    {
        $sql3 = "SELECT COUNT(id) FROM turmas";
        $count3 = $this->conn->query($sql3)->fetchColumn();

        return $count3;
    }

    public function getQtalunosPorTurma()
    {
        $sql = "SELECT turma1, turma2 FROM users WHERE tipo = 'aluno'";
        $result = $this->conn->query($sql);
        $turmas = array();

        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            if (!empty($row['turma1'])) {
                $turmas[] = $row['turma1'];
            }
            if (!empty($row['turma2'])) {
                $turmas[] = $row['turma2'];
            }
        }

        $frequencias = array_count_values($turmas);

        return $frequencias;
    }
}
