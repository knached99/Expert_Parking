<?php
if(isset($_POST['submit'])){


// Create email connection
  /*require_once('vendor/autoload.php');
  $mail = new PHPMailer();
  $mail -> isSMTP();
  $mail -> SMTPAuth = True;
  $mail -> STMPSecure = 'ssl';
  $mail ->HOST ='stmtp.gmail.com';
  $mail ->Port ='465';
  $mail ->isHTML();
  $mail ->Username = 'ExpertParkingLLC@gmail.com';
  $mail ->Password ='ExpertParking99!';
  $mail ->setFrom('no-reply@ExpertParking.com');
  $mail ->Subject = 'Thank you for contacting us';
  $mail ->Body = 'Hi,'.$name.'Thank you for reaching out to us. Your message is currently being reviewed. We will contact you shortly.';
  $mail->AddAddress($email);
  $mail->Send();
  */



    // GET THE FORM DATA USING THE $_POST METHOD
  $name = $_POST['name'];
  $subject = $_POST['subject'];
  $phone = $_POST['phone'];
  $email = $_POST['email'];
  $message =$_POST['message'];
  $mailTo = "khalednached@gmail.com";

  // if fields are empty send user back to the form
  if(empty($name) || empty($subject) || empty($phone) || empty($email) || empty($message))
  {
    header('Location: contactUs.php?error=emptyfields&name='.$name.'&subject='.$subject.'&phone='.$phone.'&email='.$email.'&message='.$message);
    exit();
  }
  //Validate user's email using PHP's built in function
  else if(!filter_var($email, FILTER_VALIDATE_EMAIL))
  {
header('Location: contactUs.php?error=invalidemail&name='.$name.'&subject='.$subject.'&phone='.$phone.'&email='.$email.'&message='.$message);
    exit();
  }
  // if the fields are good, first check that this user exists
  else
  {
    $sqlQuery = 'SELECT * FROM newUsers WHERE email = ? or phoneNum = ?';
    $preparedStmt = mysqli_stmt_init($connectToDb);

    if(!mysqli_stmt_prepare($preparedStmt, $sqlQuery))
    {
      // prepares query to connect to DB. If this connection fails
header('Location: contactUs.php?error=sqlError&name='.$name.'&subject='.$subject.'&phone='.$phone.'&email='.$email.'&message='.$message);
      exit();
    }
    else
    {
      mysqli_stmt_bind_param($preparedStmt, "si", $email, $phoneNum); // fills in the parameters in the sql query with the arguments
      // 's' stands for string, 'i' stands for integer, 'D' for double

      // Once data has been binded, we send it to the database to see if that data is already there
      mysqli_stmt_execute($preparedStmt);

      // Now check to see if that user exists and
      mysqli_stmt_store_result($preparedStmt); // gets result from the DB and store it in the $prepared stmt variable

      $checkQueryResults = mysqli_stmt_num_rows($preparedStmt); // check number of rows that come back from the query
      // if no empty data come back from the query, then the data does already exist in the rows.

      // This time, we want this user to exist in the database.
      // So, we pass if they exist.
      if($checkQueryResults == 0)
      {
            // User does not exist
            header('Location: contactUs.php?error=userDoesNotExist&name='.$name.'&phone='.$phone.'&email='.$email.='&message='.$message.'&subject='.$subject);
            exit();
      }
      else
      {
        // send email!
      }
    }
  }
  exit();
}


?>
