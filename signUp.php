<?php
require('dbHandler.php');
 ?>
<!DOCTYPE HTML>
<html lang = "en">
<head>
<title>www.ExpertParking.com/signUp.php?</title>
<link rel = "stylesheet" type = "text/css" href ="signUp.css">
</head>
<body>
  <header>
  <ul>
    <li><a href = "homepage.php">Home</a></li>
    <li><a href = "contactUs.php">Contact Us</a></li>
    <li class = "active"><a href = "signUp.php">Sign Up</a></li>
  </ul>
</header>
<form action = "sendToDb.php" method="post">

<div id="login-box">
  <div class="left">
    <h1>Vehicle Signup</h1>
    <?php
    if(isset($_GET['fName'])){
      $fName = $_GET['fName'];
      echo '<input type="text" name="fName" placeholder="First Name" value ="'.$fName.'">';
    }
    else{
      echo '<input type="text" name="fName" placeholder="First Name">';
    }
    if(isset($_GET['lName'])){
      $lName = $_GET['lName'];
      echo '<input type ="text" name = "lName" placeholder="Last Name" value ="'.$lName.'">';
    }
    else{
      echo '<input type ="text" name = "lName" placeholder="Last Name">';
    }
    if(isset($_GET['email'])){
      $email = $_GET['email'];
      echo '<input type="email" name="email" placeholder="E-mail" value="'.$email.'">';
    }
    else{
    echo  '<input type="email" name="email" placeholder="E-mail">';
    }
    if(isset($_GET['phoneNum'])){
      $phoneNum = $_GET['phoneNum'];
      echo '<input type = "tel" name ="phoneNum" placeholder="Phone number" value="'.$phoneNum.'">';
    }
    else{
      echo '<input type = "tel" name ="phoneNum" placeholder="Phone number">';
    }
    if(isset($_GET['password'])){
      $phoneNum = $_GET['password'];
      echo '<input type="password" name="password" placeholder="Password" value="'.$password.'">';
    }
    else{
      echo '<input type="password" name="password" placeholder="Password">';
    }
    if(isset($_GET['password2'])){
      $password = $_GET['password2'];
      echo '<input type="password" name="password2" placeholder="Retype password"value="'.$password2.'">';
    }
    else{
      echo '<input type="password" name="password2" placeholder="Retype password">';
    }
    if(isset($_GET['vehMake'])){
      $vehMake = $_GET['vehMake'];
      echo '<input type = "text" name = "vehMake" placeholder="Vehicle Make" value="'.$vehMake.'">';
    }
    else{
      echo '<input type = "text" name = "vehMake" placeholder="Vehicle Make">';
    }
    if(isset($_GET['vehModel'])){
      $vehModel =  $_GET['vehModel'];
      echo '<input type = "text" name = "vehModel" placeholder="Vehicle Model" value="'.$vehModel.'">';
    }
    else{
      echo '<input type = "text" name = "vehModel" placeholder="Vehicle Model">';
    }
    if(isset($_GET['vehYear'])){
      $vehYear = $_GET['vehYear'];
      echo '<input type ="number" name = "vehYear" placeholder="Vehicle Year" value="'.$vehYear.'">';
    }
    else{
      echo '<input type ="number" name = "vehYear" placeholder="Vehicle Year">';
    }
    if(isset($_GET['vehLicense'])){
      $vehLicense = $_GET['vehLicense'];
      echo '<input type = "text" name = "vehLicense" placeholder="License Plate" value="'.$vehLicense.'">';
    }
    else{
      echo '<input type = "text" name = "vehLicense" placeholder="License Plate">';
    }

    ?>




    <input type="submit" name="signup_submit" value="Sign me up">
  </div>
</form>
<?php
  $websiteUrl = "http://$_SERVER[HTTP_POST]$_SERVER[REQUEST_URI]";
  if(strpos($websiteUrl, "error=emptyfields&email")==true){
    echo "<p class = 'error'>All fields are required!</p>";
  }
  else if(strpos($websiteUrl, "error=invalidemail&fName")==true){
    echo "<p class = 'error'>Email is invalid</p>";
  }
  else if(strpos($websiteUrl, "error=invalidYear&fName")==true){
    echo "<p class ='error'>Year must be 4 digits long</p>";
  }
  else if(strpos($websiteUrl, "error=invalidLicense&fName")==true){
    echo "<p class ='error'>License is invalid</p>";
  }
  else if(strpos($websiteUrl, "error=invalidPassword&fName")){
    echo "<p class = 'error'>Password must be at least 8 characters long</p>";
  }
  else if(strpos($websiteUrl, "error=passwordsdontmatch&fName")==true){
    echo "<p class ='error'>Passwords must match</p>";
  }
  else if(strpos($websiteUrl,"error=userExists&fName")==true){
    echo "<p class ='error'>User already exists</p>";
  }
  else if(strpos($websiteUrl, "signup=successnewuser")==true){
    echo "<p class ='success'>You've been successfully signed up!</p>";

  }
?>

<div class ="copyRight">
  &copy Copyright 2020 Expert Parking all rights reserved
</div>

</body>
</html>
