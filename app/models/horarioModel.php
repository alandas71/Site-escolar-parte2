<?php
class HorarioModel extends Model
{

    public function getTurmas()
    {
        $stmt = $this->conn->query('SELECT DISTINCT turma FROM turmas');
        $turmas = $stmt->fetchAll(PDO::FETCH_COLUMN);

        return $turmas;
    }

    public function getTurnos()
    {
        $stmt = $this->conn->query('SELECT DISTINCT turno FROM turmas');
        $turnos = $stmt->fetchAll(PDO::FETCH_COLUMN);

        return $turnos;
    }

    public function getCountHorarios($turma = null, $turno = null)
    {
        $sql_select = "SELECT COUNT(*) FROM horarios WHERE turma = :turma AND turno = :turno";
        $stmt_select = $this->conn->prepare($sql_select);
        $stmt_select->bindParam(':turma', $turma);
        $stmt_select->bindParam(':turno', $turno);
        $stmt_select->execute();
        $count = $stmt_select->fetchColumn();
        $stmt_select->closeCursor();

        return $count;
    }

    public function createHorarios($file_name, $turma, $turno)
    {
        $sql_insert = "INSERT INTO horarios (horario, turma, turno) VALUES (:horario, :turma, :turno)";
        $stmt_insert = $this->conn->prepare($sql_insert);
        $stmt_insert->bindParam(':horario', $file_name);
        $stmt_insert->bindParam(':turma', $turma);
        $stmt_insert->bindParam(':turno', $turno);
        $stmt_insert->execute();
        $stmt_insert->closeCursor();

        return true;
    }

    public function readHorario($turmas)
    {
        $query = "SELECT * FROM horarios WHERE turma IN ('" . implode("', '", $turmas) . "')";
        $resultado = $this->conn->prepare($query);
        $resultado->execute();

        return $resultado;
    }

    public function updateHorarios($file_name, $turma, $turno)
    {
        $sql_update = "UPDATE horarios SET horario = :horario WHERE turma = :turma AND turno = :turno";
        $stmt_update = $this->conn->prepare($sql_update);
        $stmt_update->bindParam(':horario', $file_name);
        $stmt_update->bindParam(':turma', $turma);
        $stmt_update->bindParam(':turno', $turno);
        $stmt_update->execute();
        $stmt_update->closeCursor();

        return true;
    }
}
