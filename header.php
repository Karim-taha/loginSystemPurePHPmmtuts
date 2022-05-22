<?php 
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <nav class="nav">
        <ul class="nav-menu">
            <li class="menu-item"><a class="menu-link" href="index.php">Home</a></li>
            <?php 
                if(isset($_SESSION['userId'])){
                    echo "<li class='menu-item'><a class='menu-link' href='profile.php'>Profile</a></li>";
                    echo "<li class='menu-item'><a class='menu-link' href='includes/logout.inc.php'>Log Out</a></li>";
                }else {
                    echo "<li class='menu-item'><a class='menu-link' href='signup.php'>Sign Up</a></li>";
                    echo "<li class='menu-item'><a class='menu-link' href='login.php'>Log In</a></li>";
                }
            ?>
        </ul>
    </nav>