<?php
  include 'config.php';
   include 'he.php';
  if (isset($_POST['submit'])) 
  {
    $exam_name = filter_var($_POST['exam_name'],FILTER_SANITIZE_STRING);
    $sp_name = filter_var($_POST['sp_name'],FILTER_SANITIZE_STRING);
    $status = filter_var($_POST['opt_stauts'],FILTER_SANITIZE_STRING);
    $exam_id = "EXAM".rand(0000000000,9999999999);
    $photo = $_FILES['photo']['name'];
     $photo_destination = '../admincp/compa/'.$photo;
    $photo_extention =  pathinfo($photo,PATHINFO_EXTENSION);
    $photo_temp = $_FILES['photo']['tmp_name'];
    $date = date('l d F Y h:i:s A');

     if (!in_array($photo_extention, ['jpg','png','jpeg','JPG','PNG','JPEG'])) 
    {
           echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>Error!</strong>Invalid File Format
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
    }
      else
  {
    $upload_photo = move_uploaded_file($photo_temp, $photo_destination);
    if ($upload_photo) {
        $sql ="INSERT INTO exam VALUES (NULL,'$exam_id','$exam_name','$sp_name','$date','$status','$photo')";

          if (mysqli_query($con,$sql)) {
             echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Success!</strong> Competition Added Successfully!
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
       }
       else
       {
          echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>Error!</strong>File Problem
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
       }
    }
    else
    {

    }

  }
    // if (mysqli_query($con,"INSERT INTO exam VALUES (NULL,'$exam_id','$exam_name','$sp_name','$date','$status','0')"))
    // {
    //   echo "Added!";
    // }
    // else
    // {
    //   echo "Error";
    // }
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
  Add Competition
  </div>
        <div class="card-body">
         <form onsubmit="return validExam()" method="POST" enctype="multipart/form-data" id="examForm">
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label"><b>Competition Name</b></label>
    <input type="text" class="form-control"  aria-describedby="emailHelp" name="exam_name" id="exam_name">
   
  </div>
 <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label"><b>Competition Sponsor Name</b></label>
    <input type="text" class="form-control" aria-describedby="emailHelp" name="sp_name" id="sp_name">
   
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label"><b>Competition Status</b></label>
  <select class="form-select" aria-label="Default select example" name="opt_stauts">
  <option value="off">Off</option>
  <option value="on">On</option>
 
</select>
   
  </div>
  <div class="mb-3">
  <label for="formFile" class="form-label"><b>Banner Image</b></label>
  <input class="form-control" type="file" id="formFile" name="photo">
</div>
 <a href="comp" type="submit" class="btn btn-outline-danger" name="submit">Back</a>
  <button type="submit" class="btn btn-primary" name="submit">Add Competition</button>

</form>
        </div>
      </div>

  </div>
  <div class="col-md-4">
    
  </div>
</div>
</div>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>


  </body>
</html>
<script type="text/javascript">
  function validExam()
  {
    var exam_name = document.forms['examForm']['exam_name'].value;
    var sp_name = document.forms['examForm']['sp_name'].value;
    if (exam_name =="") {
      alert('Enter Competition Name');
       document.forms['examForm']['exam_name'].focus();
      return false;
    }
    if (sp_name =="") {
      alert('Enter Sponsor Name');
       document.forms['examForm']['sp_name'].focus();
      return false;
    }
    else
    {
      return true;
    }
  }
</script>
 <script type="text/javascript">
    if ( window.history.replaceState ) {
  window.history.replaceState( null, null, window.location.href );
}
  </script>