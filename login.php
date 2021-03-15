<?php
require('backendLogic/dbHandler.php');
session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Customer Login</title>
  <link href="https://fonts.googleapis.com/css?family=Karla:400,700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.materialdesignicons.com/4.8.95/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="styling/login.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>
<body class="bg-light">
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand font-weight-bold" href="homepage.php">Home</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link font-weight-bold" href="homepage.php">Contact Us</a>
      </li>
    </ul>
  </div>
</nav>
  <main class="d-flex align-items-center min-vh-100 py-3 py-md-0">
    <div class="container">
      <div class="card login-card">
        <div class="row no-gutters">
          <div class="col-md-5">
            <!-- assets/valetParking.jpg
            https://i.pinimg.com/originals/aa/b7/fe/aab7fe0f9901d87c7340993d4dc3b7a5.jpg
            -->
            <img src="https://www.tasteibiza.com/wp-content/uploads/2017/09/amnesia1.jpg" alt="login" class="login-card-img">
          </div>
          <div class="col-md-7">
            <div class="card-body">
              <div class="brand-wrapper">
                <img src="https://www.kindpng.com/picc/m/22-229918_night-club-logo-png-images-club-logo-png.png" class="logo rounded-circle" style="height: 80px;">
              <!--  <img alt="logo" class="logo" style="height: 80px;" src="assets/companyLogo.png"> -->
              </div>
              <p class="login-card-description" style="font-weight:700;">Sign into your account</p>
              <form action="backendLogic/validateLogin.php" method="POST">
                <?php
                if(isset($_GET['email'])){
                  $email = $_GET['email'];
                  echo '
                  <div class="form-group">
                    <input type="email" name="email" id="email" class="form-control" value='.$email.'>
                  </div>
                  ';
                }
                else{
                  echo '
                  <div class="form-group">
                    <input type="email" name="email" class="form-control" placeholder="Enter your email">
                  </div>
                  ';
                }
                if(isset($_GET['passWord'])){
                  $passWord = $_GET['passWord'];
                  echo '
                  <div class="form-group mb-4">
                    <input type="password" name="passWord" id="password" class="form-control" value="'.$passWord.'>
\                  </div>
                  ';
                }
                else{
                  echo '
                  <div class="form-group mb-4">
                    <input type="password" name="passWord" id="password" class="form-control" placeholder="Enter your password">
                  </div>
                  ';
                }
                ?>
                <?php
           // Based on string position in the URL, display the errors on the webpage
           $websiteUrl = "http://$_SERVER[HTTP_POST]$_SERVER[REQUEST_URI]";
           if(strpos($websiteUrl, "error=emptyfields")==true)
           {
             echo '<p class ="alert alert-danger">All fields are required <i class="fa fa-exclamation-circle"></i></p>';
           }
           else if(strpos($websiteUrl, "error=wrongpassword")==true)
           {
             echo '<p class="alert alert-danger">Password is incorrect <i class="fa fa-exclamation-circle"></i></p>';
           }
           else if(strpos($websiteUrl, "error=nouser")==true)
           {
             echo '<p class="alert alert-warning">Looks like you\'re not signed up yet. Create your account then login <i class="fa fa-exclamation-circle"></i></p>';
           }
           else if(strpos($websiteUrl, "error=invalidemail")==true)
           {
             echo '<p class="alert alert-danger">Please enter a valid email <i class="fa fa-exclamation-circle"></i></p>';
           }
           else if(strpos($websiteUrl, "error=invalidpassword")==true){
             echo '<p class="alert alert-danger">An invalid password was specified <i class="fa fa-times"></i></p>';
           }
           else if(strpos($websiteUrl, "acctNotValid") == TRUE){
             echo '<p class="alert alert-primary font-weight-bold">Your account has not yet been validated. Please check your email and verify your account <i class="fa fa-exclamation-circle"></i></p>';
           }
           else if(strpos($websiteUrl, "accountVerified") == TRUE){
             echo '<p class="alert alert-success font-weight-bold">Your account has been verified and you can now login <i class="fa fa-check-circle"></i></p>';
           }
           else if(strpos($websiteUrl, "message=loggedout")==true){
             echo '<p class="alert alert-success">You have been successfully logged out! <i class="fa fa-check-circle"></i></p>';
           }
           ?>
                  <input name="login"  class="btn btn-block login-btn mb-4" type="submit" value="Login">
                </form>
                <a href="#!" class="forgot-password-link">Forgot password?</a>
                <p class="login-card-footer-text font-weight-bold text-danger">Don't have an account? <a href="signUp.php" class="text-primary">Register here</a></p>
                <nav class="login-card-footer-nav">
                </nav>
            </div>
          </div>
        </div>
      </div>
      <!-- <div class="card login-card">
        <img src="assets/images/login.jpg" alt="login" class="login-card-img">
        <div class="card-body">
          <h2 class="login-card-title">Login</h2>
          <p class="login-card-description">Sign in to your account to continue.</p>
          <form action="#!">
            <div class="form-group">
              <label for="email" class="sr-only">Email</label>
              <input type="email" name="email" id="email" class="form-control" placeholder="Email">
            </div>
            <div class="form-group">
              <label for="passWord" class="sr-only">passWord</label>
              <input type="passWord" name="passWord" id="passWord" class="form-control" placeholder="passWord">
            </div>
            <div class="form-prompt-wrapper">
              <div class="custom-control custom-checkbox login-card-check-box">
                <input type="checkbox" class="custom-control-input" id="customCheck1">
                <label class="custom-control-label" for="customCheck1">Remember me</label>
              </div>
              <a href="#!" class="text-reset">Forgot passWord?</a>
            </div>
            <input name="login" id="login" class="btn btn-block login-btn mb-4" type="button" value="Login">
          </form>
          <p class="login-card-footer-text">Don't have an account? <a href="#!" class="text-reset">Register here</a></p>
        </div>
      </div> -->
    </div>
  </main>
<script>
// Query the elements
const passwordEle = document.getElementById('password');
const toggleEle = document.getElementById('toggle');

toggleEle.addEventListener('click', function() {
    const type = passwordEle.getAttribute('type');

    passwordEle.setAttribute(
        'type',
        // Switch it to a text field if it's a password field
        // currently, and vice versa
        type === 'password' ? 'text' : 'password'
    );
});
</script>
  <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</body>
</html>
