<?php 
include("connection.php");
include("functions.php");



 session_start(); 


//$_SESSION['user_id'] = $user_id;  // Set this after a successful login

//include("connection.php");
//include("functions.php");


// Check if the form was submitted
if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_SESSION['user_id'])) {
   

    // Retrieve form data
    $petname = $_POST['petname'];
    $email = $_POST['email'];
    $phonenumber = $_POST['phonenumber'];
    $category = $_POST['Category'];
    $breed = $_POST['Breed'];
    $gender = $_POST['gender'];
    $weight = $_POST['weight'];
    $vaccinated = isset($_POST['vaccination']) ? $_POST['vaccination'] : '';
    $trained = isset($_POST['trained']) ? $_POST['trained'] : '';
    $Age= $_POST['Age'];
    $targetDir = "uploads/";
    $targetFile = $targetDir . basename($_FILES["image"]["name"]);
    
    if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile)) {
        $imagePath = $targetFile;
        $pet_id = uniqid(20);
        $user_id_query = "SELECT User_ID FROM user WHERE Email = '$email'";
        $user_id_result = $con->query($user_id_query);

        if ($user_id_result) {
            $row = $user_id_result->fetch_assoc();
            $user_id = $row['User_ID'];
        // Insert data into the database
        $sql = "INSERT INTO pets(pet_id,Petname,Age, Email, User_ID Phonenumber, Category, Breed, Gender, Weight_pet, Vaccinated, Trained, Image_path)
                VALUES ('$pet_id','$petname', '$Age','$email', '$user_id' ,'$phonenumber', '$category', '$breed', '$gender', '$weight', '$vaccinated', '$trained', '$imagePath')";
        
        if ($con->query($sql) === TRUE) {
            echo "Record added successfully.";
        } else {
            echo "Error: " . $sql . "<br>" . $con->error;
        }
    }
 } else {
        echo "Failed to upload image.";
    }

    $con->close();
}
?>

    

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FourPaws</title>
    <link rel="stylesheet" href="AddBtn.css">
</head>

<body>
<script>
        // JavaScript function to populate the second select based on the first select
        function populateOptions() {
            var Category= document.getElementById("Category");
            var Breed = document.getElementById("Breed");

            // Clear previous options
            Breed.innerHTML = "";

            // Get the selected value from the first select
            var selectedValue = Category.value;

            // Populate options in the second select based on the selected value
            if (selectedValue === "Cat") {
                var Cats = ["Persian", "Siamese", "Maine Coon", "Sphynx"];
                populateSelectOptions(Breed, Cats);
            } else if (selectedValue === "Dog") {
                var Dog = ["Indian Pariah Dog ",
    "Labrador Retriever",
    "German Shepherd",
    "Golden Retriever",
    "Pomeranian",
    "Beagle",
    "Dachshund",
    "Rajapalayam",
    "Indian Spitz",
    "Mudhol Hound",
    "Bully Kutta",
    "Great Dane"
];
                populateSelectOptions(Breed, Dog);
            }
        }

        // Function to populate options in a select element
        function populateSelectOptions(selectElement, optionsArray) {
            for (var i = 0; i < optionsArray.length; i++) {
                var option = document.createElement("option");
                option.value = optionsArray[i];
                option.textContent = optionsArray[i];
                selectElement.appendChild(option);
            }
        }
    </script>
    <div class="bg-img">


    <form action="" method="post" enctype="multipart/form-data" class="container">
     
     
        <h1>ADD DETAILS</h1>
      <label for="text"><b>Pet Name</b></label>
      <input type="text" placeholder="Enter your Pet Name" name="petname" id="petname" required>
     

      <label for="email"><b>Email</b></label>
      <input type="text" placeholder="Enter Email" name="email" id="email" required>
      <label for="phonenumber"><b>Phone Number</b></label>
      <input type="text" placeholder="Enter PhoneNumber" id="phonenumber" name="phonenumber" required>
      
       <label for="Category"><b>Select Category:</b></label>
    <select id="Category"  name="Category" onchange="populateOptions()">
        <option value="Dog">Dog</option>
        <option value="Cat">Cat</option>
    </select>

    <label for="Breed"><b>Select Breed:</b></label>
    <select id="Breed" name="Breed">
        <!-- Options will be populated dynamically based on the first select -->
    </select>
      <br>
      <label for="gender"><b>Select Gender:</b></label>
        <select id="gender" name="gender">
            <option value="Male">Male</option>
            <option value="Female">Female</option>
            <option value="Other">Other</option>
        </select>
        <br>
      <label for="text"><b>Weight</b></label>
      <input type="text" placeholder="Enter your Pet weight" name="weight" id="weight" required><br>
      <label for="text"><b>Age</b></label>
      <input type="text" placeholder="Enter your Pet Age" name="Age" id="Age" required><br>
       <p><b>Vaccinated:</b></p>
  <input type="radio" id="vccy" name="vaccination" value="YES">
  <label for="vccy">YES</label>
  <input type="radio" id="vccn" name="vaccination" value="NO">
  <label for="vccn">NO</label>
 <br>  
  <p><b>Trained:</b></p>
  
  <input type="radio" id="trny" name="trained" value="YES">
  <label for="trny">YES</label>  
  <input type="radio" id="trnn3" name="trained" value="NO">
  <label for="">NO</label><br>
  <label for="image"  class="image-upload-label"><b>Select an image to upload:</b></label>
  <div class="image-upload-container">
  <input type="file" name="image" id="image" class="image-upload-input"><br>
 </div>
 <br>
  
      <button type="submit" name="addsubmit" class="btn" onclick="return confirm('Successfully Added')">Submit</button>
    </div>
    </form>
    
  </div>
    
</body>
</html>