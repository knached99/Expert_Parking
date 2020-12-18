<?php
$serverName = "localhost";
$user = "root";
$password = "root";
$dbName = "userInfo";
$connectToDb =  mysqli_connect($serverName, $user, $password, $dbName);
if(!$connectToDb){
  die("Connection failed".mysqli_connect_error() ."with status:<t>" .mysqli_connect_errno());
}


 ?>
