<?php
if(isset($_POST['login'])){
  require('dbHandler.php');

  // Grab POST DATA
  $email = $_POST['email'];
  $passWord = $_POST['passWord'];
  if(empty($email)||empty($passWord)){
    header('Location: login.php?error=emptyfields');
    exit();
  }
  // validate the email
  else if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
    header('Location: login.php?error=invalidemail');
    exit();
  }
  // validate the password is the correct length
  else if(strlen(string)$passWord <8)
  {
    header('Location: login.php?error=invalidpassword&email='.$email.'');
    exit();
  }
  else{
    // if everything is all good
    $connectToDb = mysqli_connect($serverName, $user, $password, $dbname);
    if(!$connectToDb){
      die("Connection failed".mysqli_connect_errno().mysqli_connect_error());
    }
    $query = 'SELECT email, passWord FROM newUsers WHERE email=? AND passWord=?';
    // initialize the prepared statement
    $stmtPrepared = mysqli_stmt_init($connectToDb);
    if(!mysqli_stmt_prepare($stmtPrepared, $query)){
      header('Location: login.php?error=sqlError')
      exit();
    }
    // If the Prepared statement was successful
    // bind the parameters
    mysqli_stmt_bind_param($stmtPrepared, 'ss', $email, $passWord);
    // execute the prepared statement
    mysqli_stmt_execute($stmtPrepared);
    // store the results in the prepared statment variable
    $results = mysqli_get_result($stmtPrepared);
    if($row = mysqli_fetch_assoc($results))
    {
      $checkPassword = password_verify($passWord, $row['passWord']);
      if($checkPassword == FALSE){
        header('Location: login.php?error=wrongpassword&email='.$email.'');
        exit();
      }
      else if($checkPassword == TRUE){
        // if pwd is matched against the one in the DB, then start the session
        session_start();
        $_SESSION['passWord']=$row['passWord'];
        $_SESSION['email']=$row['email'];
        // redirect the user to their dashboard
        header('Location: userDashboard.php?success=userloggedin');
        exit();
      }
      else{
        header('Location: login.php?error=wrongpassword&email='.$email.'');
        exit();
      }
    }
    else{
      header('Location: login.php?error=nouser');
      exit();
    }
  }
}
else{
  header('Location: homepage.php');
  exit();
}
?>
