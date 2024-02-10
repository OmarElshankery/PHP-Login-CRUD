<?php

if (isset($_GET['id'])){
    $id=$_GET['id'];
    require 'connection.php';
    $queryString=$connection->prepare('DELETE FROM users WHERE id=?');
    $queryString->execute([$id]);
    header('Location:allusers.php');
}