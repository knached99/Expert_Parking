<?php
if(isset($_POST['replyBack'])){
  require('dbHandler.php');
  $messageId = $_GET['messageId'];
  $message = $_POST['message'];
   if(strlen((string)$message)<10){
     header('Location: ../adminDashboard2/template/reply_to_cust.php?messageId='.$_GET['messageId'].'&error=messageLen');
    exit();
  }
  else{
    $send_response = 'INSERT INTO adminResponse (messageId, message) VALUES(?,?)';
    $stmt = mysqli_stmt_init($connectToDb);
    if(!mysqli_stmt_prepare($stmt, $send_response)){
      header('Location: ../adminDashboard2/template/reply_to_cust.php?messageId='.$_GET['messageId'].'&error=sqlError');
      exit();
    }
    else{
      mysqli_stmt_bind_param($stmt, "is", $messageId, $message);
      if(!mysqli_stmt_execute($stmt)){
        header('Location: ../adminDashboard2/template/reply_to_cust.php?messageId='.$_GET['messageId'].'&error=messageUnsent');
        exit();
      }
      else{
        header('Location: ../adminDashboard2/template/reply_to_cust.php?messageId='.$_GET['messageId'].'&success=messageSent');
        exit();
      }

    }
    mysqli_stmt_close($stmt);
    mysqli_close($connectToDb);
  }
}

?>
