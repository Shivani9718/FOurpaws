<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="profile.css">
  <title>User Profile</title>
</head>
<body>
  
  
  
 
 <?php
    include("connection.php");
    include("functions.php");

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Retrieve username and password from the POST request
        $username = mysqli_real_escape_string($con, $_POST['user_name']);
        $password = mysqli_real_escape_string($con, $_POST['password']);

                  
            $query = "SELECT * FROM user u JOIN pets p ON u.Email = p.Email WHERE u.Username = '$username' LIMIT 1";  
            $result = mysqli_query($con, $query);

            $query1 = "SELECT * FROM user WHERE Username = '$username' LIMIT 1";  
            $result1 = mysqli_query($con, $query1);

            if ($result && mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    
                
                    echo '<div class="profile">';
                    
                    
                    echo '<img src="' . $row['Image_path'] . '" alt="Pet Image">';
                    echo "<br>";
                    
                    echo "<h1>" . $row['Petname'] . "</b></h1>";
                   
                    echo "<h3>Breed: " . $row['Breed'] . "</h3>";
                    echo "<h3>Owner : " . $row['Username'] . "</b></h3>";
                    ?>
                    <form action="EditProfile.php" method="get" >
         
                          <input type="hidden" name="Username" value="<?php echo $row['Username'] ?> ">
                        <button type="submit">Profile</button>
                </form>
                    <form action="new.php" method="get" >
         
          
                    <input type="hidden" name="Username" value="<?php echo $row['Username'] ?> ">
                      <button type="submit">Home</button>
                      </form>
                </div>
                      <?php 
            }
        }
                  else if($result1 && mysqli_num_rows($result1) > 0) {
                    while ($row = mysqli_fetch_assoc($result1)) {
                   echo '<div class="profile">';
               
               
              
               
                  echo "<h1>" . $row['Username'] . "</b></h1>";
              
               echo "<h3>Email: " . $row['Email'] . "</h3>";
               ?>
                 <form action="UserProfile.php" method="get" >
         
                          <input type="hidden" name="Username" value="<?php echo $row['Username'] ?> ">
                        <button type="submit">Profile</button>
                </form> 
                    <form action="new.php" method="get" >
         
          
                    <input type="hidden" name="Username" value="<?php echo $row['Username'] ?> ">
                      <button type="submit">Home</button>
                      </form>
                    </div>
               <?php
       }
    }
       else {
        echo "  Invalid username or Password";
       }
                  ?> 
                  
                   
                    <?php
                }
          
         else {
            echo "Login failed. Please try again.";
        }
    
?>

    

 
</body>
</html>
