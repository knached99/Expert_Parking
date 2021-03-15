<?php
if(isset($_POST['sendMessage'])){
  require('dbHandler.php');
  $fullName = $_POST['fullName'];
  $email = $_POST['email'];
  $phoneNum = $_POST['phoneNum'];
  $message = $_POST['message'];
  $phonePattern = '/^(\({1}\d{3}\){1}|\d{3})(\s|-|.)\d{3}(\s|-|.)\d{4}$/';

  if(empty($fullName) || empty($email) || empty($phoneNum)){
    header('Location: ../homepage.php?emptyfields');
    exit();
  }
  else if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
    header('Location: ../homepage.php?invalidEmail');
    exit();
  }
  else if(!preg_match($phonePattern, $phoneNum)){
    header('Location: ../homepage.php?invalidNum');
    exit();
  }
  else if(strlen((string)$message)<20){
    header('Location: ../homepage.php?messageLen');
    exit();

}
else{
  require('dbHandler.php');
  $query = "INSERT INTO messages(fullName, email, phoneNum, message) VALUES(?,?,?,?)";
  $stmt = mysqli_stmt_init($connectToDb);
  if(!mysqli_stmt_prepare($stmt, $query)){
    header('Location: ../homepage.php?sqlError');
    exit();
  }
  else{
    mysqli_stmt_bind_param($stmt, "ssss", $fullName, $email, $phoneNum, $message);
    mysqli_stmt_execute($stmt);
    header('Location: ../homePage.php?messageSent');
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
