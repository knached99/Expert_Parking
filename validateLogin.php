<?php
if(isset($_POST['login']))
{
  require('dbHandler.php');

  // grab the POST data using the $_POST global variable
  $email = $_POST['email'];
  $passWord = $_POST['passWord'];

  // check if the values are empty
  if(empty($email)||empty($passWord))
  {
    header('Location: login.php?error=emptyfields');
    exit();
  }
  else{
    // construct the SQL Query
    $query = 'SELECT * newUsers WHERE email=? AND passWord=?';

    // initialize the prepared statement and pass DB connection as argument
    $preparedStmt = mysqli_stmt_init($connectToDb);

    // if it does not prepare the statement,

    if(!mysqli_stmt_prepare($preparedStmt, $query)){
      header('Location: login.php?error=sqlError');
      exit();
    }
    else{
      // grab the data we got from the select statement
      // bind param takes 3 arguments, prepared statement, datatype of data, and data
      mysqli_stmt_bind_param($preparedStmt, "ss", $email, $passWord);
      // once parameters have been binded, execute the prepared statement
      mysqli_stmt_execute($prearedStmt);
      // get the results of the prepared statement
      $results = mysqli_get_result($preparedStmt);
      // check if there were any results
      // use mysqli_fetch_assoc() <-- pass in row variable to get results as
      // associative array
      if($row = mysqli_fetch_assoc($row))
      {
        // grab pwd from user, take it from DB, hash it and see if it matches
        // to see if the pwds match, use the password_verify()
        // two parameters, password that user tried to put and password from DB
        $pwdCheck = password_verify($passWord, $row['passWord']);
        // use true or false to check if pwed check is true or false
        if($pwdCheck == false){
          header('Location: login.php?error=wrongpassword');
          exit();
        }
        else if($pwdCheck ==true){
          // to login user,
          // use the global variable $_SESSION
          // Start the session
          session_start()
          // set session variables equal to information we have about user inside the DB
          $_SESSION[]=$row['userId'];
          $_SESSION[]=$row['email'];

          header('location userDashboard.php?success=userloggedin');
          exit();
        }
        else{
          header('Location: login.php?error=wrongpassword');
          exit();
        }
      }
      else{
        header('Location: login.php?error=nouser');
        exit();
      }

    }
  }
}
else{
  header('Location: signUp.php');
  exit();
}
?>
