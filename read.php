<?php
  if (!isset($_GET['val'])) {
    header('location:./');
  }
?>
<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- CDN Links are here -->
  <?php include 'cdn.php'; ?>
  <title>Parichay | Dharm Tirth &#8211; Jain Mandir</title>
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
              <a class="nav-link active" aria-current="page" href="./" style="color: white;"
                onmouseover="this.style.color='#f9f015';" onmouseout="this.style.color='white'; ">
                <strong>HOME</strong>
              </a>
              <a class="nav-link" href="about" style="color: yellow;text-transform: uppercase;"
                onmouseover="this.style.color='white';" onmouseout="this.style.color='#f9f015'; ">
                <strong>Parichay</strong>
              </a>
              <a class="nav-link" href="sahitya" style="color: yellow;text-transform: uppercase;"
                onmouseover="this.style.color='white';" onmouseout="this.style.color='#f9f015'; ">
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
                <strong>contact</strong>
              </a>
                <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="color: yellow;text-transform: uppercase;"
                onmouseover="this.style.color='white';" onmouseout="this.style.color='#f9f015'; ">
                 <b> More</b>
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown" style="background-color: #f02e2e">
                  <li><a class="dropdown-item" href="guru"style="color: yellow;text-transform: uppercase;" onmouseover="this.style.backgroundColor='#f02e2e';" 
                    
                    ><strong onmouseover="this.style.color='white';" onmouseout="this.style.color='#f9f015'; ">SANGH PARICHYA</strong></a></li>
                        
                </ul>
        </li>
            </div>
          </div>
        </div>
      </nav>
    </section>
  </div>
  </section>
  <section>
    <div class="container">
      <div class="col-md-12" style="">
        <div class="card" style="margin-top: 15px;" style="border-radius: 0px;">
          <div class="card-header" style="background-color: #f02e2e;border-radius: 0px;">
            <h5 style="color: #f9f015;border-radius: 0px;">  <?php 
                    include 'admincp/config.php';
                    $get_id = base64_decode($_GET['val']);
                    $sql = "SELECT * FROM guru WHERE id = '$get_id'";
                    $data = mysqli_query($con,$sql);
                    if (mysqli_num_rows($data) > 0) {
                      while ($row_guru = mysqli_fetch_assoc($data)) {
                        echo $row_guru['name'];
                          
                      }}?></h5>
          </div>
          <div class="card-body" style="border-radius: 0px;">
            <div class="container">
              <?php 
                    include 'admincp/config.php';
                    $get_id = base64_decode($_GET['val']);
                    $sql = "SELECT * FROM guru WHERE id = '$get_id'";
                    $data = mysqli_query($con,$sql);
                    if (mysqli_num_rows($data) > 0) {
                      while ($row_guru = mysqli_fetch_assoc($data)) {
                        echo $row_guru['code'];
                          
                      }}?>
            </div>

          </div>
        </div></div></section>
      </div>
    </section>
   

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous">
      </script>
      <div class="container" style="margin-top: 15px;">
      <?php include 'footer.php'; ?>
    </div>
</body>

</html>
