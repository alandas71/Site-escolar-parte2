<?php
class pdoModel
{
    protected $conn;

    public function __construct()
    {
        $this->conn = $GLOBALS['conn'];
    }
}
