<?php
//This script will handle login
session_start();

// check if the user is already logged in
if(isset($_SESSION['user_name']))
{
    header("location: account.html");
    exit;
}
require_once "connection.php";

$user_name = $password = "";
$err = "";

// if request method is post
if ($_SERVER['REQUEST_METHOD'] == "POST"){
    if(empty(trim($_POST['user_name'])) || empty(trim($_POST['password'])))
    {
        $err = "Please enter username + password";
    }
    else{
        $user_name = trim($_POST['user_name']);
        $password = trim($_POST['password']);
    }


if(empty($err))
{
    $sql = "SELECT * FROM user WHERE Username = '$user_name' Limit 1";
    $stmt = mysqli_prepare($con, $sql);
    mysqli_stmt_bind_param($stmt, "ss", $user_name,$password);
    $param_user_name = $user_name;
    
    
    // Try to execute this statement
    if(mysqli_stmt_execute($stmt)){
        mysqli_stmt_store_result($stmt);
        if(mysqli_stmt_num_rows($stmt) == 1)
                {
                    mysqli_stmt_bind_result($stmt, $id, $user_name, $hashed_password);
                    if(mysqli_stmt_fetch($stmt))
                    {
                        if(password_verify($password, $hashed_password))
                        {
                            // this means the password is corrct. Allow user to login
                            session_start();
                            $_SESSION["user_name"] = $username;
                            $_SESSION["id"] = $id;
                            $_SESSION["loggedin"] = true;

                            //Redirect user to welcome page
                            header("location: welcome.php");
                            
                        }
                    }

                }

    }
}    


}


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="slogin.css">
</head>
<body>
    
    <div class="bg-img">
        <form action="login.php" method="post" class="container">
         
         
            <h1>Login</h1>
          <label for="Username"><b>Username</b></label>
          <input type="text" placeholder="Enter Username" name="user_name" id="user_name" required>
          
         
          <label for="password"><b>Password</b></label>
          <input type="password" placeholder="Enter Password" name="password" id="password" required>
          
          <button type="submit" class="btn">Login</button></a>
          
        </div>
        </form>
        
      </div>
</body>
</html>