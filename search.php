<?php
 if (isset($_POST['submit'])) {
    $getQuery = filter_var($_POST['stext'],FILTER_SANITIZE_STRING);
    header('location:search?query='.base64_encode($getQuery));
  }
if (!isset($_GET['query'])) {
 header('location:./');
 exit(0);
}

$querya = filter_var($_GET['query'],FILTER_SANITIZE_STRING);
?>
<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- CDN Links are here -->
  <?php include 'cdn.php'; ?>
  <title>Sahitya | Dharm Tirth &#8211; Jain Mandir</title>
</head>

<body>
  <div class="container">
    <?php include 'banner.php'; ?>
  </div>
  <div class="container">
      
    </section>
    <!-- navbar start here -->
    <section>
      <nav class="navbar navbar-expand-lg " style="background-color: #f02e2e;">
        <div class="container-fluid">
          <a class="navbar-brand" href="#" style="color: white;"><strong>SHRI DHARM TIRTH </strong></a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
            aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation"
            style="color: white;">
            <span class="navbar-toggler-icon" style="color: white;border-color: white;"><i
                class="fa fa-bars"></i></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
              <a class="nav-link active" aria-current="page" href="./" style="color: #f9f015;"
                onmouseover="this.style.color='white';" onmouseout="this.style.color='#f9f015'; ">
                <strong>HOME</strong>
              </a>
              <a class="nav-link" href="about" style="color: yellow;text-transform: uppercase;"
                onmouseover="this.style.color='white';" onmouseout="this.style.color='#f9f015'; ">
                <strong>Parichay</strong>
              </a>
              <a class="nav-link" href="sahitya" style="color: white;text-transform: uppercase;"
                onmouseover="this.style.color='#f9f015';" onmouseout="this.style.color='white'; ">
                <strong>Sahitya</strong>
              </a>

              <a class="nav-link" href="gallery" style="color: yellow;text-transform: uppercase;"
                onmouseover="this.style.color='white';" onmouseout="this.style.color='#f9f015'; ">
                <strong>Gallery</strong>
              </a>
              <a class="nav-link" href="our-inspirators" style="color: yellow;text-transform: uppercase;"
                onmouseover="this.style.color='white';" onmouseout="this.style.color='#f9f015'; ">
                <strong>TRUSTEE</strong>
              </a>
              <a class="nav-link" href="youtube" style="color: yellow;text-transform: uppercase;"
                onmouseover="this.style.color='white';" onmouseout="this.style.color='#f9f015'; ">
                <strong>YouTube</strong>
              </a>
              <a class="nav-link" href="donate" style="color: yellow;text-transform: uppercase;"
                onmouseover="this.style.color='white';" onmouseout="this.style.color='#f9f015'; ">
                <strong>Donate</strong>
              </a>
              <a class="nav-link" href="contact" style="color: yellow;text-transform: uppercase;"
                onmouseover="this.style.color='white';" onmouseout="this.style.color='#f9f015'; ">
                <strong>SANGH PARICHYA</strong>
              </a>
            </div>
          </div>
        </div>
      </nav>
    </section>
  </div>
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="row">
          <div class="col-md-12" style="border-radius: 0px;margin-top: 15px;">
            <div class="card" style="border-radius: 0px;">
              <div class="card-header" style="background-color: #f02e2e" style="border-radius: 0px;">
                <div class="row">
                  <div class="col-md-8">
                    <font color="#f9f015" style="font-size: 14px;">
                  <strong>Searh results for : <?php echo base64_decode($querya); ?> </strong>

                </font>
                  </div>
                  <div class="col-md-4">
                    <form class="d-flex" action="" method="POST" onsubmit="return validS();" id="search">
                    <input class="form-control me-2" type="search" placeholder="Search Here..." aria-label="Search" name="stext">
                    <a href="" class="btn" type="submit" style="background-color: #f9f015;color: red;">Search</a>
                  </form>
                  </div>
                </div>               
              </div>
              <div class="card-body">
                <div class="row">
                       <?php
                                   error_reporting(0);
                                    include 'admincp/config.php';
                                $de = base64_decode($querya);
                                //echo $de;
                                  $sql = "SELECT * FROM pdf WHERE MATCH (title) against ('$de')";
                                    $data = mysqli_query($con,$sql);
                                    if (mysqli_num_rows($data) > 0) {
                                      while ($row = mysqli_fetch_assoc($data)) {
                                        ?>
                  <div class="col-md-3" style="margin-top: 15px;">
                    <div class="card">
                      <embed width="100%" height="100%" name="plugin"
                        src="admincp/uploadpdf/<?php echo$row['name']; ?>" type="application/pdf">
                      <div class="card-body">
                        <p class="card-text"><?php echo$row['title']; ?></p>

                        <a href="fetchfile?idx=<?php echo $row['id']; ?>" class="btn btn-sm"
                          style="background-color: #f02e2e;border-radius: 0px;color: white;text-align: right;"
                          onmouseover="this.style.color='#f9f015'" onmouseout="this.style.color='white' ">Download</a>

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
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <br>

  <div class="container">
    <?php include 'footer.php'; ?>

  </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous">
      </script>
</body>

</html>
<script type="text/javascript">
  function validS()
  {
    var getQuery = document.forms['search']['stext'].value;
    if (getQuery == "") {
      alert('Enter search query');
      return false;

    }


    
  }
</script>