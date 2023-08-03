<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title></title>
  <link rel="stylesheet" href="style.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.0/jquery.min.js"></script>
  <!-- Font Awesome -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet" />
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
  <!-- MDB -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.5.0/mdb.min.css" rel="stylesheet" />
 <style type="text/css">
   video::-webkit-media-controls-fullscreen-button {
    display: none;
}
 </style>
</head>

<body>
  
  <div class="container">
    <?php
                                    include 'admincp/config.php';
                                    $sql = "SELECT * FROM video";
                                    $data = mysqli_query($con,$sql);
                                    if (mysqli_num_rows($data) > 0) {
                                      while ($row = mysqli_fetch_assoc($data)) {
                                        ?>
    <div class="row" style="margin-top:20px">
      <div class="col-md-12">
        <div class="card">
          <video  width="100%" height="240" controls controlsList="nodownload">
            <source src="admincp/videoupload/<?php echo$row['name']; ?>" type="video/mp4">
            <source src="movie.ogg" type="video/ogg">
            Your browser does not support the video tag.
          </video>
          <div class="card-body">
            <h5 class="card-title"><?php echo $row['title']; ?></h5>
            
          </div>
        </div>
      </div>
    </div>
    <?php }
                                    }
                                    else
                                    {
                                        echo "<td colspan='9'><b><center>No more data to show you!</b></center></td>";
                                    }
                                ?>
  </div>
  <!-- MDB -->
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.5.0/mdb.min.js"></script>

</body>
<script>
  $(window).on("load", function () {
    $(".loading-screen").fadeOut(3000);
  });
</script>

</html>