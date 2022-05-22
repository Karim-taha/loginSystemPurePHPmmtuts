<?php 
include_once 'header.php';
?>


<h1 class="main-title">Log In</h1>

<section class="form">
    <form action="includes/login.inc.php" method="post">
    <input type="text" name="name" placeholder="Name / Email"><br><br>
    <input type="password" name="password" placeholder="Password"><br><br>
    <button type="submit" name="login">Login</button>
    </form>
    <?php 
// Error Messages : 

if(isset($_GET['error'])){
        if($_GET['error'] == "emptyInput"){
            echo "<p>Please fill in all fields.</p>";
        } elseif($_GET['error'] == "wrongusername"){
            echo "<p>Username wrong or not exists.</p>";
        } elseif($_GET['error'] == "invalidEmail"){
            echo "<p>Invalid Email.</p>";
        } elseif($_GET['error'] == "wrongpassword"){
            echo "<p>Wrong Password.</p>";
        }
}
?>
</section>

<?php 
include_once 'footer.php';
?>