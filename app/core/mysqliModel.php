<?php
class mysqliModel
{
    protected $mysqli;

    public function __construct()
    {
        global $mysqli;
        $this->mysqli = $mysqli;
    }
}
