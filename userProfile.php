
<?php
session_start();
// validate User's info
// all fields are blank [0], [1] field is blank, '[2], email is invalid, ['3'], phonenumber is invalid, ['4'], year is invalid,
//['5'] license is invalid

// Display USER INFORMATION USING SESSION
require('backendLogic/dbHandler.php');

$queryDb = 'SELECT * FROM newUsers WHERE email="'.$_SESSION["email"].'"';
$queryResults = mysqli_query($connectToDb, $queryDb);
if(mysqli_num_rows($queryResults)>0){
  // store the sessions in variables
  while($row=mysqli_fetch_assoc($queryResults)){


  $userId= $_SESSION['userId']=$row['userId'];
$email=  $_SESSION['email'] =$row['email'];
$phoneNum=  $_SESSION['phoneNum'] =$row['phoneNum'];
$username=  $_SESSION['username']=$row['username'];
$vehMake=  $_SESSION['vehMake']=$row['vehMake'];
$vehModel=  $_SESSION['vehModel']=$row['vehModel'];
$vehColor =  $_SESSION['vehColor']=$row['vehColor'];
$vehYear=  $_SESSION['vehYear']=$row['vehYear'];
$vehLicense=  $_SESSION['vehLicense']=$row['vehLicense'];
$startDate=  $_SESSION['startDate'] =$row['startDate'];
$endDate=  $_SESSION['endDate'] = $row['endDate'];
?>
<!--USER PROFILE INFORMATION -->
  <form>
    <div class="container" style="width: 200%; position: relative; left: -200px;">
      <legend style="font-weight: 700;">My Information</legend>
  <div class="form-group">
  <label for="username">Username</label>
  <input type="text" class="form-control" id="username" aria-describedby="emailHelp" name="username" placeholder="<?php echo $username;?>">
</div>
<div class="form-group">
  <label for="email">Email</label>
  <input type="email" style="width:150%;"class="form-control" id="exampleInputPassword1" placeholder="<?php echo $email;?>">
</div>
<div class="form-group">
  <label for ="phoneNum">Phonenumber</label>
  <input type="tel" class="form-control" id="phoneNum" name="phoneNum" placeholder="<?php echo $phoneNum;?>">
</div>
<button type="button" class="btn btn-outline-success">Update</button>
</div>
</form>
<form>
  <!--VEHICLE INFORMATION -->
  <div class="container" style="width: 200%; position: relative; left: 100px;">
    <legend style="font-weight: 700;">My Vehicle</legend>
<div class="form-group">
<label for="vehMake">Make</label>
<input type="text" class="form-control" id="vehMake" name="vehMake" placeholder="<?php if(isset($vehMake)){ echo $vehMake;} else{ echo 'No available data';}?>">
</div>
<div class="form-group">
<label for="vehModel">Model</label>
<input type="email" style="width:150%;"class="form-control" name="vehModel" id="vehModel" placeholder="<?php if(isset($vehMake)){ echo $vehMake;} else{ echo 'No available data';}?>">
</div>
<div class="form-group">
<label for ="vehColor">Color</label>
<input type="tel" class="form-control" id="vehColor" name="vehColor" placeholder="<?php if(isset($vehMake)){ echo $vehMake;} else{ echo 'No available data';}?>">
</div>
<div class="form-group">
<label for ="vehYear">Year</label>
<input type="tel" class="form-control" id="vehYear" name="vehYear" placeholder="<?php if(isset($vehMake)){ echo $vehMake;} else{ echo 'No available data';}?>">
</div>
<button type="button" class="btn btn-outline-success">Update</button>
</div>
</form>
<?php
  function calcEndDate($subscriptionEnd){
    // calculate the end date for the subcription based on subscription type
    // and grab the startDate from DB
    // if the user is a monthly user
    $server = 'localhost';
    $user = 'root';
    $password = 'root';
    $dbName = 'userInfo';
    $dbConnect = mysqli_connect($server, $user, $password, $dbName);
    if(!$dbConnect){
      die('Unable to contact the server'.mysqli_connect_errno().mysqli_connect_error());
    }
    // check if user is a monthly customer
    if($dropDown =="1"){
      $endDate = DATEADD(MONTH, 1, $startDate);
      $insertQuery = "INSERT INTO subscribedUsers(endDate) VALUES(endDate)";
      return $subscriptionEnd;
    }
    else if($dropDown =='2'){
      $endDate = DATEADD(MONTH, 4, $startDate);
      $insertQuery = 'INSERT INTO subscribedUsers(endDate) VALUES(endDate)';
      return $subscriptionEnd;
    }
  }

}
}
$error = ["","","",""];


if(isset($_POST['submitBtn'])){
  if(empty($email)&&empty($phoneNum)&&empty($username)&&empty($password)&&empty($password2)){
    $error[0]='All fields are required';
  }
  else if(empty($email)||empty($phoneNum)||empty($username)||empty($password)||empty($password2)){
    $error[1]='This field is blank';
  }
  else if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
    $error[2]='Email is invalid';
  }
  else if(!preg_match('((\(\d{3}\) ?)|(\d{3}-))?\d{3}-\d{4}', $phoneNum));
  $error[3] = 'Phonenumber is invalid';
}
else{
  $success = 'Successfully updated your info';
}
// validate user's car info
if(isset($_POST['submitBtn2'])){
  $error =["",""];
  if(empty($vehYear)&&empty($vehLicense)){
    echo('');
  }
}

?>
<html lang = "en" dir="ltr">
<head>
  <title>My Profile</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel ="stylesheet" type="text/css" href="styling/myProfile.css">
  <link rel="stylesheet" href="font-awesome.min.css">

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
 </head>
 <body>
   <ul>
     <li style="position: relative; left: -250px; top: 40px;">
       <a href="userDashboard.php" class="btn btn-outline-danger"style="text-decoration: none;">Go back</a>
     </li>
 </ul>
 </body>
</html>
