<?php
if(isset($_POST['uploadPic'])){
  $targetPath = '../assets/userPics'.basename($_FILES['profilePic']['name']);
  require('dbHandler.php');
  $user_pic = $_FILES['profilePic']['name'];
  $upload_pic = 'INSERT INTO newUsers(profile_pic) VALUES(?)';
  $stmt = mysqli_stmt_init($connectToDb);
  if(!mysqli_stmt_prepare($stmt, $upload_pic)){
    echo 'A SQL error has occurred';
    exit();
  }
  else{
    mysqli_stmt_bind_param($stmt, "s", $profile_pic);
    if(!mysqli_stmt_execute($stmt)){
      echo 'Could not upload your profile pic';
    }
    else{
      if(move_uploaded_file($_FILES))
      'Picture uploaded!';
    }
  }
}

?>
