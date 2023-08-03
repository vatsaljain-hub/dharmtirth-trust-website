<?php
	include 'config.php';
	include 'he.php';
   $id = filter_var(base64_decode($_GET['exam_id']),FILTER_SANITIZE_STRING);
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
  if (isset($_GET['exam_id'])&&isset($_GET['mobile'])) {
    $ex = filter_var($_GET['exam_id'],FILTER_SANITIZE_STRING);
    $mobile_a = filter_var($_GET['mobile'],FILTER_SANITIZE_STRING);
    if (mysqli_query($con,"DELETE FROM results WHERE exam_id='$ex' AND mobile='$mobile_a' ")) {
      echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
  <strong>Success!</strong> Entry Deleted!.
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
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
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>

    <title>Dharamtirth Competition Department</title>
  </head>
  <body>
  	<div class="container">
  <div class="card">
  <div class="card-body">
    <a href="comp" type="submit" class="btn btn-outline-danger" name="submit">Back</a>
   <button  href="result" class="btn btn-danger" name="submit" type="submit" data-bs-toggle="modal" data-bs-target="#topper"
                                                    style="border-radius: 0px;background-color: #f02e2e"
                                                    onmouseover="this.style.color='#f9f015';"
                                                    onmouseout="this.style.color='white' ">प्रतियोगिता के विजेता देखणे के लिये यहा क्लिक करे</button>
  </div>
</div>
 
      <div class="table-responsive">
  <table class="table">
   <table class="table table-striped table-hover table-bordered">
  <thead>
        <tr>
      <th scope="col">SR</th>
       <th scope="col">Name of Participate</th>
      <th scope="col">Mobile</th>
      <th scope="col">Marks</th>
      <th scope="col">State</th>
      <th scope="col">City</th>
      <th scope="col">Action</th>
    </tr>
     </thead>
      <tbody>
    <?php 
      $count=0;
     $ida = base64_decode($id);

      if ($sqla=mysqli_query($con,"SELECT * FROM results WHERE exam_id='$ida' ORDER BY result DESC")) {
        if (mysqli_num_rows($sqla)>0) {
          while ($row_exam =mysqli_fetch_assoc($sqla)) {
            $count++;
            ?>
           
    <tr>
      <th scope="row"><?php echo $count; ?></th>
      <td><?php echo $row_exam['name']; ?></td>
        <td><?php echo $row_exam['mobile']; ?></td>
          <td><?php echo $row_exam['result']; ?></td>
           <td><?php echo $row_exam['state']; ?></td>
            <td><?php echo $row_exam['city']; ?></td>
  
           
            <td><a href="del-re?exam_id=<?php echo $row_exam['exam_id'];?>&mobile=<?php echo $row_exam['mobile']; ?>" class="btn btn-outline-danger btn-sm">DELETE</a>
              <a href="win?exam_id=<?php echo $row_exam['exam_id'];?>&mobile=<?php echo $row_exam['mobile']; ?>&result=<?php echo $row_exam['result']; ?>&state=<?php echo $row_exam['state']; ?>&city=<?php echo $row_exam['city']; ?>&pos=<?php echo $count; ?>&name=<?php echo $row_exam['name']; ?>" class="btn btn-success btn-sm">MAKE WINNER</a></td>
         
    </tr>


          <?php
        }
        }
        else
        {
          echo "<td colspan='7'><center>No Entry Found!</center></td>";
        }
      }
    ?>

   </tbody>
 
</table>
  </table>
</div>
        </div>
 <!-- Button trigger modal -->


<!-- Modal -->
                                    <div class="modal fade" id="topper" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-bs-backdrop="static">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><STRONG>प्रतियोगिता के विजेता </STRONG></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">क्रमांक</th>
      <th scope="col">विजेता का नाम </th>
      <th scope="col">स्कोर</th>
       <th scope="col">Mobile</th>
     
    </tr>
  </thead>
  <tbody>
    <?php
        $count_a = 0;
        if ($sql = mysqli_query($con,"SELECT * FROM win WHERE exam_id='$ida' ORDER BY result DESC LIMIT 0,5 ")) {
           if (mysqli_num_rows($sql) > 0) {
             while ($row_top = mysqli_fetch_assoc($sql)) {
                $count_a++;
                ?>
                  <tr>
                    <td><?php echo $count_a; ?></td>
                  <th scope="row"><?php echo $row_top['name'];  ?></th>
                 
                   <th scope="row"><?php echo $row_top['result'];  ?></th>
                     <th scope="row"><?php echo $row_top['mobile'];  ?></th>
                </tr>
             <?php
         }
           }
           else
           {
            echo "<th colspan='4'>अभी तक कोही विजेता को घोषित नही किया है ! </th>";
           }
        }
    ?>
  

  
  </tbody>
</table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">बंद करे </button>
       
      </div>
    </div>
  </div>
</div>
       

  </body>