<?php
session_start();
// validate User's info
// all fields are blank [0], [1] field is blank, '[2], email is invalid, ['3'], phonenumber is invalid, ['4'], year is invalid,
//['5'] license is invalid

// Display USER INFORMATION USING SESSION
require('dbHandler.php');
$queryDb = 'SELECT * FROM newUsers WHERE email="'.$_SESSION["email"].'"';
$queryResults = mysqli_query($connectToDb, $queryDb);
if(mysqli_num_rows($queryResults)>0){
  // store the sessions in variables
  if($row=mysqli_fetch_assoc($queryResults)){


  $_SESSION['userId']=$row['userId'];
  $_SESSION['email'] =$row['email'];
  $_SESSION['phoneNum'] = $row['phoneNum'];
  $_SESSION['username']=$row['username'];
  $_SESSION['vehMake']=$row['vehMake'];
  $_SESSION['vehModel']=$row['vehModel'];
  $_SESSION['vehColor']=$row['vehColor'];
  $_SESSION['vehYear']=$row['vehYear'];
  $_SESSION['vehLicense']=$row['vehLicense'];

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
  <link rel ="stylesheet" type="text/css" href="myProfile.css">
 </head>
 <body>

<div class="updateCard">
  <h2>Update my info</h2>
  <form action ="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" >
  <input type="text" name="email" class="inputField" value="<?php if(isset($_SESSION['email'])){echo $_SESSION['email'];}?>">
  <span class="error"><?php echo $error; ?></span>
  <input type="text" name="phoneNum" class="inputField"<?php if(isset($_SESSION['phoneNum'])){echo $_SESSION['phoneNum'];}?>>
  <span class="error"><?php echo $error; ?></span>

  <input type="text" name="username" class="inputField" value="<?php if(isset($_SESSION['username'])){echo $_SESSION['username'];}?>">
  <span class="error"><?php echo $error; ?></span>

  <input type="text" name="password" class="inputField" placeholder="Enter Password">
  <span class="error"><?php echo $error; ?></span>

  <input type="text" name="password2" class="inputField" placeholder="Repeat Password">
  <span class="error"><?php echo $error; ?></span>
<input type ="submit" class="submitButton" name = "submitBtn">
<span><?php echo $success; ?></span>

</form>

</div>
<hr><!--Creates a horizontal line -->
<div class ="updateCard2">
  <h2>My Vehicle</h2>
  <form action ="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" >
  <input type ="text" name="vehMake" class="inputField" placeholder="Make">
  <span class="error"><?php echo $error; ?></span>

  <input type ="text" name="vehModel" class="inputField" placeholder="Model">
  <span class="error"><?php echo $error; ?></span>

  <input type ="text" name="vehColor" class="inputField" placeholder="Color">
  <span class="error"><?php echo $error; ?></span>

  <input type ="text" name="vehYear" class="inputField" placeholder="Year">
  <span class="error"><?php echo $error; ?></span>

  <input type ="text" name="vehLicense" class="inputField" placeholder="License Plate">
  <span class="error"><?php echo $error; ?></span>

  <input type ="submit" name="submitBtn2" class="submitButton" value="update">
  <span class ="success"><?php echo $success; ?></span>
</form>
</div>


 </body>
</html>
