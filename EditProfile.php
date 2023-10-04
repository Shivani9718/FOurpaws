<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="EditProfile.css">
  <title>Profile and Form</title>
</head>
<body>
  <div class="container">
    <div class="profile">
    <?php
   include("connection.php");
   include("functions.php");
  
   
     if (isset($_GET['Username'])) {
       $username = $_GET['Username'];
   
       // SQL query to fetch data based on the username
       $query = "SELECT * FROM pets p JOIN user u on u.Email = p.Email where Username = '$username'";
   
       // Execute the query
       $result = mysqli_query($con, $query);
   
       if ($result) {
           if (mysqli_num_rows($result) > 0) {
               // Fetch and display the data
               while ($row = mysqli_fetch_assoc($result)) {
                echo '<img src="' . $row['Image_path'] . '" alt="Pet Image"><br> ';
                echo "<h3>","<b>","pet_id:  " . $row['pet_id'] . "</b>", "</h3>";
                echo "<br>";
                
                echo "<h3>","<b>","Category:  " . $row['Category'] . "</b>", "</h3>";
                echo "<h3>Breed               :  " . $row['Breed']." </h3> " ,"<br>";
                ?>
               <form action="update_photo.php" method="post" enctype="multipart/form-data">
               <label for="profile_pic">Choose a profile picture:</label>
                <input type="file" id="profile_pic" name="profile_pic" accept="image/*" required><br><br>
            <input type="hidden" name="pet_id" value="<?php echo $row['pet_id'] ?>">
                <button type="submit" name="upload" value="1" class="update-button" onclick="return confirm('Are you sure you want to update your profile?')">Update Photo</button>
  </form>

               <?php
               }
           } else {
               echo "No data found for the given username.";
           }
       }
        else {
           echo "Error in SQL query: " . mysqli_error($con);
       }
    } else {
       echo "No username provided.";
   }

   ?>
   


      
    </div>

    <div class="form">
      <h2>Edit Profile</h2>
      <form action="update.php" method="post">
        <label for="Username">Username</label>
        <input type="text" id="Username" name="Username" required ><br><br>
        <label for="Email">Email:</label>
        <input type="Email" id="Email" name="Email" required><br><br>
        <label for="Weight">Weight:</label>
        <input type="text" id="Weight" name="Weight"><br><br>
        <label for="Vaccinated">Vaccinated</label>
        <input type="text" id="Vaccinated" name="Vaccinated" ><br><br>
        <label for="Age">Age:</label>
        <input type="text" id="Age" name="Age"><br><br>
        <label for="Trained">Trained</label>
        <input type="text" id="Trained" name="Trained" ><br><br>
        
        <button type="submit" name="update" value="1" class="update-button" onclick="return confirm('Are you sure you want to save changes?')">Save Changes</button>
        </form>
        <br>
        <br>
      
        <button onclick="showPopup()">Delete</button>

   <div id="popup" class="popup">
  <div class="popup-content">
    <span class="close" onclick="closePopup()">&times;</span>
    <h2>Confirm Record Deletion</h2>
    <form id="deleteForm"  action ="delete_profile.php" method="post">
      <label for="email">Enter your email to confirm:</label>
      <input type="Email" id="email" name="Email" required>
      <button type="submit" name="delete" value="1" class="delete-button" onclick="return confirm('Are you sure you want to delete your profile?')">Delete Profile</button>
    </form>
  </div>
 </div>

<script src="script.js"></script>
   
    </div>
  </div>
 </body>
 <script>
 function showPopup() {
  document.getElementById('popup').style.display = 'block';
}

function closePopup() {
  document.getElementById('popup').style.display = 'none';
}


</script>
  </html>
