<?php
// Initialize the session
if (isset($_GET['msg'])) {
	session_start();
session_regenerate_id();
// Unset all of the session variables
$_SESSION = array();

// Destroy the session.
session_destroy();
 $getmsg = $_GET['msg'];
// Redirect to login page
header("location: index?msg=".$getmsg);
exit();
}
session_start();
session_regenerate_id();
// Unset all of the session variables
$_SESSION = array();

// Destroy the session.
session_destroy();
 
// Redirect to login page
header("location: index");
exit;
?>