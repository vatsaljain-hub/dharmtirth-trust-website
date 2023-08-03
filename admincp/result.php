<?php
	include 'config.php';
	include 'he.php';
	if (isset($_POST['submit'])) {
		$exam = filter_var($_POST['exam'],FILTER_SANITIZE_STRING);
		$link = base64_encode($exam);
		header('location:show-result?exam_id='.$link);
	}

?>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

    <title>Dharamtirth Competition Department</title>
  </head>
  <body>
  	<div class="container">
  <div class="row">
  <div class="col-md-4">
    
  </div>
  <div class="col-md-4 " style="margin-top: 35px;">
    <div class="card align-middle ">
      <div class="card-header">
  Select Competition
  </div>
        <div class="card-body">
         <form onsubmit="return validExam()" method="POST" id="examForm">
  

  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label"><b> Select Competition</b></label>

  <select class="form-select" aria-label="Default select example" name="exam">
 <?php
 		if ($sql = mysqli_query($con,"SELECT * FROM exam ORDER BY sr DESC "))
	 {
		if (mysqli_num_rows($sql) > 0) 
		{
			while ($row = mysqli_fetch_assoc($sql)) 
			{
			
				?>
				 <option value="<?php echo $row['ex_id']; ?>"><?php echo $row['ex_name']; ?></option>
  					
				
			<?php
		}
		}
	}
 ?>
 
</select>
   <br>
  
 <a href="comp" type="submit" class="btn btn-outline-danger" name="submit">Back</a>
  <button type="submit" class="btn btn-primary" name="submit">Select Competition</button>

</form>
        </div>
      </div>

  </div>
  <div class="col-md-4">
    
  </div>
</div>
</div>
  </body>
  <script type="text/javascript">
  	if ( window.history.replaceState ) {
  window.history.replaceState( null, null, window.location.href );
}
  </script>