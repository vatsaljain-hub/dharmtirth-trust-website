<?php
	include 'config.php';
	include 'he.php';
	if (isset($_POST['submit'])) {
		$exam = filter_var($_POST['exam'],FILTER_SANITIZE_STRING);
		$link = base64_encode($exam);
		header('location:add-que?exam_id='.$link);
	}
  if (isset($_GET['exam_id'])) {
   $id = filter_var($_GET['exam_id'],FILTER_SANITIZE_STRING);
   if (mysqli_query($con,"UPDATE exam SET ex_status = 'on' WHERE ex_id='$id' ")) {
    
   }
  }
   if (isset($_GET['exam_id_a'])) {
   $id = filter_var($_GET['exam_id_a'],FILTER_SANITIZE_STRING);
   if (mysqli_query($con,"UPDATE exam SET ex_status = 'off' WHERE ex_id='$id' ")) {
    ;
   }
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
  <div class="card">
  <div class="card-body">
    <a href="comp" type="submit" class="btn btn-outline-danger" name="submit">Back</a>
  </div>
</div>
 
      <div class="table-responsive">
  <table class="table">
   <table class="table table-striped table-hover table-bordered">
  <thead>
        <tr>
      <th scope="col">SR</th>
      <th scope="col">Competition Name</th>
      <th scope="col"> Sponsor Name</th>
      <th scope="col">Status</th>
      <th scope="col">Action</th>
    </tr>
     </thead>
      <tbody>
    <?php 
      $count=0;
      if ($sql=mysqli_query($con,"SELECT * FROM exam ORDER BY sr DESC ")) {
        if (mysqli_num_rows($sql)>0) {
          while ($row_exam =mysqli_fetch_assoc($sql)) {
            $count++;
            ?>
           
    <tr>
      <th scope="row"><?php echo $count; ?></th>
      <td><?php echo $row_exam['ex_name']; ?></td>
        <td><?php echo $row_exam['ex_spname']; ?></td>
        <td>
         <?php 
         if ($row_exam['ex_status'] == "on") {
           echo '<span class="badge bg-success">ON</span>';
         } 
         else
         {
           echo '<span class="badge bg-danger">OFF</span>';
         }
         ?>
        </td>
           
            <td><a href="live?exam_id=<?php echo $row_exam['ex_id'];?>" class="btn btn-outline-success btn-sm">ON</a>
          <a href="live?exam_id_a=<?php echo $row_exam['ex_id'];?>" class="btn btn-outline-danger btn-sm">OFF</a></td>
    </tr>


          <?php
        }
        }
      }
    ?>

   </tbody>
 
</table>
  </table>
</div>
        </div>
 

  </body>