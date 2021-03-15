<?php
session_start();
$username = $_SESSION['username'];
require('dbHandler.php');
if(isset($_POST['updateProfile'])){
   $email = $_POST['email'];
   $phoneNum = $_POST['phoneNum'];


   // REGEX PATTERNS
   $phonePattern = '/^(\({1}\d{3}\){1}|\d{3})(\s|-|.)\d{3}(\s|-|.)\d{4}$/';
   if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
     header('Location: ../adminDashboard2/template/settings.php?invalidEmail');
     exit();
   }
   else if(!preg_match($phonePattern, $phoneNum)){
     header('Location: ../adminDashboard2/template/settings.php?invalid_phone');
     exit();
   }
   $get_curr_user = 'SELECT * FROM adminUsers WHERE username=?';
   $stmt = mysqli_stmt_init($connectToDb);
   if(!mysqli_stmt_prepare($stmt, $get_curr_user)){
     header('Location: ../adminDashboard2/template/settings.php?sqlError');
     exit();
   }
   else{
     mysqli_stmt_bind_param($stmt, "s", $username);
     mysqli_stmt_execute($stmt);
    $results = mysqli_stmt_get_result($stmt);
     if($row = mysqli_fetch_assoc($results)){
       $update_user_information = 'UPDATE adminUsers SET email=?, phoneNum =? WHERE username=?';
       $stmt = mysqli_stmt_init($connectToDb);
       if(!mysqli_stmt_prepare($stmt, $update_user_information)){
         header('Location: ../adminDashboard2/template/settings.php?queryError');
         exit();
       }
       else{
         mysqli_stmt_bind_param($stmt, "sss", $email, $phoneNum, $username);
         if(!mysqli_stmt_execute($stmt)){
           header('Location: ../adminDashboard2/template/settings.php?updateFailed');
           exit();
         }
         else{
           header('Location: ../adminDashboard2/template/settings.php?updateSuccess');
           exit();
         }
       }
     }
   }
}
?>
