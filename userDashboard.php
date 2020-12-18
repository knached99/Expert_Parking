
<?php
// start the session to remember the user

session_start();
 date_default_timezone_set("America/New_York");
require('backendLogic/dbHandler.php');
//$query = 'SELECT * FROM newUsers WHERE email="'.$_SESSION['email'].'"';
//if(isset($_SESSION['email'])){
  //echo '<h1>Welcome Back<sup><img src="sillyEmoji.png"</sup></h1>';
//}
if(isset($_SESSION['email'])){
//echo '<h2>Welcome back!</h2>';
}
else{
  header('Location: login.php');
  echo '<h1>You are logged out!</h1>';
  echo '<p>Return to the login page</p>';

  session_unset();
  session_destroy();
  header('Location: login.php');
  exit();

}
?>
<html lang  ="en" dir="ltr">
<head>
<title>User Dashboard</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel ="stylesheet" type="text/css" href="styling/userDashboard.css">
<link rel ="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
  <input type="checkbox" id ="check";>
<header>
  <label for ="check">
  <i class ="fas fa-bars" id="sidebar_btn"></i>
  </label>
<div class ="leftArea">
  <h3>My<span>Dashboard</span></h3>
</div>
<div class ="rightArea">
<a href = "backendLogic/logout.php" class="logoutBtn">Logout</a>
</div>

</header>
<div class = "sideBar">
<center>
  <?php

  ?>
  <img src ="assets/myPic2.jpg"class ="profile_pic" alt ="" name="profilePic">
  <h4><?php echo $row['firstName'];?></h4>
</center>
<a href = "#"><i class="fas fa-tachometer-alt"></i><span>Dashboard</span></a>
<a href = "userProfile.php"><i class="fas fa-user-cog"></i><span>Profile</span></a>
<a href = "userBilling.php"><i class="fas fa-file-invoice"></i><span>Billing</span></a>
<a href="contactAdmin.php"><i class="fas fa-envelope"></i><span>Contact</span></a>
</div>
<div class ="content">
</div>

</body>
</html>
