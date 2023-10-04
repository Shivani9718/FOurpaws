<?php
include("connection.php"); // Include your database connection
if (isset($_GET['Breed'])) {
    $searchBreed = $_GET['breed'];
 $sql = "SELECT * FROM pets WHERE Breed LIKE '%$searchBreed%'";
  $result = $con->query($sql);

 if ($result->num_rows > 0) {
    // Output data of each row
    while ($row = $result->fetch_assoc()) {
        echo "Pet Name: " . $row['Petname'] . "<br>";
        echo "Email: " . $row['Email'] . "<br>";
        echo '<img src="' . $row['Image_path'] . '" alt="' . $row['Petname'] . '">';
        // Display other pet details as needed
        echo "<br>";
    }
} else {
    echo "No pets found.";
}
}

$con->close();
?>

