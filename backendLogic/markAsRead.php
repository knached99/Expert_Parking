<?php
if(isset($_POST['markRead'])){

  require('dbHandler.php');
  $messageId = $_GET['messageId'];
  $del_msg = mysqli_query($connectToDb, 'DELETE FROM adminResponse WHERE messageId='.$_GET['messageId'].'');
  if($del_msg){
    mysqli_close($connectToDb);
    header('Location: ../memberdashboard/view_message.php?msg_deleted');
    exit();
  }
  else{
    header('Location: ../memberdashboard/view_message.php?delete_error');
    exit();
  }
}
?>
