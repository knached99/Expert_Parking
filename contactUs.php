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
      </ul>
  </header>
  <div class = "wrapper">
    <h2>
      Get in touch with us!
    </h2>
    <form action='validateContact.php' method="post">

      <div class ="input_field">
        <input type ="text" class="input" placeholder="Type your full name" name ="name">
      </div>
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
      <div class ="input_field">
       <input type ="tel" class ="input" placeholder="Phone (no dashes)" name="phone">
      </div>
      <div class ="input_field">
      <input type ="text" class ="input" placeholder="Email"  name="email">
      </div>
      <div class ="input_field">
       <input type="textarea"  name = "message" class ="input" placeholder="Write your message here...">
      </div>
      <input type="submit" name ="submit" class ="btn" value="Send your message">
    </form>
  <div id ="copyRight">
    &copy Copyright 2020 Expert Parking all rights reserved
  </div>

</body>
</html>
