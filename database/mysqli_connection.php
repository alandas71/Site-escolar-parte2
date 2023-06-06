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

global $mysqli;

$mysqli = new mysqli($config['dbHost'], $config['dbUserName'], $config['dbPassword'], $config['dbname']);


// if ($mysqli->connect_errno) {
//     echo "erro";
// } else {
//     echo "conexão efetuada com sucesso";
// }
