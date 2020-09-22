<?php
session_start();

// takes variables that were created upon login
// and it deletes the values inside the session variables
session_unset();

// destroy the currently running sessions
session_destroy();

// take user back to front page
header('Location: homepage.php');


?>
