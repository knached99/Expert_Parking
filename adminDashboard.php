<?php
session_start();
require('dbHandler.php');
?>
<html lang = "en">
<head>
<meta charset = "utf-8">
<meta name = "viewport" content = "width = device-width, initial-scale = 1.0">
<link rel="stylesheet" type="text/css" href="adminDashboard.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
</html>

<?php
if(isset($_SESSION['email'])){
  echo '<ul>
  <li><a href = "logout.php"></a></li>
  </ul>';

  echo '<h class = "loggedIn">Welcome, '.$firstName.'to your admin page</h>';

}
else{
  '<h class = "loggedOut">You are logged out</h>';
}
$sqlQuery = 'SELECT * FROM newUsers';
$results = mysqli_query($connectToDb, $sqlQuery);
if(mysqli_num_rows($results) > 0){
  while($rows = mysqli_fetch_assoc($results)){
    echo '<table>
      <tr>
      <th>First Name</th>
      <th>Last Name</th>
      <th>Phone number</th>
      <th>Email</th>
      <th>Vehicle Make</th>
      <th>Vehicle Model</th>
      <th>Vehicle Year</th>
      <th>Vehicle License</th>
      </tr>
      <td>'.$row['firstName'].'</td>
      <td>'.$row['lastName'].'</td>
      <td>'.$row['phoneNum'].'</td>
      <td>'.$row['email'].'</td>
      <td>'.$row['vehMake'].'</td>
      <td>'.$row['vehModel'].'</td>
      <td>'.$row['vehYear'].'</td>
      <td>'.$row['vehLicense'].'</td>
    </table>';
  }
}
?>
<div class ="myProfile">
  <h2><?php ?></h2>
</div>
