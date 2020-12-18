<?php
if(isset($_POST['submit'])){
  $firstName = $_POST['firstName'];
  $lastName = $_POST['lastName'];
  $email = $_POST['email'];
  $phoneNum = $_POST['phoneNum'];
  $subject = $_POST['subject'];
  $message = $_POST['message'];
  if(empty($firstName)||empty($lastName)||empty($email)||empty($phoneNum)||empty($subject)||empty($message)){
    header('Location: ../contactAdmin.php?emptyfields');
    exit();
  }
  else if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
    header('Location: ../contactAdmin.php?invalidEmail');
    exit();
  }
  else if(preg_match("/^[0-9]{3}-[0-9]{4}-[0-9]{4}$/", $phoneNum)){
    header('Location: ../contactAdmin.php?invalidNumber');
    exit();
  }
  else if($subject == 0){
    header('Location: ../contactAdmin.php?nosubject');
    exit();
  }
  else if(strlen((string)$message)<50){
    header('Location: ../contactAdmin.php?messageLen');
    exit();

}
else{
  require('dbHandler.php');
$is_insert = $connectToDb->query("INSERT INTO messages('firstName','lastName','email','phoneNum','subject','message')VALUES('$firstName','$lastName','$email', '$message','$subject','$message')");
if($is_insert == TRUE){
  header('Location: ../contactAdmin.php?messagesent');
  exit();
}
}
}

?>
