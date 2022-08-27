<?php
// initider session
session_start();
 
//  session variables
$_SESSION = array();
 
// Destroy the session.
session_destroy();
 
// rediriger vers login page
header("location: ../index.php");
exit;
?>