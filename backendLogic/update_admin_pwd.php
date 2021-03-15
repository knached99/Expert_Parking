<?php
session_start();
require('dbHandler.php');
$username_sess = $_SESSION['username'];
if(isset($_POST['updatePwd'])){
  $currPassword = $_POST['currPassword'];
  $newPwd = $_POST['newPwd'];
  $retypePwd = $_POST['retypePwd'];
  $pwdPattern = '/^(?=.*[!@#$%^&*-])(?=.*[0-9])(?=.*[A-Z]).{8,20}$/';
  if(empty($currPassword) || empty($newPwd) || empty($retypePwd)){
    header('Location: ../adminDashboard2/template/settings.php?emptyFields');
    exit();
  }
  else if(!preg_match($pwdPattern, $newPwd)){
    header('Location: ../adminDashboard2/template/settings.php?invalidPwd');
    exit();
  }
  else if($retypePwd != $newPwd){
    header('Location: ../adminDashboard2/template/settings.php?passwords_must_match');
    exit();
  }
  else{
    $get_curr_pwd = 'SELECT * FROM adminUsers WHERE username=?';
    $stmt = mysqli_stmt_init($connectToDb);
    if(!mysqli_stmt_prepare($stmt, $get_curr_pwd)){
      header('Location: ../adminDashboard2/template/settings.php?sqlError');
      exit();
    }
    else{
      mysqli_stmt_bind_param($stmt, "s", $username_sess);
      mysqli_stmt_execute($stmt);
    $result =  mysqli_stmt_get_result($stmt);
      if($row = mysqli_fetch_assoc($result)){
        $check_curr_pwd = password_verify($currPassword, $row['passWord']);
        if($check_curr_pwd == FALSE){
          header('Location: ../adminDashboard2/template/settings.php?incorrectPwd');
          exit();
        }
        else if($check_curr_pwd == TRUE){
          $update_curr_pwd = "UPDATE adminUsers SET passWord =? WHERE username=?";
          $stmt = mysqli_stmt_init($connectToDb);
          if(!mysqli_stmt_prepare($stmt, $update_curr_pwd)){
            header('Location: ../adminDashboard2/template/settings.php?sqlErrorTwo');
            exit();
          }
          else{
            $new_hashed_pwd = password_hash($newPwd, PASSWORD_DEFAULT);
            mysqli_stmt_bind_param($stmt, "ss", $new_hashed_pwd, $username_sess);
            if(!mysqli_stmt_execute($stmt)){
              header('Location: ../adminDashboard2/template/settings.php?pwdupdateFailed');
              exit();
            }
            else{
              header('Location: ../adminDashboard2/template/settings.php?updateSuccess');

            }
          }
        }
      }
    }
  }
}

?>
