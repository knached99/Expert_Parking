<?php
if(isset($_POST['login']))
{


require('dbHandler.php');
// GRAB THE POST DATA
$email = $_POST['email'];
$passWord = $_POST['passWord'];

// validate user input
if(empty($email)||empty($passWord))
{
  header('Location: login.php?error=emptyfields&email='.$email.'&passWord='.$passWord);
  exit();
}

// validate email
// filter_var accepts two arguments,
//the thing you want to filter and the function that validates
else if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
  header('Location: login.php?error=invalidemail');
  exit();
}
else{
  // Query the DB to check for correct login credentials
  $sqlQuery = "SELECT * FROM newUsers WHERE email= ? AND passWord=?";
  // prepare the SQL Query, init takes DB connection as argument to
  // initialize connection
  $preparedStmt = mysqli_stmt_init($connectToDb);
  // check if the prepared statement does not work
  // takes prepared statement and sql query as arguments
  if(!mysqli_stmt_prepare($preparedStmt, $sqlQuery))
  {
    header('Location: login.php?error=sqlerror')
    exit();
  }
  else{
    // if the prepared statement was successful
    // Grab the data that the user input
    // pass parameters that user wrote
    // 3 parameters
    // statement, datatype, and data
    mysqli_stmt_bind_param($preparedStmt, "ss", $email, $passWord);
    // now execute the prepared statement
    mysqli_stmt_execute($preparedStmt);
    // Get the prepared statement results
    $queryResults = mysqli_stmt_get_result($preparedStmt);

    // check to see if any results were returned from the DB
    // fetch associative array
    if($rows = mysqli_fetch_assoc())
    //password_verify() takes the pwd that user entered
    // and pwd from the DB, hash it and verify if it is correct
    //$row[' '] <-- put the column from the DB within the brackets
    $pwdCheck = password_verify($passWord, $row['passWord']);
    if($pwdCheck == false)
    {
      header('Location: login.php?error=wrongPassword');
      exit();
    }
    else if($pwdCheck == true)
    {
    // START A SESSION by using $_SESSION global variable
    session_start();
    //create a session variable for the user's ID and email
    $_SESSION[]= $row['userId'];
    $_SESSION[] = $row['email'];
    header('Location: userDashboard.php?success=loggedin');
    exit();
    }
    // grab the PWD and email from the user,
    // take the pwd and hash and verify that the hashed pwd is the right pwd
  }
  // if no data was returned
  else{
    header('Location: login.php?error=noUser');
    exit();
  }
}


}
else{
  header('Location: homepage.php');
  exit();
}

?>
