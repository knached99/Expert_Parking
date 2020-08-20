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

    <input type="text" name="fName" placeholder="First Name">
    <input type ="text" name = "lName" placeholder="Last Name">
    <input type="email" name="email" placeholder="E-mail">
    <input type = "tel" name ="phoneNum" placeholder="Phone number">
    <input type="password" name="password" placeholder="Password">
    <input type="password" name="password2" placeholder="Retype password">
    <input type = "text" name = "vehMake" placeholder="Vehicle Make">
    <input type = "text" name = "vehModel" placeholder="Vehicle Model">
    <input type ="number" name = "vehYear" placeholder="Vehicle Year">
    <input type = "text" name = "vehLicense" placeholder="License Plate">
    <input type="submit" name="signup_submit" value="Sign me up">
  </div>
</form>
<div class ="copyRight">
  &copy Copyright 2020 Expert Parking all rights reserved
</div>

</body>
</html>
