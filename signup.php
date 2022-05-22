<?php 
include_once 'header.php';
?>


<h1 class="main-title">Sign Up</h1>

<section class="form">
    <form action="includes/signup.inc.php" method="post">
    <input type="text" name="name" placeholder="Full Name"><br><br>
    <input type="email" name="email" placeholder="Email"><br><br>
    <input type="text" name="username" placeholder="Username"><br><br>
    <input type="password" name="password" placeholder="Password"><br><br>
    <input type="password" name="repeatpassword" placeholder="Repeat Password"><br><br>
    <button type="submit" name="submit">Sign Up</button>
    </form>
    <?php 
// Error Messages : 

if(isset($_GET['error'])){
        if($_GET['error'] == "emptyInput"){
            echo "<p>Please fill in all fields.</p>";
        } elseif($_GET['error'] == "invalidUsername"){
            echo "<p>Invalid Username.</p>";
        } elseif($_GET['error'] == "invalidEmail"){
            echo "<p>Invalid Email.</p>";
        } elseif($_GET['error'] == "passwordnotmatch"){
            echo "<p>Passwords Don't match.</p>";
        } elseif($_GET['error'] == "usernametaken"){
            echo "<p>This username taken.</p>";
        } elseif($_GET['error'] == "none"){
            echo "<p>You signed up successfully.</p>";
        }
}
?>
</section>




<?php 
include_once 'footer.php';
?>