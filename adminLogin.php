<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Admin Login</title>
  <link href="https://fonts.googleapis.com/css?family=Karla:400,700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.materialdesignicons.com/4.8.95/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
  <link rel="stylesheet" href="styling/adminLogin.css">
  <link rel="stylesheet" href="styling/adminLogin.scss">
</head>
<body>
  <main>
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-6 login-section-wrapper">
          <div class="brand-wrapper">
            <img src="https://www.kindpng.com/picc/m/22-229918_night-club-logo-png-images-club-logo-png.png" alt="logo" class="logo">
          </div>
          <div class="login-wrapper my-auto">
            <h1 class="login-title">Administrator Login</h1>
            <form action="backendLogic/validateAdmin.php" method="POST">
              <?php
                          $websiteUrl = "http://$_SERVER[HTTP_POST]$_SERVER[REQUEST_URI]";
                          if(strpos($websiteUrl, "error=emptyfields")==true){
                            echo '<p class="alert alert-danger">You\'ve left both fields empty <i class="fa fa-exclamation-circle"></i></p>';
                          }

                          else if(strpos($websiteUrl, "passwordRequired")==TRUE){
                            echo '<p class="alert alert-danger">You forgot to enter your password <i class="fa fa-exclamation-circle"></i></p>';

                          }
                          else if(strpos($websiteUrl, "error=sqlerror")==true){
                            echo '<p class="alert alert-danger">Error in SQL script <i class="fa fa-exclamation-circle"></i></p>';
                          }

                          else if(strpos($websiteUrl, "error=wrongpassword")){
                            echo '<p class="alert alert-danger">Password is incorrect <i class="fa fa-exclamation-circle"></i></p>';
                          }
                          else if(strpos($websiteUrl, "error=nouser")){
                            echo '<p class="alert alert-warning">User does not exist <i class="fa fa-exclamation-circle"></i></p>';
                          }
                          else if(strpos($websiteUrl, 'message=loggedout')){
                            echo '<p class="alert alert-success">Successfully Logged Out! <i class="fa fa-check-circle"></i></p>';
                          }
                          else if(strpos($websiteUrl, 'session_timedout')){
                            echo '<p class="alert alert-warning">You have been logged out due to inactivity <i class="fa fa-warning"></i></p>';
                          }


                          ?>
              <div class="form-group">
                <label for="email">Username</label>
                <input type="text" name="username" id="username" class="form-control" placeholder="Enter your username">
              </div>
              <div class="form-group mb-4">
                <label for="password">Password</label>
                <input type="password" name="passWord" id="password" class="form-control" placeholder="enter your passsword">
              </div>
              <input id="login" class="btn btn-block login-btn" type="submit" name="submit"value="Login">
            </form>
            <a href="#!" class="forgot-password-link">Forgot password?</a>
          </div>
        </div>
        <div class="col-sm-6 px-0 d-none d-sm-block">
          <img src="https://blogmedia.evbstatic.com/wp-content/uploads/wpmulti/sites/8/shutterstock_199419065.jpg" alt="login image" class="login-img">
        </div>
      </div>
    </div>
  </main>
  <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</body>
</html>
