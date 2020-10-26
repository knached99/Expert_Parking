<?php
if(isset($_POST['submit'])){


// Write the auotmated mail script here


    // GET THE FORM DATA USING THE $_POST METHOD
  $name = $_POST['name'];
  $subject = $_POST['subject'];
  $phone = $_POST['phone'];
  $email = $_POST['email'];
  $message =$_POST['message'];
  // phone number length
  //$mailTo = "khalednached@gmail.com"; // won't work in local server
  $phoneNumLength = strlen((string)$phoneNum!=10);

  $noChars = preg_replace("/[^0-9]/",'',$phoneNum);

  // if fields are empty send user back to the form
  if(empty($name) && empty($phone) && empty($email) && empty($message))
  {
    header('Location: contactUs.php?error=emptyfields&name='.$name.'&subject='.$subject.'&phone='.$phone.'&email='.$email.'&message='.$message);
    exit();
  }
  //Validate user's email using PHP's built in function
  else if(!filter_var($email, FILTER_VALIDATE_EMAIL))
  {
header('Location: contactUs.php?error=invalidemail&name='.$name.'&subject='.$subject.'&phone='.$phone.'&message='.$message);
    exit();
  }
  else if(!preg_match('/^[0-9]{3}-[0-9]{3}-[0-9]{4}$/', $_POST['phoneNum']) && !$phoneNumLength){
    header('Location: contactUs.php?error=invalidPhoneNum&name='.$name.'&email='.$email.'&subject='.$subject.'&message='.$message);
  }
  else if(strlen((string)$message)<100){
    header('Location: contactUs.php?error=messageIsTooShort&name='.$name.'&email='.$email.'&phoneNum='.$phoneNum.'&subject='.$subject);
    exit();
  }
  else if($subject =='0'){
    header('Location: contactUs.php?error=noSubjectSelected&name='.$name.'&email='.$email.'&phone='.$phone.'&message='.$message);
  }
  else{
    // if everything is valid
    header('Location: contactUs.php?success=messageSent');
    exit(); // exit() function stops script from running if there is an error.
  }

}
else{
  pass;
}


?>
