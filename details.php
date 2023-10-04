<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="details.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Displaypets</title>
  
</head>
<body>
    
<div class="topnav">
 <p>Uniting Hearts</p>
  <h1>FOURPAWS</h1>
  <img src="logo.jpg"></img>
 
   <div class ="element">
  
            <a href ="https://www.petsy.online/">FOOD AND ACCESSORIES</a>
           
            <a href ="https://vetic.in/delhi/grooming?utm_source=google&utm_medium=cpc&utm_campaign=grooming&https://vetic.in/&gclid=Cj0KCQiAxbefBhDfARIsAL4XLRr03Ro0FmpzF_CBQiUeO2hrzJ6BLaMFhf0Z1P5Mo30qGAmL0eCuNTUaAjnKEALw_wcB">GROOMING </a>
            <a href ="https://www.provimi.in/en/petcare-products">PET CARE</a>
           
           
</div>
          </div>
          <div class="main">
            <h1> </h1>
</div>

<div class="image2-grid">
    <?php
    include("connection.php");
    include("functions.php");
    
    // Check if petname and Category are set in the URL
        if (isset($_GET['pet_id']) ) {
        // Get the values from the URL
        // $petname = $_GET['petname'];
         $pet_id=$_GET['pet_id'];

        // Construct the SQL query with proper filtering
        $sql = "SELECT * FROM pets WHERE pet_id = '$pet_id' ";
        
        $result = $con->query($sql);

        if ($result->num_rows > 0) {
            // Output data of each row
            while ($row = $result->fetch_assoc()) {
                echo '<div class="container">';
                echo " <p> <b>Heya It's Me.... " . $row['Petname'] . "</b></p>";
                echo '<img src="' . $row['Image_path'] . '" alt="Pet Image">';
                echo "<br>";
                echo "<h1>" ," About me...." ,"</h1>" ;
                echo "<h3>","<b>","Category: " . $row['Category'] . "</b>", "</h3>";
                echo "<h3>Breed:" . $row['Breed']." </h3> " ,"<br>";
                 echo "<hr>";
                echo '</div>';
                echo '<div class="content">';
                echo '<ul>';
                
                echo "<li> <b>Gender:</b>" . $row['Gender']." </li> ";
                echo "<li> <b>Pet Id:</b>" . $row['pet_id']." </li> ";
                echo "<li> <b>Age: </b>" . $row['Age']." </li> ";
                echo "<li><b>Weight:</b>" . $row['Weight_pet']. "kg","</li>";
                echo "<li><b>Vaccinated:</b>" . $row['Vaccinated']." </li> ";
                echo "<li><b>Trained:</b>" . $row['Trained']."</li>";
               
                 echo '</ul>';
                 
                echo '</div>';
                echo "<hr>";
                 }
                }
          else {
            echo "No pets found.";
        }
    } else {
        echo "Please provide petname and Category in the URL.";
    }

    ?>
     <div class="info">
                <h1> Contact Info</h1>
                <?php 
                  if (isset($_GET['pet_id'])) {
                    $pet_id = $_GET['pet_id'];
                    $sql2 = "SELECT * FROM user u JOIN pets p ON u.Email = p.Email WHERE p.pet_id = '$pet_id'";
                    $result2 = $con->query($sql2);
            
                    if (!$result2) {
                        die("Database error: " . $con->error);
                    }
            
                    if ($result2->num_rows > 0) {
                        while ($row = $result2->fetch_assoc()) {
                            echo '<div class="content">';
                            echo '<ul>';

                            echo "<li> <b>Owner: " . $row['First_Name'] . " " . $row['Last_Name'] . "</b></li>";
                            echo "<li><b>PhoneNumber: " . $row['PhoneNumber'] . "</b></li>";
                            echo "<li><b>Email: " . $row['Email'] . "</b></li>";

                        }
                    } else {
                        echo "No owner found for this pet.";
                    }
                } else {
                    echo "Please provide a valid petname in the URL.";
                }
                ?>
            </div>
        </div>
        <?php
        
    ?>

</div>

<div class ="adopt">
  <img src="howitwork.jpg">
              </div>

<footer class="footer">
  
    <div class="foot">
     
     <img src ="logo.jpg">
     <p>FourPaws@2023</p>
    </div>

  

    <div class="col3">
      <h5>Overview</h5>
      <ul class="nav flex-column">
        <li class="nav-item mb-2"><a href="project.php" class="nav-link p-0 text-muted">Home</a></li>
        <li class="nav-item mb-2"><a href="reg.php" class="nav-link p-0 text-muted">SignUp</a></li>
        <li class="nav-item mb-2"><a href= "FAQs.html">FAQs</a></li>
        <li class="nav-item mb-2"><a href= "new.php">Explore</a></li>
       
      </ul>
    </div>

    <div class="col31">
      <h5>About</h5>
      <p>FourPaws! <br>
        Your One-Stop Shop for Adopting a Furry Friend.<br>
        Make a Difference: By adopting a pet,<br>
         you are not only giving a furry friend a second chance at happiness, <br>
         but also making a positive impact on the community.<br>
          You're saving a life and reducing pet homelessnes.</p>
      </ul>
    </div>
    <div class="row2"id="c">
      <h5>Contact Us</h5>
      <li>
        9718260722
      </li>
      <li> 9667224435</li>
      <li>9540937616</li>
      <img src="mail.jpg" alt="mail">
      <img src="call.jpg" alt="call">
      <p>fourpaws@gmail.com</p>
    </div>

   </footer>
</body>
</html>