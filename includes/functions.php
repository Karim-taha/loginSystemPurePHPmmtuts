<?php 

////// Sign up : 
// Check if any input is empty :
function emptyInputSignup($name, $email, $username, $password, $repeatpassword){

$result;

if(empty($name) || empty($email) || empty($username) || empty($password) || empty($repeatpassword)){

    $result = true;
} else {
    $result = false;
}

return $result;

}

// Check if username is invalid : 
function invalidUsername($username){

    $result;
    
    if(!preg_match("/^[a-zA-Z0-9]*$/", $username)){
    
        $result = true;
    } else {
        $result = false;
    }
    
    return $result;
    
    }

// Check if email is invalid : 
    function invalidEmail($email){

        $result;
        
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        
            $result = true;
        } else {
            $result = false;
        }
        
        return $result;
    }

    // Check if password and passwordRepeat are the same : 
        function passwordMatch($password, $repeatpassword){

            $result;
            
            if($password != $repeatpassword){
            
                $result = true;
            } else {
                $result = false;
            }
            
            return $result;
        }


// Check if username exists : 
    function usernameExists($conn, $username, $email){

        $sql = "SELECT * FROM users WHERE userUsername = ? or userEmail = ? ; ";
        $stmt = mysqli_stmt_init($conn);   // Open connection to database & Prevent SQL Injection.

        if(!mysqli_stmt_prepare($stmt, $sql)){
            header("Location: ../signup.php?error=stmtfailed");
    exit();
        }
        mysqli_stmt_bind_param($stmt, "ss", $username, $email);  // Take the open connection and send the username & Email.
        mysqli_stmt_execute($stmt);  

        $resultData = mysqli_stmt_get_result($stmt);   // Get the result if there is a user with this username & email or not.

        if($row = mysqli_fetch_assoc($resultData)){
            // If there is data with this this username or email get all the row to use it in Login function.
            return $row;
        } else{
            // If there is no data with this username or email return false so the function createUser() start in signup.inc.php .
            $result = false;
            return $result;
        }

        mysqli_stmt_close($stmt);  // Close the connection.
    }


    // Create a new user : 
        function createUser($conn, $name, $email, $username, $password){

            $sql = "INSERT INTO users (userName, userEmail, userUsername, userPassword) VALUES (? , ? , ? , ? ) ; ";
            $stmt = mysqli_stmt_init($conn);   // Open connection to database & Prevent SQL Injection.
    
            if(!mysqli_stmt_prepare($stmt, $sql)){
                header("Location: ../signup.php?error=stmtfailed");
        exit();
            }

            $hasedPassword = password_hash($password, PASSWORD_DEFAULT);   // Hashing the password.

            mysqli_stmt_bind_param($stmt, "ssss", $name, $email, $username, $hasedPassword);  // Take the open connection and send the username & Email.
            mysqli_stmt_execute($stmt);  
            mysqli_stmt_close($stmt);  // Close the connection.
            header("Location: ../signup.php?error=none");
            exit();
        }




        ////// Log In : 
// Check if any input is empty :
function emptyInputLogin($username, $password){

    $result;
    
    if(empty($username) || empty($password)){
    
        $result = true;
    } else {
        $result = false;
    }
    
    return $result;
    
    }

    // Login the user : 
    function loginUser($conn, $username, $password){

        // Check if the username exists indeed : 
            $usernameExists = usernameExists($conn, $username, $username);

            if($usernameExists === false){
                header("Location: ../login.php?error=wrongusername");
                exit();
            }

            $passwordHashed = $usernameExists['userPassword'];
            $checkPassword = password_verify($password, $passwordHashed);

            if($checkPassword === false){
                header("Location: ../login.php?error=wrongpassword");
                exit();
            } elseif($checkPassword === true){
                session_start();
                $_SESSION['userId'] = $usernameExists['userId'];
                $_SESSION['userUsername'] = $usernameExists['userUsername'];
                header("Location: ../index.php");
                exit();
            }

    }