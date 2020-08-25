<?php
if(isset($_POST['signup_submit'])){ // isset() checks to see if the variable has been set.
  // in this case if the submit button has been clicked



// if user clicks on submit, then we require that DB connection is active to process data
   require('dbHandler.php'); // requires the dbHandler.php file in order to import that code for use
   // require produces a FATAL error if and stops the script
   // include only produces a warning and continues the script


  // Using $_POST method to collect form data after submission
  //POST is a little safer than GET because the parameters are not stored in browser history or in web server logs
  $email = $_POST['email'];
  $fName = $_POST['fName'];
  $lName = $_POST['lName'];
  $phoneNum = $_POST['phoneNum'];
  $vehMake = $_POST['vehMake'];
  $vehModel = $_POST['vehModel'];
  $vehYear = $_POST['vehYear'];
  $vehLicense = $_POST['vehLicense'];
  $passWord = $_POST['password'];
  $passWord2 = $_POST['password2'];

  // if fields are empty send user back to the form

  if(empty($email)|| empty($fName) || empty($lName) || empty($phoneNum)||empty($vehMake)||empty($vehModel)||empty($vehYear)||empty($vehLicense)){
     header('Location: signUp.php?error=emptyfields&email='.$email.'&fName='.$fName.'&lName='.$lName.'&phoneNum='.$phoneNum.'&vehMake='.$vehMake.'&vehModel='.$vehModel.'&vehYear='.$vehYear.'&vehLicense='.$vehLicense);
    exit(); // Stops the script from running if any errors occurr
  }

  //Validate user's email using PHP's built in function
  else if(!filter_var($email, FILTER_VALIDATE_EMAIL)){

    header('Location: signUp.php?error=invalidemail&fName='.$fName.'&lName='.$lName.'&phoneNum='.$phoneNum.'&vehMake='.$vehMake.'&vehModel='.$vehModel.'&vehYear='.$vehYear. '&vehLicense='.$vehLicense);
    exit();
  }

  else if(strlen((string)$vehYear)!=4){

    header('Location: signUp.php?error=invalidYear&fName='.$fName.'&lName='.$lName.'&phoneNum='.$phoneNum.'&email='.$email.'&vehMake='.$vehMake.'&vehModel='.$vehModel.'&vehLicense='.$vehLicense);
    exit();
  }
  else if((strlen((string)$vehLicense) <7 ||strlen((string)$vehLicense) >8) && !preg_match("/([A-HJ-PR-Y]{2}([0][1-9]|[1-9][0-9])|[A-HJ-PR-Y]{1}([1-9]|[1-2][0-9]|30|31|33|40|44|55|50|60|66|70|77|80|88|90|99|111|121|123|222|321|333|444|555|666|777|888|999|100|200|300|400|500|600|700|800|900))[ ][A-HJ-PR-Z]{3}$/", (string)$vehLicense)){

    header('Location: signUp.php?error=invalidLicense&fName='.$fName.'&lName='.$lName.'&phoneNum='.$phoneNum.'&vehMake='.$vehMake.'&vehModel='.$vehModel.'&vehYear='.$vehYear.'&email='.$email);

    exit();

  }
  else if(strlen((string)$passWord) < 8){

    header('Location: signUp.php?error=invalidPassword&fName='.$fName.'&lName='.$lName.'&phoneNum='.$phoneNum.'&vehMake='.$vehMake.'&vehModel='.$vehModel.'&email='.$email.'&vehYear='.$vehYear.'&vehLicense='.$vehLicense);
    exit();
  }
  else if($passWord2 !==$passWord){

    header('Location: signUp.php?error=passwordsdontmatch&fName='.$fName.'&lName='.$lName.'&phoneNum='.$phoneNum.'&vehMake='.$vehMake.'&vehModel='.$vehModel.'&email='.$email.'&vehYear='.$vehYear.'&vehLicense='.$vehLicense);

    exit();
  }
  else {



    $connectToDb =  mysqli_connect($serverName, $user, $password, $dbName);
    if(!$connectToDb){
      die("Connection failed".mysqli_connect_error());

      // mysqli_connect_errno throws out an error number
    }
   // Check if there is an existing user under this profile. Check for first and last name
   // create an SQL

   $sqlQuery = 'SELECT email, phoneNum FROM newUsers WHERE email = ? or phoneNum =?';
   // Create a prepared statement to run the query
//prepared statement prepare the query to pass through the DB connection
   $preparedStmt = mysqli_stmt_init($connectToDb);

   if(!mysqli_stmt_prepare($preparedStmt, $sqlQuery) ) { // if we cannot prepare the SQL query for the specified DB connection then it fails
     // prepares query to connect to DB. If this connection fails
     header('Location: signUp.php?error=sqlError&fName='.$fName.'&lName='.$lName.'&phoneNum='.$phoneNum.'&vehMake='.$vehMake.'&vehModel='.$vehModel.'&email='.$email.'&vehYear='.$vehYear.'&vehLicense='.$vehLicense);
     exit();
   }

   // For Testing, comment out when implementing the rest
   //header("Location: signUp.php?signup=success");
   //exit();
//mysqli_stmt_prepare() executes SQL statements repeatedelt with high efficeincy
   else{
     mysqli_stmt_bind_param($preparedStmt, "si", $email, $phoneNum); // fills in the parameters in the sql query with the arguments
     // 's' stands for string, 'i' stands for integer, 'D' for double

     // Once data has been binded, we send it to the database to see if that data is already there
     mysqli_stmt_execute($preparedStmt);

     // Now check to see if that user exists and
     mysqli_stmt_store_result($preparedStmt); // gets result from the DB and store it in the $prepared stmt variable

     $checkQueryResults = mysqli_stmt_num_rows($preparedStmt); // check number of rows that come back from the query
     // if no empty data come back from the query, then the data does already exist in the rows.
   }
   if($checkQueryResults > 0) // if there are more than 0 rows that have been returned. Send user back to sign up form
   {
    header('Location: signUp.php?error=userExists&fName='.$fName.'&lName='.$lName.'&vehMake='.$vehMake.'&vehModel='.$vehModel.'&vehYear='.$vehYear);
    exit();
   }
   else{

     // now sign up the user into the DB
     $sqlQuery = "INSERT INTO newUsers (firstName, lastName, email, phoneNum, vehMake, vehModel, vehYear, vehLicense, passWord) VALUES(?,?,?,?,?,?,?,?,?)";
     $preparedStmt = mysqli_stmt_init($connectToDb);
     // check to see if we can run this SQL statement in the DB
     if(!mysqli_stmt_prepare($preparedStmt, $sqlQuery)){ // prepares query to connect to DB. If this connection fails
       header('Location: signUp.php?error=secondSqlError&fName='.$fName.'&lName='.$lName.'&phoneNum='.$phoneNum.'&vehMake='.$vehMake.'&vehModel='.$vehModel.'&email='.$email.'&vehYear='.$vehYear.'&vehLicense='.$vehLicense);
       exit();
     }
     else{

       // before we send the password to the DB we must hash it to protect from hackers. Using BCRYPT method
       // since it is safer tha md5#

       $hashPwd = password_hash($passWord, PASSWORD_DEFAULT);
       mysqli_stmt_bind_param($preparedStmt, "sssississ", $fName, $lName, $email, $phoneNum, $vehMake, $vehModel, $vehYear, $vehLicense, $hashPwd); // fills in the parameters in the sql query with the arguments
       // 's' stands for string, 'i' stands for integer, 'D' for double

       // Once data has been binded, we send it to the database to see if that data is already there
       mysqli_stmt_execute($preparedStmt);

       // Now check to see if that user exists and
       mysqli_stmt_store_result($preparedStmt); // gets result from the DB and store it in the $prepared stmt variable

       header('Location: successPage.php?signup=successnewuser');
       exit();
       }
     }
    // check to see if we can prepare the SQL statment with our SQL connection
    // close off the SQL statement and SQL connection
    mysqli_stmt_close($preparedStmt);
    mysqli_close($connectToDb);

  }
  exit();

}

?>
