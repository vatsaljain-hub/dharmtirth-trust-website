<?php
	include 'config.php';
  include 'he.php';
	$id = filter_var(base64_decode($_GET['exam_id']),FILTER_SANITIZE_STRING);
	if ($sql =  mysqli_query($con,"SELECT * FROM exam WHERE ex_id = '$id'"))
	{
		if (mysqli_num_rows($sql)) {
			while ($row =  mysqli_fetch_assoc($sql)) {
        echo '<div class="container"><div class="card">
  <div class="card-body">
    Selected Competition ==>'.$row['ex_name'].'&nbsp;&nbsp;&nbsp;<button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
 Add Quection
</button>
 <a href="comp" type="submit" class="btn btn-outline-danger btn-sm" name="submit">Back</a>
  </div></div>
</div>';
			

			}
			# code...
		}
	}
if (isset($_POST['submit'])) {
    $que = filter_var($_POST['que'],FILTER_SANITIZE_STRING);
    $a= filter_var($_POST['opt_a'],FILTER_SANITIZE_STRING);
    $b= filter_var($_POST['opt_b'],FILTER_SANITIZE_STRING);
    $c= filter_var($_POST['opt_c'],FILTER_SANITIZE_STRING);
    $d= filter_var($_POST['opt_d'],FILTER_SANITIZE_STRING);
    $ans = filter_var($_POST['ans'],FILTER_SANITIZE_STRING);
    $qu_id = "QUE".rand(000000,999999);
    if ($query = mysqli_query($con,"INSERT INTO que VALUES (null,'$qu_id','$que','$a','$b','$c','$d','$ans','$id')")) 
    {
    
    }
}
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body>
  	<!-- Button trigger modal -->
  	<br>
<!-- <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
 Add Quection
</button>
 -->
<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <form method="POST">
    <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Add Quection</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
       <form>
     <div class="input-group mb-3">
      <span class="input-group-text" id="inputGroup-sizing-default">Quection</span>
      <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" onload="this.value=''; " name="que">
    </div>
    <hr>
    <div class="input-group input-group-sm mb-3">
  <span class="input-group-text" id="inputGroup-sizing-sm">Option A</span>
  <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" name="opt_a">
</div>
<div class="input-group input-group-sm mb-3">
  <span class="input-group-text" id="inputGroup-sizing-sm">Option B</span>
  <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" name="opt_b">
</div>
<div class="input-group input-group-sm mb-3">
  <span class="input-group-text" id="inputGroup-sizing-sm">Option C</span>
  <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" name="opt_c">
</div>
<div class="input-group input-group-sm mb-3">
  <span class="input-group-text" id="inputGroup-sizing-sm">Option D</span>
  <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" name="opt_d">
</div>
 <select class="form-select" aria-label="Default select example" name="ans">
  <option selected>Select Correct Answer</option>
  <option value="1">A</option>
  <option value="2">B</option>
  <option value="3">C</option>
  <option value="4">D</option>
</select>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary btn-sm" name="submit">Add</button>
      </div>
    </div>
  </div>
  </form>
</div>
</form>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
  </body>
</html>
<br>
<div class="container">
  <div class="table-responsive">
  <table class="table table-striped table-hover table-bordered">
  <thead>
    <tr>
      <th scope="col">SR NO</th>
      <th scope="col">Quection</th>
      <th scope="col">A</th>
      <th scope="col">B</th>
       <th scope="col">C</th>
        <th scope="col">D</th>
          <th scope="col">ANSWER</th>
           <th scope="col">ACTION</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <?php
  if ($sql =  mysqli_query($con,"SELECT * FROM que WHERE exam_id = '$id'"))
  {
    $count=0;
    if (mysqli_num_rows($sql)) {
      while ($row =  mysqli_fetch_assoc($sql)) {
          $count++;
        ?>
           <tr>
          <th scope="row"><?php echo $count; ?></th>
          <td><b><?php echo $row['quection']; ?></b></td>
            <td><?php echo $row['opt_a']; ?></td>
              <td><?php echo $row['opt_b']; ?></td>
                <td><?php echo $row['opt_c']; ?></td>
                  <td><?php echo $row['opt_d']; ?></td>
                  <td><?php echo $row['answer']; ?></td>
                  <td><a href="del-que?id=<?php echo $row['qu_id'];?>&exam_id=<?php echo $id;?>" class="btn btn-outline-danger btn-sm">Delete</a></td>
          
        </tr>
    
      <?php
    }
    
    }
    else
    {
      echo '<td colspan="8"><center>No Quections Added Yet!!</center></td>';
      
    }
  }
?>
   

  </tbody>
</table>
</div>
 
</div>
<script type="text/javascript">
  if ( window.history.replaceState ) {
  window.history.replaceState( null, null, window.location.href );
}
</script>
