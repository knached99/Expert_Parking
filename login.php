<?php
require('dbHandler.php');
?>
<!DOCTYPE html>
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
    <div class ="formWrapper">
      <h1>
      User Login
      </h1>
      <form id ="lognPage" action="validateLogin.php" method ="POST">
        <?php
        if(isset($_GET['email'])){
          $email = $_GET['email'];
          echo '<div class ="inputField">
            <input type ="text" placeholder="email" name ="Email" value="'.$email'">
          </div> ';
        }
        else{
          echo '<div class ="inputField">
            <input type ="text" placeholder="email" name ="Email">
          </div> ';
        }
        if(isset($_GET['passWord']))
        {
          echo '  <div class ="inputField">
              <input type ="password" placeholder="password" name ="PassWord" value="'.$passWord'">
            </div>';
        }
      else{
        echo '  <div class ="inputField">
            <input type ="password" placeholder="password" name ="PassWord">
          </div>';
      }
      ?>
        <div class ="submitButton">
          <input type ="submit" value ="Login" name='login'>
        </div>
        <div id ="forgotLogin">
        Forgot Password?<a href ="forgotLogin.php" id="hrefStyle"> Click Here </a> // have a way to recover that password.
        </div>

      </form>
      <?php
      // echo out errors based on URL
      $websiteUrl = "http://$_SERVER[HTTP_POST]$_SERVER[REQUEST_URI]";
      if(strpos($websiteUrl, "error=emptyfields&email")==true)
      {
        echo '<p class ="error">All fields are required!</p>';
      }
      else if(strpos($websiteUrl, "error=invalidemail")==true)
      {
        echo '<p clas="error">Email is invalid</p>';
      }
      else if(strpos($websiteUrl, "error=wrongPassword")==true)
      {
        echo '<p class="error">Password is incorrect</p>';
      }
      else if(strpos($websiteUrl, "error=noUser"))
      {
        echo '<p class="error">User does not exist</p>';
      }

      ?>
    </div>
    </body>
</html>
