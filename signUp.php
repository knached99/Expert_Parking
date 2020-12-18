<?php
// requires the connection to the database
require('backendLogic/dbHandler.php');
 ?>
<!DOCTYPE HTML>
<html lang = "en" dir="ltr">
<head>
<title>www.ExpertParking.com/signUp.php?</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

<link rel = "stylesheet" type = "text/css" href ="styling/signUp.css">
</head>
<body>
  <header>
  <ul>
    <li><a href = "homepage.php">Home</a></li>
    <li><a href = "contactUs.php">Contact Us</a></li>
    <li class = "active"><a href = "signUp.php">Sign Up</a></li>
  </ul>
</header>
<form action = "backendLogic/validateSignup.php" method="post">

<div id="login-box">
  <div class="left">
    <h1>User Signup</h1>
    <!-- instead of using HTML for the inputs, echo out in PHP-->
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
    if(isset($_GET['username'])){
      $username = $_GET['username'];
      echo '<input type ="text" name="username" placeholder="Username" value="'.$username.'">';
    }
    else{
      echo '<input type="text" name="username" placeholder="Username">';
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
      echo '<input type = "tel" name ="phoneNum" placeholder="Phone number (no dashes)" value="'.$phoneNum.'">';
    }
    else{
      echo '<input type = "tel" name ="phoneNum" placeholder="Phone number (no dashes) ">';
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

    ?>




    <input type="submit" name="signup_submit" value="Sign me up"><br><br>
    <div class="loginRedirect">
      Already a member? <a href="login.php">Login Here</a>
    </div>
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
  else if(strpos($websiteUrl, "error=invalidPassword&fName")){
    echo "<p class = 'error'>Password must be at least 8 characters long</p>";
  }
  else if(strpos($websiteUrl, "error=passwordsdontmatch&fName")==true){
    echo "<p class ='error'>Passwords must match</p>";
  }
  else if(strpos($websiteUrl,"error=userExists")==true){
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
