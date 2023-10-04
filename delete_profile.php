
<?php
include("connection.php");
include("functions.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete'])) {
    // Retrieve parameters using $_POST
   // $username = mysqli_real_escape_string($con, $_POST['Username']);
    $email = mysqli_real_escape_string($con, $_POST['Email']);

    // Construct the SQL query to delete the user's profile
    $query = "DELETE FROM pets WHERE email = '$email'";
    $result = mysqli_query($con, $query);
   
    if (mysqli_query($con, $query)) {
        echo "Profile deleted successfully!";
    } else {
        echo "Error deleting profile: " . mysqli_error($con);
    }
} else {
    echo "Invalid request.";
}
?>
