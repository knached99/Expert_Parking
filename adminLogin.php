<?php
session_start();
require('backendLogic/dbHandler.php');
?>
<head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<link rel="stylesheet" type="text/css" href="styling/adminLogin.css">

<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>
<body>
  <ul>
    <li><a href="homePage.php">Go Home</a></li>
  </ul>
    <div id="login">
        <div class="container">
            <div id="login-row" class="row justify-content-center align-items-center">
                <div id="login-column" class="col-md-6">
                    <div id="login-box" class="col-md-12">
                        <form id="login-form" class="form" action="backendLogic/validateAdmin.php" method="post">
                            <h3 class="text-center text-dark">Admin Login</h3>
                            <?php if(isset($_GET['username'])){
                              $username = $_GET['username'];
                              echo '<div class="form-group">
                                  <label for="username" class="text-dark">Username:</label><br>
                                  <input type="text" name="username" id="username" class="form-control" value="'.$username.'">
                              </div>';
                            }
                              else{
                               echo '<div class="form-group">
                                   <label for="username" class="text-dark">Username:</label><br>
                                   <input type="text" name="username" id="username" class="form-control">
                               </div>';
                              }
                              if(isset($_GET['passWord'])){
                                $passWord = $_GET['password'];
                                echo '<div class="form-group">
                                    <label for="password" class="text-dark">Password:</label><br>
                                    <input type="text" name="passWord" id="password" class="form-control" value="'.$passWord.'">
                                </div>';
                              }
                              else{
                                echo '<div class="form-group">
                                    <label for="password" class="text-dark">Password:</label><br>
                                    <input type="password" name="passWord" id="password" class="form-control">
                                </div>';
                              }
                            ?>

                              <div class="form-group">
                                <input type="submit" name="submit" style="width: 100%;"class="btn btn-dark btn-md" value="submit">
                            </div>
                            <?php
                            $websiteUrl = "http://$_SERVER[HTTP_POST]$_SERVER[REQUEST_URI]";
                            if(strpos($websiteUrl, "error=emptyfields")==true){
                              echo '<p class="alert alert-danger">All fields are required <i class="fa fa-warning"></i></p>';
                            }
                            else if(strpos($websiteUrl, "error=sqlerror")==true){
                              echo '<p class="alert alert-danger">Error in SQL script <i class="fa fa-warning"></i></p>';
                            }

                            else if(strpos($websiteUrl, "error=wrongpassword")){
                              echo '<p class="alert alert-danger">Password is incorrect <i class="fa fa-times"></i></p>';
                            }
                            else if(strpos($websiteUrl, "error=nouser")){
                              echo '<p class="alert alert-warning">User does not exist <i class="fa fa-warning"></i></p>';
                            }
                            else if(strpos($websiteUrl, 'message=loggedout')){
                              echo '<p class="alert alert-success">Successfully Logged Out! <i class="fa fa-check"></i></p>';
                            }
                            else if(strpos($websiteUrl, 'sessionTimeout')){
                              echo '<p class="alert alert-warning">You have been logged out due to inactivity <i class="fa fa-warning"></i></p>';
                            }


                            ?>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
