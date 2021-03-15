<?php
require('dbHandler.php');
$requestId = $_GET['requestId'];
$del_reservation = mysqli_query($connectToDb, 'DELETE from cust_messages WHERE requestId= "'.$requestId.'"');
if($del_reservation){
  mysqli_close($connectToDb);
  header('Location: ../adminDashboard2/template/adminDash2.php?msg_dltd');
  exit();
}
else{
  header('Location: ../adminDashboard2/template/adminDash2.php?delete_error');
  exit();
}

?>
