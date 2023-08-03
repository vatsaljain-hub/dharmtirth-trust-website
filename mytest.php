<?php
	$exam = filter_var(base64_decode($_GET['exam_id']),FILTER_SANITIZE_STRING);
	$name = filter_var(base64_decode($_GET['name']),FILTER_SANITIZE_STRING);
	$mobile =filter_var(base64_decode($_GET['phone']),FILTER_SANITIZE_STRING);
	$state =filter_var(base64_decode($_GET['state']),FILTER_SANITIZE_STRING);
	$city =filter_var(base64_decode($_GET['city']),FILTER_SANITIZE_STRING);
	echo $exam,$name,$mobile,$state,$city;
?>