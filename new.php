<html>
    <head>
        <link rel="stylesheet" href="new.css">

        <title>

        </title>

 <style>
      .topnav {
   background-color: rgb(4, 57, 4);
  overflow: hidden;
  height: auto;

}
.topnav h1{
  margin-left:20px;
  margin-top:5px;
  text-align:left;
  color:white;
  
}
.topnav p{
  font-size:15px;
  margin-left:100px;
  margin-top:-30px;
  text-align:left;
  color:white;
  
}


/* Style the links inside the navigation bar */



.topnav img{
  margin-left:70px;
   margin-top:-25px;
  height:2.5%;
  width:2%;
}

    </style>
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
     
    
    
     <div class="topnav">
  
  <h1>FOURPAWS</h1>
  <img src="logo.jpg"><p>Uniting Hearts</p>
  
   <a href ="addbtn.php">ADD PETS</a>
             <a href ="login1.php">LOGIN</a>
            <a href ="https://www.petsy.online/">FOOD AND ACCESSORIES</a>
           
            <a href ="https://vetic.in/delhi/grooming?utm_source=google&utm_medium=cpc&utm_campaign=grooming&https://vetic.in/&gclid=Cj0KCQiAxbefBhDfARIsAL4XLRr03Ro0FmpzF_CBQiUeO2hrzJ6BLaMFhf0Z1P5Mo30qGAmL0eCuNTUaAjnKEALw_wcB">GROOMING </a>
            <a href ="https://www.provimi.in/en/petcare-products">PET CARE</a>
            <a href ="project.php" >ABOUT US</a>
           
           
<!-- </div> -->
          </div>
   
       
    
     <div class="top" >
        
      <br>
       
       <form action="detail.php" method="get">
       <label for="Breed"></label>
       <input type="text" placeholder="by category, breed", name="Breed">
       <button type="submit"><b>Search</b></button>
      </form> 
      <p><b>Find your best Companion</b></p> 
      
      </div>
      
     <div class ="section">
       <div class ="Navigation">
      <form action="detail.php" method="get">
        <label for="Category" class="label"><b>Select Category:</b></label></br>
        <select id="Category"  name="Category" onchange="populateOptions()">
        <option value="Dog">Dog</option>
        <option value="Cat">Cat</option>
    </select>
    <br>
    <label for="Breed" class="label"><b>Select Breed:</b></label></br>
    <select id="Breed" name="Breed">
        <!-- Options will be populated dynamically based on the first select -->
    </select>
    <br>
    <button type="submit"><b>Search</b></button>
    </form>
    <br>
    <hr>
    
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
      while ($row = $result->fetch_assoc()) {
         
       
          echo '<img src="' . $row['Image_path'] . '" alt="Pet Image" >';
          echo "Pet Name: " . $row['Petname'] . "<br>";
          echo "Pet Id:" . $row['pet_id']." <br> ";
         
          echo "<br>";
      }
  }  else {
      echo "No pets available.";
  }
  }
      ?> 
    </div>

   

     <div class ="main"> 

      <p><b>Pets Available for Adoption</b></p>

    
     <div class="image2-grid">
     <?php 
      
     
    
      $sql = "SELECT * FROM pets";
      $result = $con->query($sql);
    
     if ($result->num_rows > 0) {
       //*Output data of each row */
      while ($row = $result->fetch_assoc()) { ?>
         
         <div class="container">
            <?php
          echo '<img src="' . $row['Image_path'] . '" alt="Pet Image" width="100px">';
          echo "<br>";
          echo "Pet Name: " . $row['Petname'] . "<br>";
          echo "Category:". $row['Category'] . "<br>";
          echo "Pet_id:". $row['pet_id'] . "<br>";
         
           
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
  
      ?> 
      
    </div>
</div>
</div>




        
        
       

















  
        


             
                  
   
    </body>
</html>