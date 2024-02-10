<?php


$dsn='mysql:host=localhost;dbname=q2sdfdb';

$dbUser='root';
$dbUserPassword='';

try {
    $connection = new PDO($dsn,$dbUser,$dbUserPassword);
}catch (PDOException $exception){
    echo $exception->getMessage();
}

