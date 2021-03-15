<?php
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require('../vendor/autoload.php');
require('../vendor/phpmailer/phpmailer/src/Exception.php');
require('../vendor/phpmailer/phpmailer/src/SMTP.php');
require('../vendor/phpmailer/phpmailer/src/PHPMailer.php');
if(isset($_POST['createAcct'])){
  require('dbHandler.php');
  $firstName = $_POST['firstName'];
  $lastName = $_POST['lastName'];
  $email = $_POST['email'];
  $phoneNum = $_POST['phoneNum'];
  $passWord = $_POST['passWord'];
  $retypePassword = $_POST['retypePassword'];
  $custType = $_POST['custType'];
  $vehMake = $_POST['vehMake'];
  $vehModel = $_POST['vehModel'];
  $vehColor = $_POST['vehColor'];
  $vehYear = $_POST['vehYear'];
  $vehLicense = $_POST['vehLicense'];
  // REGEX PATTERNS
  $pwdPattern = '/^(?=.*[!@#$%^&*-])(?=.*[0-9])(?=.*[A-Z]).{8,20}$/';
$phonePattern = '/^(\({1}\d{3}\){1}|\d{3})(\s|-|.)\d{3}(\s|-|.)\d{4}$/';

  // check if the fields are empty
  if(empty($firstName) || empty($lastName) || empty($email) || empty($phoneNum) || empty($passWord) || empty($retypePassword) || empty($vehMake) || empty($vehModel) || empty($vehColor)||empty($vehYear)||empty($vehLicense)){
    header('Location: ../signUp.php?emptyFields');
    exit();
  }
  else if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
    header('Location: ../signUp.php?invalidEmail');
    exit();
  }
  else if(!preg_match($phonePattern, $phoneNum)){
    header('Location: ../signUp.php?invalidNum');
    exit();
  }
  else if($custType == '0'){
    header('Location: ../signUp.php?noneSelected');
    exit();
  }
  else if($custType =='semesterly' && !strpos($email, '.edu')){
    header('Location: ../signUp.php?not_a_student');
    exit();
  }
  else if(!preg_match($pwdPattern, $passWord)){
    header('Location: ../signUp.php?invalidPassword');
    exit();
  }
  else if($retypePassword !== $passWord){
    header('Location: ../signUp.php?passwordsNotMatched');
    exit();
  }
  else{
    require('dbHandler.php');
    $query = 'SELECT * FROM newUsers WHERE email=? OR phoneNum=?';
    $stmt = mysqli_stmt_init($connectToDb);
    if(!mysqli_stmt_prepare($stmt, $query)){
      header('Location: ../signUp.php?sqlError');
      exit();
    }
    else{
      mysqli_stmt_bind_param($stmt, "ss", $email, $phoneNum);
      mysqli_stmt_execute($stmt);
      mysqli_stmt_store_result($stmt);
      // check for query results
      $checkQuery = mysqli_stmt_num_rows($stmt);

    }
    if($checkQuery > 0){
      header('Location: ../signUp.php?userExists');
      exit();
    }
    else{
      $verification_key = md5(time().$passWord); // Generate random verification key using
      // MD5 Hashing algorithm
      $auth_key = $_POST['verification_key'];
      $insertQuery = 'INSERT INTO newUsers (firstName, lastName, email, passWord, phoneNum, vehMake, vehModel, vehColor, vehYear, vehLicense, custType, verification_key) VALUES(?,?,?,?,?,?,?,?,?,?,?,?)';
      $stmt = mysqli_stmt_init($connectToDb);
      if(!mysqli_stmt_prepare($stmt, $insertQuery)){
        header('Location: ../signUp.php?secondsqlError');
        exit();
      }
      else{
        $hashedPwd = password_hash($passWord, PASSWORD_DEFAULT);
        mysqli_stmt_bind_param($stmt, "ssssssssisss", $firstName, $lastName, $email, $hashedPwd, $phoneNum, $vehMake, $vehModel, $vehColor, $vehYear, $vehLicense, $custType, $verification_key);
        mysqli_stmt_execute($stmt);

      }
      try{
        $mail = new PHPMailer(true);

          //Server settings
          $mail->SMTPDebug = 0; //Setting debug to 0 to prevent
          // verbose debug output from displaying to client                      //SMTP::DEBUG_SERVER; // Enable verbose debug output
          $mail->isSMTP(true);                                            // Send using SMTP
          $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through Gmail
          $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
          $mail->Username   = 'nhicvoting@gmail.com';                     // SMTP username
          $mail->Password   = 'ClubPenguin99!';                               // SMTP password
          $mail->SMTPSecure = ssl;//PHPMailer::ENCRYPTION_STMPS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
          $mail->Port       = 465; //PREVIOUSLY 587                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

          //Recipients
          $mail->setFrom('nhicvoting@gmail.com', 'The Club Admin');
          $mail->addAddress($email);     // Add a recipient
          //$mail->addAddress('ellen@example.com');               // Name is optional
          //$mail->addReplyTo('info@example.com', 'Information');
          //$mail->addCC('cc@example.com');
          //$mail->addBCC('bcc@example.com');

          // Attachments
        //  $mail->addAttachment('/var/tmp/f
        $body = '
        <!DOCTYPE HTML>
          <html lang="en" dir="ltr">
          <head>
          <style>
          @media only screen and (max-width: 600px) {
          .main {
          width: 320px !important;
          }

          .top-image {
          width: 100% !important;
          }
          .inside-footer {
          width: 320px !important;
          }
          table[class="contenttable"] {
          width: 320px !important;
          text-align: left !important;
          }
          td[class="force-col"] {
          display: block !important;
          }
          td[class="rm-col"] {
          display: none !important;
          }
          .mt {
          margin-top: 15px !important;
          }
          *[class].width300 {width: 255px !important;}
          *[class].block {display:block !important;}
          *[class].blockcol {display:none !important;}
          .emailButton{
          width: 100% !important;
          }

          .emailButton a {
          display:block !important;
          font-size:18px !important;
          }

          }

          </style>
          <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

                  </head>
          <body link="#00a5b5" vlink="#00a5b5" alink="#00a5b5">

          <table class=" main contenttable" align="center" style="font-weight: normal;border-collapse: collapse;border: 0;margin-left: auto;margin-right: auto;padding: 0;font-family: Arial, sans-serif;color: #555559;background-color: white;font-size: 16px;line-height: 26px;width: 600px;">
            <tr>
              <td class="border" style="border-collapse: collapse;border: 1px solid #eeeff0;margin: 0;padding: 0;-webkit-text-size-adjust: none;color: #555559;font-family: Arial, sans-serif;font-size: 16px;line-height: 26px;">
                <table style="font-weight: normal;border-collapse: collapse;border: 0;margin: 0;padding: 0;font-family: Arial, sans-serif;">
                  <tr>
                    <td colspan="4" valign="top" class="image-section" style="border-collapse: collapse;border: 0;margin: 0;padding: 0;-webkit-text-size-adjust: none;color: #555559;font-family: Arial, sans-serif;font-size: 16px;line-height: 26px;background-color: #fff;border-bottom: 4px solid #5cb85c">
                      <a href="http://localhost:8888/webDevProject/homepage.php"><img class="top-image" src="https://www.kindpng.com/picc/m/22-229918_night-club-logo-png-images-club-logo-png.png" style="line-height: 1;width: 600px;" alt="Club Logo"></a>
                    </td>
                  </tr>
                  <tr>
                    <td valign="top" class="side title" style="border-collapse: collapse;border: 0;margin: 0;padding: 20px;-webkit-text-size-adjust: none;color: #5cb85c; font-family: Arial, sans-serif;font-size: 16px;line-height: 26px;vertical-align: top;background-color: white;border-top: none;">
                      <table style="font-weight: normal;border-collapse: collapse;border: 0;margin: 0;padding: 0;font-family: Arial, sans-serif;">
                        <tr>
                          <td class="head-title" style="border-collapse: collapse;border: 0;margin: 0;padding: 0;-webkit-text-size-adjust: none;color: #555559;font-family: Arial, sans-serif;font-size: 28px;line-height: 34px;font-weight: bold; text-align: center;">
                            <div class="mktEditable" id="main_title">
                            The Club account setup
                            </div>
                          </td>
                        </tr>
                        <tr>
                          <td class="sub-title" style="border-collapse: collapse;border: 0;margin: 0;padding: 0;padding-top:5px;-webkit-text-size-adjust: none;color: #555559;font-family: Arial, sans-serif;font-size: 18px;line-height: 29px;font-weight: bold;text-align: center;">
                          <div class="mktEditable" id="intro_title">
                            Follow the instructions to verify your account
                          </div></td>
                        </tr>
                        <tr>
                          <td class="top-padding" style="border-collapse: collapse;border: 0;margin: 0;padding: 5px;-webkit-text-size-adjust: none;color: #555559;font-family: Arial, sans-serif;font-size: 16px;line-height: 26px;"></td>
                        </tr>

                        <tr>
                          <td class="top-padding" style="border-collapse: collapse;border: 0;margin: 0;padding: 15px 0;-webkit-text-size-adjust: none;color: #555559;font-family: Arial, sans-serif;font-size: 16px;line-height: 21px;">
                            <hr size="1" color="#eeeff0">
                          </td>
                        </tr>
                        <tr>
                          <td class="text" style="border-collapse: collapse;border: 0;margin: 0;padding: 0;-webkit-text-size-adjust: none;color: #555559;font-family: Arial, sans-serif;font-size: 16px;line-height: 26px;">
                          <div class="mktEditable" id="main_text">
                            Hi '.$firstName.'!<br><br>
                            We are sending you this email in order to complete the final step of the account setup, which is validating your email,
                            please click on "verify account" to continue. Once verified, you will be able to log in
                          </div>

                          </td>
                        </tr>
                        <tr>
                          <td style="border-collapse: collapse;border: 0;margin: 0;padding: 0;-webkit-text-size-adjust: none;color: #555559;font-family: Arial, sans-serif;font-size: 16px;line-height: 24px;">
                           &nbsp;<br>
                          </td>
                        </tr>
                        <tr>
                          <td class="text" style="border-collapse: collapse;border: 0;margin: 0;padding: 0;-webkit-text-size-adjust: none;color: #555559;font-family: Arial, sans-serif;font-size: 16px;line-height: 24px;">
                          <div class="mktEditable" id="download_button" style="text-align: center;">
         <a style="color:#ffffff; background-color: #5cb85c;  border: 10px solid #5cb85c; border-radius: 3px; text-decoration:none;" href="http://localhost:8888/webDevProject/verify.php?auth_token='.$verification_key.'">Please verify your account via this link</a></div>
                          </td>
                        </tr>

                      </table>
                    </td>
                  </tr>
                  <tr>
                    <td style="padding:20px; font-family: Arial, sans-serif; -webkit-text-size-adjust: none;" align="center">

                    </div>
                    </td>
                  </tr>
                  <tr>
                    <td valign="top" align="center" style="border-collapse: collapse;border: 0;margin: 0;padding: 0;-webkit-text-size-adjust: none;color: #5cb85c;font-family: Arial, sans-serif;font-size: 16px;line-height: 26px;">
                      <table style="font-weight: normal;border-collapse: collapse;border: 0;margin: 0;padding: 0;font-family: Arial, sans-serif;">
                        <tr>
                          <td align="center" valign="middle" class="social" style="border-collapse: collapse;border: 0;margin: 0;padding: 10px;-webkit-text-size-adjust: none;color: #5cb85c;font-family: Arial, sans-serif;font-size: 16px;line-height: 26px;text-align: center;">
                            <table style="font-weight: normal;border-collapse: collapse;border: 0;margin: 0;padding: 0;font-family: Arial, sans-serif;">
                              <tr>

                              </tr>
                            </table>
                          </td>
                        </tr>
                      </table>
                    </td>
                  </tr>
                  <tr bgcolor="#fff" style="border-top: 4px solid #5cb85c;">
                    <td valign="top" class="footer" style="border-collapse: collapse;border: 0;margin: 0;padding: 0;-webkit-text-size-adjust: none;color: #555559;font-family: Arial, sans-serif;font-size: 16px;line-height: 26px;background: #fff;text-align: center;">
                      <table style="font-weight: normal;border-collapse: collapse;border: 0;margin: 0;padding: 0;font-family: Arial, sans-serif;">
                        <tr>
                          <td class="inside-footer" align="center" valign="middle" style="border-collapse: collapse;border: 0;margin: 0;padding: 20px;-webkit-text-size-adjust: none;color: #555559;font-family: Arial, sans-serif;font-size: 12px;line-height: 16px;vertical-align: middle;text-align: center;width: 580px;">
          <div id="address" class="mktEditable">
                            <b>The Club</b><br>
                                  44 Party Lane, Los Angeles, California, 90001<br>
                                    <a style="color: #00a5b5;" href="mailto:khalednached@gmail.com">Contact Us</a>
          </div>
                          </td>
                        </tr>
                      </table>
                    </td>
                  </tr>
                </table>
              </td>
            </tr>
          </table>
          </body>
          </html>';
          // Specify the email content
          $mail->Subject ='The Club, account verification';
          $mail->isHTML(true); // Use HTML for rich email content
          $mail->Body = $body;
          $mail->AltBody = 'Hi, '.$firstName. ', we are sending you this email to confirm your email with us. <a href="http://localhost:8888/webDevProject/verify.php?auth_token='.$verification_key.'">';
          if(!$mail->send()){
            header('Location: ../signUp.php?email_send_failed');
            exit();
          }
          else{
            $mail->smtpClose();
            header('Location: ../thankyou.php?email='.$email.'');
            exit();
          }
      }
      catch(phpmailerException $e){
        echo "Email could not be sent. Error status: $mail->getMessage()";
        return FALSE;

      }
    }
    // close out prepared statement and database for faster execution
    mysqli_stmt_close($stmt);
    mysqli_close($connectToDb);
  }
  exit();
}
else{
  header('Location: ../signUp.php');
}
 ?>
