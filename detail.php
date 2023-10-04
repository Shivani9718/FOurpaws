<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="detail.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Displaypets</title>
</head>
<body>
    
<div class="topnav">
   <h1>FOURPAWS</h1>
    
    <div class ="element">
    <a href ="https://www.zigly.com/services/pet-grooming/home?utm_source=google&utm_medium=cpc&utm_campaign=Grooming+Text+Ads&utm_id=17691724312&gclid=Cj0KCQjwvZCZBhCiARIsAPXbajucJa5r2myLDcj-BVTqIXx0qfomiBi8sWnWERtlfvh7BYHQH7_AYPoaAhogEALw_wcB&gclid=Cj0KCQiAxbefBhDfARIsAL4XLRqjdRg-er_XBPjqGWH_AuM17KupChufECEivYCVJ2SkIKs1AbB6FxMaAtUbEALw_wcB">OTHERS</a>
    <a href ="https://vetic.in/delhi/grooming?utm_source=google&utm_medium=cpc&utm_campaign=grooming&https://vetic.in/&gclid=Cj0KCQiAxbefBhDfARIsAL4XLRr03Ro0FmpzF_CBQiUeO2hrzJ6BLaMFhf0Z1P5Mo30qGAmL0eCuNTUaAjnKEALw_wcB">GROOMING </a>    
    
            
            <a href ="https://www.petsy.online/">FOOD AND ACCESSORIES</a>
            <a href ="https://www.provimi.in/en/petcare-products">PET CARE</a>
            
            
            
               
</div>
          </div>
          <div class="main">
            <h1> Find Your Best Match!!</h1>
</div>

    <div class="image1-grid">
     <?php 
      
      include("connection.php");
      include("functions.php");
      if (isset($_GET['Breed']) || isset($_GET['Category'])){
      $searchBreed = $_GET['Breed'];
      $Category =$_GET['Breed'];
      $sql = "SELECT * FROM pets WHERE Breed LIKE '%$searchBreed%' or Category LIKE '%$Category%' ";
      $result = $con->query($sql);
    
     if ($result->num_rows > 0) {
       //*Output data of each row */
      while ($row = $result->fetch_assoc()) { ?>
         <div class="container">
            <?php
         
          echo '<img src="' . $row['Image_path'] . '" alt="Pet Image" >';
          echo "Pet Name: " . $row['Petname'] . "<br>";
         
          echo "Category:". $row['Category'] . "<br>";
          echo "breed:". $row['Breed'] . "<br>";
          ?>
          <form action="details.php" method="get">
         
          
          <input type="hidden" name="pet_id" value="<?php echo $row['pet_id'] ?> ">
          <button type="submit">Details</button>
          </form>
        
          
          </div>
          <?php
        }
      
  }  else {
      echo "No pets found.";
  }
  }
      ?> 
    </div>
  <div>
  <br><br><br><br><br><br>
  <br><br><br><br><br>
  <br>
  
</div>
  
<br><br><br><br><br><br>
  <br><br><br><br><br>
  <br>
   <div class="adopt">
  <img src ="howitwork.jpg">
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