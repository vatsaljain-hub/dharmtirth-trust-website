<?php
require 'admincp/config.php';
if ($sql = mysqli_query($con,"SELECT * FROM  exam WHERE ex_status='on' ORDER BY sr DESC "))
{
	$exam = array();
	if (mysqli_num_rows($sql)>0) {
		while ($row = mysqli_fetch_assoc($sql)) {
			//echo $row['ex_id'];
			$index['exam_id'] = $row['ex_id'];
			array_push($exam,$index);
		}
		echo json_encode($exam);
	}
	else
	{
		echo "No data found";
	}
}
else
{
	echo "Query error";
}
?>