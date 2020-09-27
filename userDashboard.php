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
  if(isset($_SESSION['email'])){

    echo '
    <ul>
    <li><a href="logout.php">Log out</a></li>
    </ul>
    ';
    echo '<h class="loggedIn">Welcome to your dashboard!</h>';
    // Display user data from the database

  }
    else{
      echo '<h class = "loggedOut">You are logged out. You may return to the home screen</h>';
    }
    ?>
  <?php
  $query = 'SELECT firstName, lastName, email, phoneNum, vehMake, vehModel, vehYear, vehLicense FROM newUsers where email="'.$_SESSION['email'].'"';
  $results = mysqli_query($connectToDb, $query);
  if(mysqli_num_rows($results)>0){
    if($row = mysqli_fetch_assoc($results)){
      echo '<table>
          <caption>My Information</caption>
          <tr>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Email</th>
        <th>Phone number</th>
      </tr>
      <td>'.$row['firstName'].'</td>
      <td>'.$row['lastName'].'</td>
      <td>'.$row['email'].'</td>
      <td>'.$row['phoneNum'].'</td>
        </table>
        <br><br>
        <table>
        <caption>
        My Vehicle Information
        </caption>
        <tr>
        <th>Vehicle Make</th>
        <th>Vehicle Model</th>
        <th>Vehicle Year</th>
        <th>Vehicle License</th></tr>
        <td>'.$row['vehMake'].'</td>
        <td>'.$row['vehModel'].'</td>
        <td>'.$row['vehYear'].'</td>
        <td>'.$row['vehLicense'].'</td>
        </tr>
      </table>';
    }
  }
  else{
    echo '<h class ="error">No data</h>';
  }


  ?>
  </table>

</body>
</html>
