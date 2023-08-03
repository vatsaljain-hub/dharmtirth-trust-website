<?php
include 'config.php';
include 'he.php';
 if (isset($_GET['exam_id'])&&isset($_GET['mobile'])) {
    $exam = filter_var($_GET['exam_id'],FILTER_SANITIZE_STRING);
    	

    $mobile_a = filter_var($_GET['mobile'],FILTER_SANITIZE_STRING);
    if (mysqli_query($con,"DELETE FROM results WHERE exam_id='$exam' AND mobile='$mobile_a' ")) {
     $link = base64_encode($exam);
		header('location:show-result?exam_id='.$link);
    }
  }
?>