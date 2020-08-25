<!DOCTYPE HTML>
<html>
<head>

<link rel ="stylesheet" type ="text/css" href ="signUp.css">
</head>

<body>
<?php
require('sendToDb.php');
include('signUp.php');
include('signUp.css');
?>
<div class="jumbotron text-center">
  <h1 class="display-3"><?php echo 'Thank you, "'$name'"'?></h1>
  <p class="lead"><strong>Please check your email</strong> for your confirmation.</p>
  <hr>
  <p>
    Having trouble? <a href="contactUs.php">Contact us</a>
  </p>
  <p class="lead">
    <a class="btn btn-primary btn-sm" href="https://bootstrapcreative.com/" role="button">Continue to homepage</a>
  </p>
</div>
</body>
</html>
