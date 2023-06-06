<?php
require('environment.php');

$config = array();

if (ENVIRONMENT == 'development') {
    define("BASE_URL", "http://192.168.0.150/school/");
    $config['dbname'] = 'banco-dados';
    $config['dbHost'] = 'localhost';
    $config['dbUserName'] = 'root';
    $config['dbPassword'] = '';
} else {
    define("BASE_URL", "");
    $config['dbname'] = '';
    $config['dbHost'] = '';
    $config['dbUserName'] = '';
    $config['dbPassword'] = '';
}

global $conn;

$dsn = "mysql:dbname=" . $config['dbname'] . ";host=" . $config['dbHost'];

try {
    $conn = new PDO($dsn, $config['dbUserName'], $config['dbPassword']);
} catch (PDOException $e) {
    echo "erro: " . $e->getMessage();
}
