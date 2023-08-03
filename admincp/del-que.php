<?php
	include 'config.php';
	$id = filter_var($_GET['id'],FILTER_SANITIZE_STRING);
	$exam_id= base64_encode($_GET['exam_id']);

	if (mysqli_query($con,"DELETE FROM que WHERE qu_id = '$id' ")) {
		header('location:add-que?exam_id='.$exam_id);
	}
?>