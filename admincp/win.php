<?php
	include 'config.php';
	//include 'he.php';
	 $exam_id =filter_var($_GET['exam_id'],FILTER_SANITIZE_STRING);
	 $mobile =filter_var($_GET['mobile'],FILTER_SANITIZE_STRING);
	 $result =filter_var($_GET['result'],FILTER_SANITIZE_STRING);
	 $state =filter_var($_GET['state'],FILTER_SANITIZE_STRING);
	 $city =filter_var($_GET['city'],FILTER_SANITIZE_STRING);
	 $pos =filter_var($_GET['pos'],FILTER_SANITIZE_STRING);
	 	 $name =filter_var($_GET['name'],FILTER_SANITIZE_STRING);
	 //check datad is already present or not
	 if ($sql=mysqli_query($con,"SELECT * FROM win WHERE exam_id='$exam_id' AND mobile='$mobile'")) {
	 	if (mysqli_num_rows($sql)>0) {
	 		if (mysqli_query($con,"UPDATE win SET exam_id='$exam_id',mobile='$mobile',result='$result',state='$state',city='$city',pos='$pos',name='$name' WHERE exam_id='$exam_id' AND mobile='$mobile'  ")) {
	 			header('location:show-result?exam_id='.base64_encode($exam_id));
	 		}
	 	}
	 	else
	 	{

			 	if (mysqli_query($con,"INSERT INTO win VALUES (NULL,'$exam_id','$mobile','$result','$state','$city','$pos','$name')")) 
			{
				header('location:show-result?exam_id='.base64_encode($exam_id));
			}
			else
			{
				echo "Errpr";
			}
	 	}
	 }
	 else
	 {
	 }
	

?>