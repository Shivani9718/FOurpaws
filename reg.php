<?php
session_start();

include("connection.php");
include("functions.php");

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    // Retrieve form data 
    $password = $_POST['password'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $user_name = $_POST['user_name'];
    $email = $_POST['email'];
    $phonenumber = $_POST['phonenumber'];

     if (!empty($user_name) && !empty($password) && !is_numeric($user_name)){

        // Generate a user ID
        $user_id = random_num(8);
        $hashed_password=password_hash($password, PASSWORD_DEFAULT);
        $query ="INSERT INTO user (User_Id,  First_Name, Last_Name,Username, Email, PhoneNumber, Password) VALUES ('$user_id','$firstname','$lastname','$user_name','$email','$phonenumber','$hashed_password')";
       
        mysqli_query($con, $query);

        header("Location: login1.php");
        die;
        
    }
     else {
        echo "Please enter some valid information!";
     }
}
    ?>
    <!DOCTYPE html>
<html>
<head>
	<title>Signup</title>
</head>
<body>

	<style type="text/css">
	
	

	#box{

		background-color: grey;
		margin: auto;
		width: 300px;
		padding: 20px;
	}

	</style>

 <!DOCTYPE html>
 <html lang="en">
 <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="signup.css">
 </head>
 <body>
    <div class="bg-img">
		
    <form  method="post" class="container">
     
     
        <h1>Sign-up</h1>
      <label for="Username"><b>First Name</b></label>
      <input type="text" placeholder="Enter First Name" name="firstname" id="firstname" required>
      <label for="Username"><b>Last Name</b></label>
      <input type="text" placeholder="Enter Last Name" name="lastname" id="lastname"required>
      <label for="email"><b>Email</b></label>
      <input type="text" placeholder="Enter Email" name="email" id="email" required>
      <label for="phonenumber"><b>Phone Number</b></label>
      <input type="text" placeholder="Enter PhoneNumber" name="phonenumber" id="phonenumber" required>
  
      <label for="username"><b>Username</b></label>
      <input type="text" placeholder="create username" name="user_name" id="user_name" required>
      
      <label for="password"><b>Password</b></label>
      <input type="password" placeholder="Enter Password" name="password" id="password" required>
      <a href="new.php">
      <button type="submit" class="btn">Submit</button></a>
      
     </div>
    </form>

    
  </div>
    
</body>
</html>
</body>
</html>