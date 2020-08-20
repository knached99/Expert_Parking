<?php
if(isset($_POST['submit'])){


/*  require_once('vendor/autoload.php');
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
  //$mailTo = "khalednached@gmail.com"; // won't work in local server 

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
  else if(preg_match('/^(\+1|001)?\(?([0-9]{3})\)?([ .-]?)([0-9]{3})([ .-]?)([0-9]{4})/',$phoneNum)){
    header('Location: contactUs.php?error=invalidPhoneNum&name='.$name.'&email='.$email.'&subject='.$subject.'&message='.$message);
  }
  else if(strlen((string)$message)<100){
    header('Location: contactUs.php?error=messageIsTooShort&name='.$name.'&email='.$email.'&subject='.$subject);
    exit();
  }
  else{
    // if everything is valid
    header('Location: contactUs.php?success=messageSent');
    exit(); // exit() function stops script from running if there is an error.
  }

}


?>
