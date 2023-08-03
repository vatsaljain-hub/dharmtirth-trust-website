<?php
	include 'admincp/config.php';
	$phone =filter_var($_GET['phone'],FILTER_SANITIZE_STRING);
	$user = array();
	if ($sql = mysqli_query($con,"SELECT * FROM user_app WHERE phone='$phone'")) 
	{
		if (mysqli_num_rows($sql)>0) {
			while ($row = mysqli_fetch_assoc($sql)) {
				$index['phone'] = $row['phone'];
				$index['name'] = $row['name'];
				$index['state'] = $row['state'];
				$index['city'] = $row['city'];
				$index['date']=$row['birth_date'];
					array_push($user,$index);
			}
			echo json_encode($user);
		}
		else
		{
			echo "No data found";
		}

	}
	else
	{
		echo "No data found";
	}
?>