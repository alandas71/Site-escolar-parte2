<?php
class Conexao
{
    private $dbHost = 'localhost';
    private $dbUserName = 'root';
    private $dbPassword = '';
    private $dbName = 'banco-dados';

    public function conectar()
    {
        try {
            $conn = new PDO("mysql:host={$this->dbHost};dbname={$this->dbName}", $this->dbUserName, $this->dbPassword);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $erro) {
            //echo "Ocorreu um erro de conn: {$erro->getMessage()}";
            $conn = null;
        }

        return $conn;
    }
}
