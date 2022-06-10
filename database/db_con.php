<?php
session_start();

$host = "localhost";
$user = "root";
$pass = "";
$base = "up";


$connect = mysqli_connect($host,$user,$pass,$base);

if(mysqli_connect_error() != null){
    echo "ошибка базы данных";
}

?>