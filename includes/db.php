<?php 

$serverName = "localhost";
$dBUsername = "root";
$dBPassword = "";
$dbName = "loginsystemmtutes";

$conn = mysqli_connect($serverName, $dBUsername, $dBPassword, $dbName);

if(!$conn){
    die("CONNECTION FAILED" . mysqli_connect_error());
}















