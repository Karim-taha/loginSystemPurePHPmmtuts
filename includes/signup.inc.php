<?php 


if(isset($_POST["submit"])){

$name = $_POST["name"];
$email = $_POST["email"];
$username = $_POST["username"];
$password = $_POST["password"];
$repeatpassword = $_POST["repeatpassword"];

require_once 'db.php';
require_once 'functions.php';


if(emptyInputSignup($name, $email, $username, $password, $repeatpassword) !== false){
    header("Location: ../signup.php?error=emptyInput");
    exit();
}
if(invalidUsername($username) !== false){
    header("Location: ../signup.php?error=invalidUsername");
    exit();
}
if(invalidEmail($email) !== false){
    header("Location: ../signup.php?error=invalidEmail");
    exit();
}
if(passwordMatch($password, $repeatpassword) !== false){
    header("Location: ../signup.php?error=passwordnotmatch");
    exit();
}
if(usernameExists($conn, $username, $email) !== false){
    header("Location: ../signup.php?error=usernametaken");
    exit();
}

createUser($conn, $name, $email, $username, $password);


}else{
    header("Location: ../signup.php");
    exit();
}










