<?php
include('sendToDb.php');
?>
<!DOCTYPE HTML>
<html lang = "en">
<head>
<meta charset = "utf-8">
<meta name = "viewport" content = "width = device-width, initial-scale = 1.0">
<link rel = 'stylesheet' type="text/css" href='dashBoard.css'>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
<?php
if(isset($_SESSION['userId']))
{
  echo '<p class="loginStatus">Hi ""'.$name'"", welcome to your dashboard<br><br>Today is"'.date("l")'"</p>';

}
else{
  echo '<p class="loginStatus">You are now logged out</p>';
}

?>
&copy Copyright Expert Parking <?php echo date("Y");?> all rights reserved
</body>
</html>
