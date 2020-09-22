<?php

if(isset($_POST['login'])){
  require('dbHandler.php');
  $email = $_POST['email'];
  $passWord = $_POST['passWord'];

// check if the fields are empty
  if(empty($email) || empty($passWord)){
    header('Location: login.php?error=emptyfields');
    exit();
  }
  else{
    $query = 'SELECT * FROM newUsers WHERE email=?';
    // initialize the prepared statement
    $preparedStmt = mysqli_stmt_init($connectToDb);

    // run the SQL and prepared statement
    // runs query string in the DB and checks for errors
    if(!mysqli_stmt_prepare($preparedStmt, $query)){
      header('Location: login.php?error=sqlerror');
      exit();
    }
    else{
      // if no errors in the SQL query
      mysqli_stmt_bind_param($preparedStmt, "s", $email);
      // now execute the binded prepared statement
      mysqli_stmt_execute($preparedStmt);

      // get results from the DB
      $results = mysqli_stmt_get_result($preparedStmt);
      // check to see if we got results from the DB

      // fetch data from the result and place results in an ASSOCIATIVE ARRAY
      // which is the format that can be worked with in PHP
      if($row = mysqli_fetch_assoc($results)){
        // grab the password from the user, hash it and see if it matches with the pwd that the user tried to login with
        $checkPwd = password_verify($passWord, $row['passWord']);
        if($checkPwd == false){
          header('Location: login.php?error=wrongpassword&email='.$email.'');
          exit();
        }
        else if($checkPwd == true){
          session_start(); // start a session to remember the user on the SERVER
          $_SESSION['email']=$row['email'];
          header('Location: userDashboard.php?success=userLoggedin');
          exit();
        }
        else{
          // if the user entered a password that is not a string
          header('Location: login.php?error=wrongpassword&email='.$email.'');
          exit();
        }
      }
      else{
        // if no results were matched in the DB
        header('Location: login.php?error=nouser');
        exit();
      }

    }
  }
}
else{
  header('Location: homepage.php');
  exit();
}


?>
