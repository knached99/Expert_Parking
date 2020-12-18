<?php
require('backendLogic/dbHandler.php');
session_start();
?>
<html lang ="en">
<head>
  <meta charset = "utf-8">
  <meta name = "viewport" content = "width = device-width, initial-scale = 1.0">

    <title>www.ExpertParking.com</title>
    <link rel ="stylesheet" type ="text/css" href = "styling/loginPage.css">
    <script src="https://kit.fontawesome.com/5d5389b381.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

  </head>
  <body>
    <ul>
      <li><a href = "homepage.php">Home</a><i class ="fa fa-fw fa-home"></i></li>
      <li><a href = "contactUs.php">Contact Us</a><i class ="fas fa-pen"></i></li>
      <li><a href = "signUp.php">Sign Up</a></li>
    </ul>
    <div class ="formWrapper">
      <h1>
      Customer Login
      </h1>
      <form action="backendLogic/validateLogin.php" method ="POST">
        <?php
        if(isset($_GET['email'])){
          $email = $_GET['email'];
          echo '<div class ="inputField">
              <i class="far fa-envelope" aria-hidden="true"></i>
            <input type ="text" placeholder="email" name ="email" value="'.$email.'">
          </div> ';
        }
        else{
          echo '<div class ="inputField">
            <i class="far fa-envelope" aria-hidden="true"></i>
            <input type ="text" placeholder="email" name ="email">
          </div> ';
        }
        if(isset($_GET['passWord']))
        {
          echo '<div class ="inputField">
                <i class="fas fa-lock" aria-hidden="true"></i>
              <input type ="password" placeholder="password" name ="passWord" value="'.$passWord.'">
            </div>';
        }
      else{
        echo '<div class ="inputField">
              <i class="fas fa-lock" aria-hidden="true"></i>
            <input type ="password" placeholder="password" name ="passWord">
          </div>';
      }
      ?>
        <div class ="submitButton">
          <input type ="submit" value ="Login" name='login'>
        </div>
        <div id ="forgotLogin">
        Forgot Password?<a href ="forgotLogin.php" id="hrefStyle"> Click Here </a> <!--have a way to recover that password. -->
        </div>
        <div class="adminLogin">
          Admin Login <a href="adminLogin.php" class="adminHref">Click Here</a>
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
              else if(strpos($websiteUrl, "error=nouser")==true)
              {
                echo '<p class="error">User does not exist</p>';
              }
              else if(strpos($websiteUrl, "error=invalidemail")==true)
              {
                echo '<p class="error">Please enter a valid email</p>';
              }
              else if(strpos($websiteUrl, "error=invalidpassword")==true){
                echo '<p class="error">An invalid password was specified</p>';
              }
              else if(strpos($websiteUrl, "message=loggedout")==true){
                echo '<p class="success">You have been successfully logged out!</p>';
              }
              ?>
    </div>
  </form>
    </body>
</html>
