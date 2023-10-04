<html>
    <head>
        <link rel="stylesheet" href="search.css">

        <title>

        </title>


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
                var Dog = ["Indian Pariah Dog (Desi Dog)",
    "Labrador Retriever",
    "German Shepherd",
    "Golden Retriever",
    "Pomeranian",
    "Beagle",
    "Dachshund",
    "Rajapalayam",
    "Indian Spitz",
    "Mudhol Hound (Caravan Hound)",
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
        <a href ="https://www.provimi.in/en/petcare-products">PET CARE</a>
            <a href ="https://vetic.in/delhi/grooming?utm_source=google&utm_medium=cpc&utm_campaign=grooming&https://vetic.in/&gclid=Cj0KCQiAxbefBhDfARIsAL4XLRr03Ro0FmpzF_CBQiUeO2hrzJ6BLaMFhf0Z1P5Mo30qGAmL0eCuNTUaAjnKEALw_wcB">GROOMING </a>
            <a href ="https://www.petsy.online/">FOOD AND ACCESSORIES</a>
            <a href ="https://www.zigly.com/services/pet-grooming/home?utm_source=google&utm_medium=cpc&utm_campaign=Grooming+Text+Ads&utm_id=17691724312&gclid=Cj0KCQjwvZCZBhCiARIsAPXbajucJa5r2myLDcj-BVTqIXx0qfomiBi8sWnWERtlfvh7BYHQH7_AYPoaAhogEALw_wcB&gclid=Cj0KCQiAxbefBhDfARIsAL4XLRqjdRg-er_XBPjqGWH_AuM17KupChufECEivYCVJ2SkIKs1AbB6FxMaAtUbEALw_wcB">OTHERS</a>
    
          </div>
        <div class="top" >
        
      <br>
       
       <form action="search.php" method="get">
       <label for="Breed"></label>
       <input type="text" placeholder="by category, breed", name="Breed">
      <button type="submit">Search</button>
      </form> 
      <p><b>Find your best Companion</b></p> 
      
      </div>
      
     

      <form action="search.php" method="get">
        <label for="Category"><b>Select Category:</b></label>
        <select id="Category"  name="Category" onchange="populateOptions()">
        <option value="Dog">Dog</option>
        <option value="Cat">Cat</option>
    </select>
  <br>
    <label for="Breed"><b>Select Breed:</b></label>
    <select id="Breed" name="Breed">
        <!-- Options will be populated dynamically based on the first select -->
    </select>
    <button type="submit">Search</button>
    </form>
    
    


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
          echo "Email: " . $row['Email'] . "<br>";
         
          echo "<br>";
      }
  }  else {
      echo "No pets found.";
  }
  }
      ?> 
    </div>
     
   

     <div class ="main"> 

      <h1>Pets Available</p>

    
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
          echo "Pet Name: " . $row['Petname'] . "<br>";
          echo "Email: " . $row['Email'] . "<br>";
         
          echo "<br>";
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