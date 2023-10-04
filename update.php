<?php

include("connection.php"); 
include("functions.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update'])) {
    
     $username = $_POST['Username'];
     $Email = $_POST['Email'];
     $Vaccinated = $_POST['Vaccinated'];
     $Age = $_POST['Age'];
     $Trained = $_POST['Trained'];
     $Weight = $_POST['Weight'];

     // Construct the SQL query to update the user's profile
     $query = "UPDATE pets p
     JOIN user u  ON u.Email = p.Email
     SET p.Vaccinated = '$Vaccinated' ,p.Weight_pet ='$Weight',p.Trained='$Trained' ,p.Age ='$Age'
     WHERE u.Username = '$username'";

    // Execute the query
    if (mysqli_query($con, $query)) {
        echo "Profile updated successfully!";
    } else {
        echo "Error updating profile: " . mysqli_error($con);
    }
}

 else {
    echo "Invalid request.";
}

?>