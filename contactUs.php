<?php
require('validateContact.php');
?>
<!DOCTYPE HTML>
<html lang ="en">
<head>
  <link rel ="stylesheet" type ="text/css" href ="contactUs.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <meta charset = "utf-8">
  <meta name = "viewport" content = "width = device-width, initial-scale = 1.0">
  <title>Contact Form</title>
</head>
<body>
  <header>
      <ul>
        <li><a href = "homepage.php">Home</a></li>
        <li class ="active"><a href = "contactUs.php">Contact Us</a></li>
        <li><a href = "signUp.php">Sign Up</a></li>
        <li><a href ="login.php">Login</a></li>
      </ul>
  </header>
  <div class = "wrapper">
    <h2>
      Get in touch with us!
    </h2>
    <form action='validateContact.php' method="post">
        <?php

        if(isset($_GET['name'])){
          $name = $_GET['name'];
          echo '<div class ="input_field">
            <input type ="text" class="input" placeholder="Type your full name" name ="name" value ="'.$name.'">
          </div>';
        }
        else{
          echo '<div class ="input_field">
            <input type ="text" class="input" placeholder="Type your full name" name ="name">
          </div>';
        }
        if(isset($_GET['phone'])){
          $phone = $_GET['phone'];
          echo '<div class ="input_field">
           <input type ="tel" class ="input" placeholder="Phone (no dashes)" name="phone" value="'.$phone.'">
          </div>';
        }
        else{
          echo '<div class ="input_field">
           <input type ="tel" class ="input" placeholder="Phone (no dashes)" name="phone">
          </div>';
        }
        if(isset($_GET['email'])){
          $email = $_GET['email'];
          echo '<div class ="input_field">
          <input type ="text" class ="input" placeholder="Email"  name="email" value ="'.$email.'">
          </div>';
        }
        else{
          echo '<div class ="input_field">
          <input type ="text" class ="input" placeholder="Email"  name="email">
          </div>';
        }

        ?>
        <div class ="=dropDown">
         <select class ="subjectDropDown" placeholder="choose a subject" name ="subject">
          <option value ="0">None Selected</option>
          <option value ="1">Customer Service</option>
          <option value ="2">Technical Support</option>
          <option value ="3">Cancel My Monthly Subscription</option>
          <option value ="4">Cancel My Semesterly Subscription</option>
          <option value ="5">Topic is not listed</option>
         </select>
        </div>
        <?php
        if(isset($_GET['message'])){
          $message = $_GET['message'];
          echo '<div class ="input_field">
           <input type="textarea"  name = "message" class ="input" placeholder="Write your message here..."value="'.$message.'">
          </div>';
        }
        else{
        echo  '<div class ="input_field">
           <input type="textarea"  name = "message" class ="input" placeholder="Write your message here...">
          </div>';
        }
        //Write the mail script here
        $mailTo = "Khalednached@gmail.com";
        $headers = "From: ".$email;
        $message = "You've recieved an email from: " .$name."\n\n".$message;
        ?>
        <?php
          // Use the URL and GET method to display errors in the webpage

            $websiteUrl = "http://$_SERVER[HTTP_POST]$_SERVER[REQUEST_URI]";
            if(strpos($websiteUrl, "error=emptyfields&name")==true){
              echo "<p class ='error'>All fields are required!</p>";
            }
            else if(strpos($websiteUrl,"error=invalidemail&name")==true){
              echo "<p class='error'>Email is invalid!</p>";
            }
            else if(strpos($websiteUrl, "error=invalidPhoneNum&name")==true){
              echo "<p class ='error'>Phone number is invalid!</p>";
            }
            else if(strpos($websiteUrl, "error=messageIsTooShort&name")==true){
              echo "<p class='error'>Message must be at least 100 characters long</p>";
            }
            else if(strpos($websiteUrl,"error=noSubjectSelected&name")==true){
              echo "<p class='error'>Must select a subject!</p>";
            }
            else if(strpos($websiteUrl, "success=messageSent")==true){
              echo "<p class='success'>Your message was sent and is currently being reviewed by an admin.<br> We will contact you shortly!</p>";
            }
            ?>

      <input type="submit" name ="submit" class ="btn" value="Send your message">
    </form>
    </div>
  <div id ="copyRight">
    &copy Copyright Expert Parking <?php echo date("Y");?> all rights reserved

  </div>

</body>
</html>
