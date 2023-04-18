<?php

$dbHost = 'localhost';
$dbUserName = 'root';
$dbPassword = '';
$dbName = 'banco-dados';

//$conexao = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

$conn = new PDO("mysql:host=$dbHost;dbname=" . $dbName, $dbUserName, $dbPassword);

    //  if($conexao->connect_errno){
    //     echo "erro";
    // }
    // else{
    //     echo "conexão efetuada com sucesso";
    // }
