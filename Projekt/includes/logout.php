<?php
// Initialize the session
session_start();
 
// Unset all of the session variables
$_SESSION = array();
 
// Destroy the session.
session_destroy();
 
// Redirect to login page located at root of the project( <project root>/login.php )

header("location: /DT100G/Projekt/login.php");


exit;
?>