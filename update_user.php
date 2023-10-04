<?php
include("connection.php"); 
include("functions.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update'])) {
    $username = $_POST['Username'];
    $Email = $_POST['Email'];
    $Phonenumber = $_POST['Phonenumber'];
    $Password = $_POST['Password'];

    // Hash the password
    $hashedPassword = password_hash($Password, PASSWORD_DEFAULT);

    // Construct the SQL query to update the user's profile
    $query = "UPDATE user
              SET Username = '$username', Email = '$Email', PhoneNumber = '$Phonenumber', Password = '$hashedPassword'
              WHERE Username = '$username'";

    // Execute the query
    if (mysqli_query($con, $query)) {
        echo "Profile updated successfully!";
    } else {
        echo "Error updating profile: " . mysqli_error($con);
    }
} else {
    echo "Invalid request.";
}
?>
