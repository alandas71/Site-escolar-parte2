<?php

$dbHost = 'localhost';
$dbUserName = 'root';
$dbPassword = '';
$dbName = 'banco-dados';

try {
    $conn = new PDO("mysql:host=$dbHost;dbname=" . $dbName, $dbUserName, $dbPassword);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $erro) {
    //echo "Ocorreu um erro de conn: {$erro->getMessage()}";
    $conn = null;
}
