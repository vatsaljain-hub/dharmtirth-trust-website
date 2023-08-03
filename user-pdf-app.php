<?php
include 'admincp/config.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<!-- Font Awesome -->
	    <meta name="viewport" content="width=device-width, initial-scale=1">
<link
  href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css"
  rel="stylesheet"
/>
<!-- Google Fonts -->
<link
  href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap"
  rel="stylesheet"
/>
<!-- MDB -->
<link
  href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.5.0/mdb.min.css"
  rel="stylesheet"
/>

</head>
<body>
<!-- MDB -->
<div class="container">
	<br>
<?php
	$count =0;
		if ($sql  = mysqli_query($con,"SELECT * FROM pdf")) {
			if (mysqli_num_rows($sql)>0) {
				while ($row = mysqli_fetch_assoc($sql)) {
					$name = $row['title'];
					$date = $row['date'];
					$url = "https://docs.google.com/gview?embedded=true&url=https://dharmtirth.in/admincp/uploadpdf/".$row['name'];
					$count++;
					?>
						<div class="card border border-secondary shadow-0 mb-3">
					  <h5 class="card-header">PDF <?php echo $count; ?></h5>
					  <div class="card-body">
					    <h5 class="card-title"><?php echo $name ; ?></h5>
					    <p class="card-text">
					      Publish Date : <?php echo $date; ?>
					    </p>
					  <a href="<?php echo $url; ?>" class="btn btn-secondary "><i class="fa fa-eye" aria-hidden="true"></i>
					View</a></a>
					  </div>
					</div>
				<?php
			}
		}
	}
?>

<br>


</div>
<script
  type="text/javascript"
  src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.5.0/mdb.min.js"
></script>
</body>
</html>