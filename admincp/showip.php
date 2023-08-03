<?php
include 'config.php';
$geturl= "SELECT url FROM website";
$uq = mysqli_query($con,$geturl);
if (mysqli_num_rows($uq) > 0) {
  while ($rowq = mysqli_fetch_assoc($uq)) {
    $url = $rowq['url'];
  }
}
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
function number_format_short( $n, $precision = 1 ) {
  if ($n < 900) {
    // 0 - 900
    $n_format = number_format($n, $precision);
    $suffix = '';
  } else if ($n < 900000) {
    // 0.9k-850k
    $n_format = number_format($n / 1000, $precision);
    $suffix = 'K';
  } else if ($n < 900000000) {
    // 0.9m-850m
    $n_format = number_format($n / 1000000, $precision);
    $suffix = 'M';
  } else if ($n < 900000000000) {
    // 0.9b-850b
    $n_format = number_format($n / 1000000000, $precision);
    $suffix = 'B';
  } else {
    // 0.9t+
    $n_format = number_format($n / 1000000000000, $precision);
    $suffix = 'T';
  }

  // Remove unecessary zeroes after decimal. "1.0" -> "1"; "1.00" -> "1"
  // Intentionally does not affect partials, eg "1.50" -> "1.50"
  if ( $precision > 0 ) {
    $dotzero = '.' . str_repeat( '0', $precision );
    $n_format = str_replace( $dotzero, '', $n_format );
  }

  return $n_format . $suffix;
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
      <table class="table table-bordered">
  <thead>
    <tr>
      <?php
      $date = date('d/m/y'); 
        $total_rows_today = mysqli_num_rows(mysqli_query($con,"SELECT * FROM ip WHERE datee = '$date' "));
        $date_y = date('d/m/y',strtotime("-1 days"));
        $total_rows_yesterday = mysqli_num_rows(mysqli_query($con,"SELECT * FROM ip WHERE datee = '$date_y' "));
        if ($total_rows_today > $total_rows_yesterday) 
        {
          echo "<center><b>Ohh Hoo 🔥🔥🔥!! You are on rock your views are up 😍!!</b></center>";
        }
        else
        {
          
        }

      ?>
      <tr>
                  <td colspan="3"><center><strong>Visitors</strong></center></td>
                </tr>
      <th scope="col">Today</th>
      <th scope="col">
        <span class="badge bg-primary">  <?php   $date = date('d/m/y'); echo $total_rows  = mysqli_num_rows(mysqli_query($con,"SELECT * FROM ip WHERE datee = '$date' ")) ?></th></span>

    </tr>
     <tr>
      <th scope="col">Yesterday</th>
      <th scope="col"><span class="badge bg-danger">      <?php   $date = date('d/m/y',strtotime("-1 days")); echo $total_rows  = mysqli_num_rows(mysqli_query($con,"SELECT * FROM ip WHERE datee = '$date' ")) ?></span>
  </th>
    </tr>
     <tr>
      <th scope="col">Total</th>
      <th scope="col"><span class="badge bg-success">   <?php   $date = date('d/m/y',strtotime("-1 days"));  $total_rows  = mysqli_num_rows(mysqli_query($con,"SELECT * FROM ip"));echo number_format_short($total_rows) ?></span>
     </th>
    </tr>
    <tr>
      <td colspan="2"><center><a href="showip"  name="refresh" value="" class="btn btn-warning text-dark btn-sm">Refresh</a>  <a href="./" type="submit"
                      class="btn btn-outline-primary btn-sm" name="set">
                      
                      Back
                    </a></center></td>
    </tr>
  </thead>

</table>
     
        <form method="POST" onsubmit="return validateForm()">
          <!-- <input type="submit" name="clear" value="Clear Data" class="btn btn-primary btn-sm"> -->
           <!-- <a href="showip"  name="refresh" value="" class="btn btn-success btn-sm">Refresh</a> -->
        </form>
        <br>
        <div class="table-responsive">
           <table class="table table-striped table-bordered table-hover">
              <thead>
                
                <tr>
                  <th scope="col">SR</th>
                  <th scope="col">IP</th>
                  <th scope="col">Trace IP</th>
                  <th scope="col">BROWSER INFO</th>
                </tr>
              </thead>
               <tbody>
                <?php 
                  
                  $date = date('d/m/y');
                  $count_start = 0;
                  if ($count = mysqli_query($con,"SELECT * FROM ip WHERE datee = '$date' ORDER BY id DESC ")) {
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
                              <td><a target="_blank" class="btn btn-outline-danger btn-sm" href="https://www.opentracker.net/feature/ip-tracker?ip=<?php echo $ip; ?>">Track</a></td>
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