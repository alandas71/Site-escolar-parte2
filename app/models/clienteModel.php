<?php
class ClienteModel extends pdoModel
{
    public function readFoto($user_id)
    {
        $stmt = $this->conn->prepare("SELECT foto FROM users WHERE id = ?");
        $stmt->execute(array($user_id));
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        return $row;
    }

    public function updateFoto($fileName, $user_id)
    {
        $stmt = $this->conn->prepare("UPDATE users SET foto = :foto WHERE id = :user_id");
        $stmt->bindParam(':foto', $fileName);
        $stmt->bindParam(':user_id', $user_id);
        $stmt->execute();
    }
}