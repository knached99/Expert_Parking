<?php
session_start();
$userId = $_SESSION['userId'];
require('dbHandler.php');
if(isset($_POST['updateProfile'])){
   $email = $_POST['email'];
   $phoneNum = $_POST['phoneNum'];
   $vehMake = $_POST['vehMake'];
   $vehModel = $_POST['vehModel'];
   $vehColor = $_POST['vehColor'];
   $vehYear = $_POST['vehYear'];

   // REGEX PATTERNS
   $phonePattern = '/^(\({1}\d{3}\){1}|\d{3})(\s|-|.)\d{3}(\s|-|.)\d{4}$/';
   if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
     header('Location: ../memberdashboard/editProfile.php?invalidEmail');
     exit();
   }
   else if(!preg_match($phonePattern, $phoneNum)){
     header('Location: ../memberdashboard/editProfile.php?numberInvalid');
     exit();
   }
   $get_curr_user = 'SELECT * FROM newUsers WHERE userId=?';
   $stmt = mysqli_stmt_init($connectToDb);
   if(!mysqli_stmt_prepare($stmt, $get_curr_user)){
     header('Location: ../memberdashboard/editProfile.php?sqlError');
     exit();
   }
   else{
     mysqli_stmt_bind_param($stmt, "i", $userId);
     mysqli_stmt_execute($stmt);
    $results = mysqli_stmt_get_result($stmt);
     if($row = mysqli_fetch_assoc($results)){
       $update_user_information = 'UPDATE newUsers SET email=?, phoneNum =?, vehMake=?, vehModel=?, vehColor=?, vehYear=? WHERE userId=?';
       $stmt = mysqli_stmt_init($connectToDb);
       if(!mysqli_stmt_prepare($stmt, $update_user_information)){
         header('Location: ../memberdashboard/editProfile.php?queryError');
         exit();
       }
       else{
         mysqli_stmt_bind_param($stmt, "sssssii", $email, $phoneNum, $vehMake, $vehModel, $vehColor, $vehYear, $userId);
         if(!mysqli_stmt_execute($stmt)){
           header('Location: ../memberdashboard/editProfile.php?updateFailed');
           exit();
         }
         else{
           header('Location: ../memberdashboard/editProfile.php?updateSuccess');
           exit();
         }
       }
     }
   }
}
?>
