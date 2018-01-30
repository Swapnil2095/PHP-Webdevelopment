<?php

$server = 'localhost';
$user = 'Valeed';
$password = 'valeed123';
$db = 'school';

$conn = mysqli_connect($server,$user,$password,$db);

if(!$conn){
    die("Connection Failed:". mysqli_connect_error());
}

?>