<?php
session_start();
if(!isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] !== true && $_SESSION["admin"] !== "admin"){
    header("location: index");
    exit;
}
include 'config.php';
$getid = filter_var($_GET['id'],FILTER_SANITIZE_STRING);
$sql = "DELETE FROM payment  WHERE id='$getid'";
if (mysqli_query($con,$sql)) {
	header('location:payment?menu=pay&msg=deleted');
}

?>