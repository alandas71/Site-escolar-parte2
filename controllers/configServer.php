<?php

$dbHost = 'localhost';
$dbUsername = 'root';
$dbPassword = '';
$dbName = 'banco-dados';

$conn = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

//$conn = new PDO("mysql:host=$dbHost;dbname=" . $dbName, $dbUsername, $dbPassword);

    //  if($conexao->connect_errno){
    //     echo "erro";
    // }
    // else{
    //     echo "conexão efetuada com sucesso";
    // }
