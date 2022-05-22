<?php 
    include_once 'header.php';
?>


    <h1 class="main-title">This is Home Page</h1>
    <?php 
        if(isset($_SESSION['userId'])){

            echo "<h2 class='main-title' style='color:red'; >" . $_SESSION['userUsername'] . "</h2>";


        }
    ?>

<?php 
    include_once 'footer.php';
?>

    