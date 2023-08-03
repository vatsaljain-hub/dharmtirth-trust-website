<?php
include 'admincp/config.php';

if (isset($_POST['clear'])) {
  if (mysqli_query($con,"DELETE FROM ip ")) {
    // echo "success";
  }
  else
  {
    echo "error";
  }
  if (isset($_POST['refresh'])) {
     header( "refresh:1;url=showip" );
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

    <title>Show IP</title>
  </head>
  <body>
    <div class="container">
      Total Visitors : <?php   $date = date('d/m/y'); echo $total_rows  = mysqli_num_rows(mysqli_query($con,"SELECT * FROM ip WHERE datee = '$date' ")) ?>
        <form method="POST" onsubmit="return validateForm()">
          <input type="submit" name="clear" value="Clear Data" class="btn btn-primary btn-sm">
           <a href="showip"  name="refresh" value="" class="btn btn-success btn-sm">Refresh</a>
        </form>
        <br>
      <table class="table table-striped table-bordered table-hover">
              <thead>
                <tr>
                  <th scope="col">SR</th>
                  <th scope="col">IP</th>
                  <th scope="col">BROWSER INFO</th>
                </tr>
              </thead>
               <tbody>
                <?php 
                  
                  $date = date('d/m/y');
                  $count_start = 0;
                  if ($count = mysqli_query($con,"SELECT * FROM ip WHERE datee = '$date' ")) {
                    if (mysqli_num_rows($count)>0) {
                      while ($row = mysqli_fetch_assoc($count)) {
                        $total = mysqli_num_rows($count);
                        $count_start++;
                        $ip = $row['ip'];
                        $browser_info = $row['browser_info'];
                        ?>
                            <tr>
                              <th scope="row"><?php echo $count_start; ?></th>
                              <td><?php echo $ip; ?></td>
                              <td><?php echo $browser_info; ?></td>
                            </tr>
                      <?php
                    }
                    }
                  }
                ?>
                 </tbody>
                        </table>
     </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
  </body>
</html>
<script>
function validateForm() {
 var check= confirm('Are you sure?');
 if (check) {
    return true;
 }
 else
 {
  return false;
 }


}
</script>