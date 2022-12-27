<?php

require_once(__DIR__ . '/../conf.php');

# init database connection as PDO
$connection = new \PDO('mysql:host=' . $conf['database']['host'] . ';dbname=' . $conf['database']['name'] 
    . ';charset=' . $conf['database']['charset'] . ';port=' . $conf['database']['port'],
    $conf['database']['username'], $conf['database']['password'], $conf['database']['options']);