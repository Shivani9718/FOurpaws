<?php



  if ($_SERVER['REQUEST_METHOD'] == "POST") {
     if (!empty($_POST['user_name']) && !empty($_POST['password'])) {
        $user_name = trim($_POST['user_name']);
        $password = $_POST['password'];

        $query = "SELECT * FROM user WHERE Username =  '$user_name' LIMIT 1";
       
       
        $result = mysqli_query($con, $query);

        if ($result && mysqli_num_rows($result) ==1) {
            $user_data = mysqli_fetch_assoc($result);

            // Display the fetched user data and password hash for debugging
            echo "Fetched User Data: ";
            print_r($user_data);
            echo "<br> entered paassword :". $_POST['password']."<br>";
            echo "<br>Hashed Password from Database: " . $user_data['Password'] . "<br>";
            echo " hashed_password_from_db" . $user_data['Password']."<br>";

            // Password verification using password_verify()
            if (password_verify($password , $user_data['Password'])) {
                echo "Password is correct!";
                echo "LOGGED IN";
                header("Location: account.html");
                    die;
            } else{
                echo "not matched";
            } 
        } else {
            echo "User not found!";
        }

       
    } else {
        echo "Please enter username and password.";
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
        <form action="profile.php" method="post" class="container">
         
         
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
