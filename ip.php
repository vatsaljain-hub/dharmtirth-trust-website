<?php
include 'admincp/config.php';
$user_ip = $_SERVER['REMOTE_ADDR'];
$browser_info = $_SERVER['HTTP_USER_AGENT'];$browser = get_browser();
$date = date('d/m/y');
//check ip exsist or not
if(mysqli_num_rows(mysqli_query($con,"SELECT * FROM ip WHERE ip='$user_ip' "))>0){
    
}
else{
    $sql = "INSERT INTO ip VALUES (NULL,'$user_ip','$browser_info','$date')";
if ($fire = mysqli_query($con,$sql)) {
	
}
else
{
	//echo mysqli_error($con);
}
}


?>

