<?php 

if(isset($_POST['login'])){

$username = $_POST['name'];
$password = $_POST['password'];

require_once 'db.php';
require_once 'functions.php';

if(emptyInputLogin( $username, $password) !== false){
    header("Location: ../login.php?error=emptyInput");
    exit();
}

loginUser($conn, $username, $password);

} else{
    header("Location: ../login.php");
    exit();
}







