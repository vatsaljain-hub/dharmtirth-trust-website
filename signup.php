<?php
	include 'admincp/config.php';
	$name = filter_var($_POST['name'],FILTER_SANITIZE_STRING);
	$state = filter_var($_POST['state'],FILTER_SANITIZE_STRING);
	$city = filter_var($_POST['city'],FILTER_SANITIZE_STRING);
	$phone = filter_var($_POST['phone'],FILTER_SANITIZE_STRING);
	$date = filter_var($_POST['date'],FILTER_SANITIZE_STRING);
	if (mysqli_query($con,"INSERT INTO user_app VALUES (NULL,'$name','$state','$city','$date','$phone') ")) {
		echo "Success";
	}
	else
	{
		echo "Error".mysqli_error($con);
	}
?>