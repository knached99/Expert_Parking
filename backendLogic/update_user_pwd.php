<?php
session_start();
require('dbHandler.php');
$emailSess = $_SESSION['email'];
if(isset($_POST['updatePwd'])){
  $currPassword = $_POST['currPassword'];
  $newPwd = $_POST['newPwd'];
  $retypePwd = $_POST['retypePwd'];
  $pwdPattern = '/^(?=.*[!@#$%^&*-])(?=.*[0-9])(?=.*[A-Z]).{8,20}$/';
  if(empty($currPassword) || empty($newPwd) || empty($retypePwd)){
    header('Location: ../memberdashboard/editProfile.php?emptyFields');
    exit();
  }
  else if(!preg_match($pwdPattern, $newPwd)){
    header('Location: ../memberdashboard/editProfile.php?invalidPwd');
    exit();
  }
  else if($retypePwd != $newPwd){
    header('Location: ../memberdashboard/editProfile.php?passwords_must_match');
    exit();
  }
  else{
    $get_curr_pwd = 'SELECT * FROM newUsers WHERE email=?';
    $stmt = mysqli_stmt_init($connectToDb);
    if(!mysqli_stmt_prepare($stmt, $get_curr_pwd)){
      header('Location: ../memberdashboard/editProfile.php?sqlError');
      exit();
    }
    else{
      mysqli_stmt_bind_param($stmt, "s", $emailSess);
      mysqli_stmt_execute($stmt);
    $result =  mysqli_stmt_get_result($stmt);
      if($row = mysqli_fetch_assoc($result)){
        $check_curr_pwd = password_verify($currPassword, $row['passWord']);
        if($check_curr_pwd == FALSE){
          header('Location: ../memberdashboard/editProfile.php?incorrectPwd');
          exit();
        }
        else if($check_curr_pwd == TRUE){
          $update_curr_pwd = "UPDATE newUsers SET passWord =? WHERE email=?";
          $stmt = mysqli_stmt_init($connectToDb);
          if(!mysqli_stmt_prepare($stmt, $update_curr_pwd)){
            header('Location: ../memberdashboard/editProfile.php?sqlErrorTwo');
            exit();
          }
          else{
            $new_hashed_pwd = password_hash($newPwd, PASSWORD_DEFAULT);
            mysqli_stmt_bind_param($stmt, "ss", $new_hashed_pwd, $emailSess);
            if(!mysqli_stmt_execute($stmt)){
              header('Location: ../memberdashboard/editProfile.php?pwdupdateFailed');
              exit();
            }
            else{
              header('Location: ../memberdashboard/editProfile.php?updateSuccessful');

            }
          }
        }
      }
    }
  }
}

?>
