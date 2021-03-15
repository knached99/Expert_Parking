<?php
if(isset($_POST['submit'])){
  $userId = $_POST['userId'];
  $firstName = $_POST['firstName'];
  $lastName = $_POST['lastName'];
  $email = $_POST['email'];
  $phoneNum = $_POST['phoneNum'];
  $subject = $_POST['subject'];
  $message = $_POST['message'];

    if($subject == '0'){
    header('Location: ../memberdashboard/contactAdmin.php?nosubject');
    exit();
  }
  else if(strlen((string)$message)<20){
    header('Location: ../memberdashboard/contactAdmin.php?messageLen');
    exit();

}
else{
  require('dbHandler.php');
  $query = "INSERT INTO cust_messages(firstName, lastName, email, phoneNum, subject, message, userId) VALUES(?,?,?,?,?,?,?)";
  $stmt = mysqli_stmt_init($connectToDb);
  if(!mysqli_stmt_prepare($stmt, $query)){
    header('Location: ../memberdashboard/contactAdmin.php?sqlError');
    exit();
  }
  else{
    mysqli_stmt_bind_param($stmt, "ssssssi", $firstName, $lastName, $email, $phoneNum, $subject, $message,$userId);
    mysqli_stmt_execute($stmt);
    header('Location: ../memberdashboard/contactAdmin.php?messageSent');
    exit();
  }
  }
  mysqli_stmt_close($stmt);

  mysqli_close($connectToDb);
}
else{
  pass;
}

?>
