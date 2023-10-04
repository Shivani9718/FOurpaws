<?php
  
session_start();

$conn = mysqli_connect("localhost","root","","login_sample_db");

if(isset($_POST['addsubmit'])){

    $petname = $_POST['petname'];
    $email = $_POST['email'];
    $phonenumber = $_POST['phonenumber'];
    $age = $_POST['age'];
    $vac = $_POST['vac'];
    $tra = $_POST['tra'];
    $breed = $_POST['breed'];
    $category = $_POST['category'];
    $image = $_FILES['dbimage']['name'];

}

    $allowed_extension = array('gif','png','jpg','jpeg','jfif');
    $filename = $_FILES['dbimage']['name'];
    $file_extension = pathinfo($filename,PATHINFO_EXTENSION);
    if(!in_array($file_extension,$allowed_extension)){
        $_SESSION['status'] = "You are only allowed with jpeg, jpg, png, jfif and gif files";
        header('Location: account.html');
    }
    else{

    

$query = "INSERT INTO pet (petname,email,phonenumber,age,vac,tra,dbimage,breed,category) VALUES('$petname','$email','$phonenumber','$age','$vac','$tra','$image','$breed','$category')";
$query_run = mysqli_query($conn,$query);

if($query_run){

    move_uploaded_file($_FILES["dbimage"]["tmp_name"], "upload/".$_FILES["dbimage"]["name"]);
    $_SESSION['status'] = "Details Stored Successfully";
    header('Location: account.html');

}
else{

    $_SESSION['status'] = "Details Not Stored Successfully";
    header('Location: account.html');

}
    }

?>