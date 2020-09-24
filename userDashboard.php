<?php
// start the session to remember the user
session_start();
date_default_timezone_set("America/New_York");
require('dbHandler.php');

?>
<html lang = "en">
<head>
<meta charset = "utf-8">
<meta name = "viewport" content = "width = device-width, initial-scale = 1.0">
<link rel = 'stylesheet' type="text/css" href='dashBoard.css'>
<link rel="stylesheet" type="text/css" href="userDashboard.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
  <?php
  $query = 'SELECT * FROM newUsers where fName, lName, email, phoneNum, vehMake, vehModel, vehYear, vehLicense';
  $results = mysqli_query($connectToDb, $query);
  if(isset($_SESSION['email'])){

    echo '
    <ul>
    <li> <a href="logout.php">Logout</a></li>
    </ul>
    ';
    echo '<h class="loggedIn">Welcome to your dashboard!</h>';
    // Display user data from the database
    echo '<div class="userData">
    <table>
    <tr>
    User information
    <th>Name</th>
    <th>Email</th>
    <th>Phone number</th>
    </tr>
    <tr>
    <td>"'.$results['fName']['lName'].'"</td>
    <td>"'.$results['email'].'"</td>
    <td>"'.$results['phoneNum'].'"</td>
    </tr>
    </table>
    </div>';
    echo '<div class="vehicleData">
    <table>
    <tr>
    Vehicle Information
    <th>Make</th>
    <th>Model</th>
    <th>Year</th>
    <th>License Plate</th>
    </tr>
    <tr>
    <td>"'.$results['vehMake'].'"</td>
    <td>"'.$results['vehModel'].'" </td>
    <td> "'.$results['vehYear'].'"</td>
    <td>"'.$results['vehLicense'].'"</td>
    </tr>
    </table>
    </div>';
  }
    else{
      echo '<h class = "loggedOut">You are logged out. You may return to the home screen</h>';
    }

  ?>
</body>
</html>
