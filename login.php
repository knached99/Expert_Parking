<?php
require('dbHandler.php');
session_start();
?>
<html lang ="en">
<head>
  <meta charset = "utf-8">
  <meta name = "viewport" content = "width = device-width, initial-scale = 1.0">

    <title>www.ExpertParking.com</title>
    <link rel ="stylesheet" type ="text/css" href = "loginPage.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

  </head>
  <body>
    <ul>
      <li><a href = "homepage.php">Home</a><i class ="fa fa-fw fa-home"></li>
      <li><a href = "contactUs.php">Contact Us</a><i class ="fa fa-fw-envelope"</li>
      <li><a href = "signUp.php">Sign Up</a></li>
    </ul>
    <div class ="formWrapper">
      <h1>
      User Login
      </h1>
      <form action="validateLogin.php" method ="POST">
        <?php
        if(isset($_GET['email'])){
          $email = $_GET['email'];
          echo '<div class ="inputField">
            <input type ="text" placeholder="email" name ="email" value="'.$email.'">
          </div> ';
        }
        else{
          echo '<div class ="inputField">
            <input type ="text" placeholder="email" name ="email">
          </div> ';
        }
        if(isset($_GET['passWord']))
        {
          echo '<div class ="inputField">
              <input type ="password" placeholder="password" name ="passWord" value="'.$passWord.'">
            </div>';
        }
      else{
        echo '<div class ="inputField">
            <input type ="password" placeholder="password" name ="passWord">
          </div>';
      }
      ?>
        <div class ="submitButton">
          <input type ="submit" value ="Login" name='login'>
        </div>
        <div id ="forgotLogin">
        Forgot Password?<a href ="forgotLogin.php" id="hrefStyle"> Click Here </a> // have a way to recover that password.
        </div>


              <?php
              // Based on string position in the URL, display the errors on the webpage
              $websiteUrl = "http://$_SERVER[HTTP_POST]$_SERVER[REQUEST_URI]";
              if(strpos($websiteUrl, "error=emptyfields")==true)
              {
                echo '<p class ="error">All fields are required!</p>';
              }
              else if(strpos($websiteUrl, "error=wrongpassword")==true)
              {
                echo '<p class="error">Password is incorrect</p>';
              }
              else if(strpos($websiteUrl, "error=nouser"))
              {
                echo '<p class="error">User does not exist</p>';
              }

              ?>
    </div>
  </form>
    </body>
</html>
