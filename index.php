<?php 
  include 'admincp/config.php';
  if ($check_exam = mysqli_query($con,"SELECT * FROM exam WHERE ex_status='on'")) {
    if (mysqli_num_rows($check_exam)>0) {
      echo "<script>  window.onload = function ()
        {
         document.getElementById('btn_exam').click();
        }</script>";
     
    }
    else
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
  <!-- CDN Links are here -->
  <?php include 'cdn.php'; ?>
   <?php include 'ip.php'; ?>


  <title>Dharm Tirth &#8211; Jain Mandir | Founder &#8211; Acharya Shri Guptinandi ji Muniraj</title>

<meta name="theme-color" content="#ffffff">
</head>

<body ​style="background-color:red;">

  <div class="container">
<?php include 'banner.php'; ?>
    <!-- main start here -->
   
    <!-- main header ends here -->
 
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
                  <li>
                    <a class="dropdown-item" href="guru"style="color: yellow;text-transform: uppercase;" onmouseover="this.style.backgroundColor='#f02e2e';"         
                    >
                    <strong onmouseover="this.style.color='white';" onmouseout="this.style.color='#f9f015'; ">Sangh Parichay</strong>
                  </a>
                </li>
                <!-- Compitation start here -->
                <hr style="color: white;height: 3px;">
                     <li>
                      <a class="dropdown-item" href="exam"style="color: yellow;text-transform: uppercase;" onmouseover="this.style.backgroundColor='#f02e2e';"                  
                    >
                    <strong onmouseover="this.style.color='white';" onmouseout="this.style.color='#f9f015'; ">Competition</strong>
                  </a>
                </li>
                        
                </ul>
        </li>
            </div>
          </div>
        </div>
      </nav>
    </section>
    <section>
      <div class="row">
        <div class="col-md-3" style="margin-left: 0px;">
          <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel" style="">
            <ol class="carousel-indicators">
              <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"></li>
              <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"></li>
              <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
              <div class="carousel-item active" style="">
                <img src="images/newbaba.jpeg" class="img-fluid  float-right" alt="Responsive image"
                  style="width:100%">
              </div>

              <div class="carousel-item" style="">
                <img src="images/santi-sagar-ji-e1403431691392.jpg" class="img-fluid  float-right"
                  alt="Responsive image" style="width:100%" height="100%">
              </div>
              <div class="carousel-item" style="">
                <img src="images/newbabax.jpeg" class="img-fluid  float-right" alt="Responsive image"
                  style="width:100%">
              </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-bs-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-bs-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Next</span>
            </a>
          </div>
        </div>
        <div class="col-md-9">
          <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
            <ol class="carousel-indicators">
              <li data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active"></li>
              <li data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"></li>
              <li data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
              <div class="carousel-item active">
                <img src="images/img1.jpg" class="img-fluid  float-right" alt="Responsive image" style="width:100%">
                <div class="carousel-caption d-none d-md-block">
                  <h5>Santsadhna Dham, Dharmtirth, Kachner</h5>
                </div>
              </div>
              <div class="carousel-item">
                <img src="images/img2.jpg" class="img-fluid  float-right" alt="Responsive image" style="width:100%">
                <div class="carousel-caption d-none d-md-block">
                  <h5>Master Plan of Dharmtirth, Kachner
                  </h5>
                </div>
              </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-bs-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-bs-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Next</span>
            </a>
          </div>
        </div>
      </div>
  </div>
  </section>
  </div>
  </div>
  </div>
  <div class="container">
    <div class="row" style="margin-top: 15px;">
      <div class="col-md-3">
        <div class="card" style="border-radius: 0px;">
          <div class="card-header" style="background-color: #f02e2e" style="border-radius: 0px;">
            <font color="#f9f015" style="font-size: 14px;">
              <strong> PRESENT LOCATION OF SANGH</strong>
            </font>
          </div>
          <div class="card-body">
            <p class="card-text">
              <?php
                $sql = "SELECT location FROM location";
                $query = mysqli_query($con,$sql);
                if (mysqli_num_rows($query) > 0) {
                  while ($row= mysqli_fetch_assoc($query)) {
                    echo $row['location'];
                  }
                  # code...
                }
                else
                {
                  echo "Location not found";
                }
              ?>
            </p>
          </div>
        </div>
        <div class="card" style="border-radius: 0px; margin-top:10px;">
          <div class="card-header" style="background-color: #f02e2e" style="border-radius: 0px;">
            <font color="#f9f015" style="font-size: 14px;">
              <strong>आगामी कार्यक्रम (UPCOMING)</strong>
            </font>
          </div>
          <div class="card-body">
            <p class="card-text"> <?php
                $sql = "SELECT location FROM event";
                $query = mysqli_query($con,$sql);
                if (mysqli_num_rows($query) > 0) {
                  while ($row= mysqli_fetch_assoc($query)) {
                    echo $row['location'];
                  }
                  # code...
                }
                else
                {
                  echo "Location not found";
                }
              ?></p>
          </div>
        </div>
        <div class="card" style="border-radius: 0px; margin-top:10px;">
          <div class="card-header" style="background-color: #f02e2e" style="border-radius: 0px;">
            <font color="#f9f015" style="font-size: 14px;">
              <strong> अब तक हुए गुरूदेव के चातुर्मास
              </strong>
            </font>
          </div>
          <div class="card-body">
            <p class="card-text">              
             <table class="table">
  <thead>
 
  </thead>
  <tbody>
    <tr>
      <td>1991-रोहतक(हरयाणा)</td>
    </tr>
    <tr>  
      <td>1992-निवाई(राजस्थान)</td>
    </tr>
    <tr>
      <td>1993-लावा(राजस्थान)</td>
    </tr>
    <tr>  
      <td>1994-बिजौलियाँ(राजस्थान)</td>
    </tr>
    <tr>
      <td>1995-कोटा(राजस्थान)</td>
    </tr>
    <tr>  
      <td>1996-केसरियाजी,ऋषभदेव(राजस्थान)</td>
    </tr>
    <tr>
      <td>1997-सागवाडा(राजस्थान)</td>
    </tr>
    <tr>  
      <td>1998-चितरी(राजस्थान)</td>
    </tr>
    <tr>
      <td>1999-बडनगर(मध्य प्रदेश)</td>
    </tr>
    <tr>  
      <td>2000-इंदौर(मध्य प्रदेश)</td>
    </tr>
    <tr>
      <td>2001-खण्डवा(मध्य प्रदेश)</td>
    </tr>
    <tr>  
      <td>2002-औरंगाबाद(महाराष्ट)</td>
    </tr>
    <tr>
      <td>2003-फलटण(महाराष्ट)</td>
    </tr>
    <tr>  
      <td>2004-सांगली(महाराष्ट)</td>
    </tr>
    <tr>
      <td>2005-औरंगाबाद(महाराष्ट)</td>
    </tr>
    
  </tbody>
</table>
<!-- Button trigger modal -->
<center><button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal">
 View All
</button></center>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><STRONG>अब तक हुए गुरूदेव के चातुर्मास</STRONG></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <table class="table">
  <thead>
 
  </thead>
  <tbody>
    
    
    <tr>  
      <td>2006-नागपुर(महाराष्ट)</td>
    </tr>
    <tr>  
      <td>2007-देवलगांवराजा(महाराष्ट)</td>
    </tr>
    <tr>  
      <td>2008-बाराबंकी(महाराष्ट)</td>
    </tr>
      <tr>  
      <td>2009-सोनागिर(मध्य प्रदेश)</td>
    </tr>
    <tr>  
      <td>2010-औरंगाबाद(महाराष्ट)</td>
    </tr>
    <tr>  
      <td>2011-बडौत(उत्तर प्रदेश)</td>
    </tr>
    <tr>
      <td>2012-रोहतक(हरयाणा)</td>
    </tr>
     <tr>
      <td>2013-दिल्ली</td>
    </tr>
     <tr>
      <td>2014-दिल्ली</td>
    </tr>
     <tr>
      <td>2015-चितरी(राजस्थान)</td>
    </tr>
     <tr>
      <td>2016-औरंगाबाद(महाराष्ट)</td>
    </tr>
     <tr>
      <td>2017-धर्मतीर्थ(महाराष्ट)</td>
    </tr>
     <tr>
      <td>2018-नागपुर(महाराष्ट)</td>
    </tr>
    <tr>
      <td>2019-औरंगाबाद(महाराष्ट)</td>
    </tr>
    <tr>
      <td>2020-धर्मतीर्थ(महाराष्ट)</td>
    </tr>
  </tbody>
</table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Close</button>
        
      </div>
    </div>
  </div>
</div>
            </p>
          </div>
        </div>
     
        <div class="card" style="border-radius: 0px; margin-top:10px;">
          <div class="card-header" style="background-color: #f02e2e" style="border-radius: 0px;">
            <font color="#f9f015" style="font-size: 14px;">
              <strong> DONATION SCHEMES
              </strong>
            </font>
          </div>
          <div class="card-body">
          
              <img src="images/don.jpeg"  class="img-fluid">
              <br>  <br>
      <center>
                 <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
  Full Image
</button>
      </center>
<div class="container">
  <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
   
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
       <img src="images/don.jpeg"  class="img-fluid">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger btn-sm" data-bs-dismiss="modal">Close</button>
     
      </div>
    </div>
  </div>
</div>
</div>
           </div> </div> <br>
          </div>
          <div class="col-md-9">
            <div class="row">
              <div class="col-md-12">
                <div class="card" style="border-radius: 0px;">
                  <div class="card-header" style="background-color: #f02e2e" style="border-radius: 0px;">
                    <font color="#f9f015" style="font-size: 14px;">
                      <strong> RECENT PROGRAMS</strong>
                    </font>
                  </div>
                  <div class="card-body">
                    <div class="row">
                      <?php
                                    
                                    $sql = "SELECT * FROM recent";
                                    $data = mysqli_query($con,$sql);
                                    if (mysqli_num_rows($data) > 0) {
                                      while ($row = mysqli_fetch_assoc($data)) {
                                        ?>

                      <div class="col-md-4" style="margin-top: 15px;">
                        <div class="card">
                          <img src="admincp/recent/<?php echo$row['name']; ?>" class="card-img-top" alt="...">
                          <div class="card-body">
                            <p class="card-text"><?php echo$row['title']; ?></p>
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
            <div class="row">
              <div class="col-md-12" style="margin-top: 15px;border-radius: 0px;">
                <div class="col-md-12">
                  <div class="card" style="border-radius: 0px;">
                    <div class="card-header" style="background-color: #f02e2e" style="border-radius: 0px;">
                      <font color="#f9f015" style="font-size: 14px;">
                        <strong> आगामी आयोजन 
                        </strong>
                      </font>
                    </div>
                    <div class="card-body">
                      <div class="row">
                        <div class="col-md-8">
                          <div class="card">
                           <video  controls>
  <source src="images/trust.mp4" type="video/mp4">
  <source src="movie.ogg" type="video/ogg">
  Your browser does not support the video tag.
</video>
                            <div class="card-body">
                              <p class="card-text"></p>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-4" style="margin-top: 0px;">
                          <div class="card">
                            <img src="images/sys.jpeg" class="card-img-top" alt="...">
                           
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="card-body ">
                      <div class="row ">
                      <div class="col-md-8">
                               <div class="card-header" style="background-color: #f02e2e" style="border-radius: 0px;">
                      <font color="#f9f015" style="font-size: 14px;">
                        <strong> आज के पुण्यार्जक : <?php echo date('d-m-y'); ?>
                        </strong>
                      </font>
                    </div>
                      </div>
                        <div class="col-md-8 ">
                          <div class="card table-responsive">
                            
                                     <table class="table  table-bordered  ">
  <thead>
    <tr>
      <th scope="col">SR.NO</th>
      <th scope="col">NAME</th>
      <th scope="col">Village</th>
      <th scope="col">Donated for</th>
    
    
     
    </tr>
  </thead>
  <tbody>
     <?php 
                     // $todaya = date('d-m-y');
                    $sql = "SELECT * FROM doner  ";

                    $data = mysqli_query($con,$sql);
                    $count = 0;
                    if (mysqli_num_rows($data) > 0) {
                      while ($row_guru = mysqli_fetch_assoc($data)) {
                        $count++;
                      ?>
                       <th scope="row">
                         <?php echo $count; ?>
                       </th>
                  <td><?php echo $row_guru['name']; ?></td>
                 <td><?php echo $row_guru['city']; ?></td>
                 
                  <td><?php 
                  if ($row_guru['dfor'] == "Gogras") {
                    echo "गोग्रास";
                   
                  }
                  else if($row_guru['dfor'] == "Diet")
                  {
                    echo "आहारदान";
                  }
                  else if($row_guru['dfor'] == "Mahashantidhara")
                  {
                    echo "महाशांतिधारा";
                  }
                  else if($row_guru['dfor'] == "Legislation")
                  {
                    echo "विधान";

                  }
                  else
                  {
                    echo "अभिषेक";
                  }
                   ?>
                     
                   </td>
                  
                  
              
                </tr>

                   <?php }}?>
   
  </tbody>
</table>
                          </div>
                          <div class="card" style="margin-top: 15px;">
                                                   <video  controls>
  <source src="images/trust_new.mp4" type="video/mp4">
  <source src="movie.ogg" type="video/ogg">
  Your browser does not support the video tag.
</video>
                          </div>
                        </div>
                        <div class="col-md-4" style="margin-top: 15px;">
                        
                       
                          <div class="card">
                            <div class="card-header" style="background-color: #f02e2e" style="border-radius: 0px;">
                              <font color="#f9f015" style="font-size: 14px;">
                                <strong>NEAREST LOCATIONS
                                </strong>
                              </font>
                            </div>
                          </div>
                          <div class="card-body">
                            <p class="card-text">
                              <ul style="list-style-type:disc">
                                <li>Kachner(कचनेर) - 3 k.m.</li>
                                <li>Paithan (पैठन) - 35 k.m.</li>
                                <li>Jatwada (जटवाडा) - 48 k.m.</li>
                                <li>Aelora (एल्लोरा) - 60 k.m.</li>
                                <li>Jintur(जिंतुर) - 135 k.m.</li>
                                <li>Gajpantha (गज पन्था) - 200 k.m.</li>
                                <li>Mangitungi(मान्गीतुंगी) - 150 k.m.</li>
                                <li>Kunthalgiri(कुन्थल गिरी) - 165 k.m.</li>
                                <li>Kunthugiri (कुंथु गिरी) - 450 k.m.</li>
                              </ul>
                            </p>
                          </div>
                          <div class="card">
                            <div class="card-header" style="background-color: #f02e2e" style="border-radius: 0px;">
                              <font color="#f9f015" style="font-size: 14px;">
                                <strong>DHARMTIRTH EK PARICHAYA
                                </strong>
                              </font>
                            </div>
                          </div>
                          <div class="card-body">
                            <p class="card-text">
                              ParamPujya PragyaYogi Digamber JainAcharya Shri GuptiNandi Gurudev with the blessings and
                              guidance of AcharyaShri KunthuSagarJi and KanakNandiJi has given shape to SHRI DHARMTIRTH.
                              <br>
                              Shri Dharmtirth is located near to Kachner town (approx. 30 kms ) Aurangabad city of
                              Maharastra state in India.
                              <br>
                              Shri Dharmtirth has been built on 50 acres of land having beautiful & spiritual Navgrah
                              Jain Temple along with state of the art human welfare facilities like educational
                              institution, hospital and dispensary, guest houses, student hostel, children park,
                              meditation centre etc.
                              <a href="about" style="color: #f02e2e"><strong>Read More</strong></a>
                            </p>
                          </div>
                        </div>
                      </div>
                    </div>

                  </div>

                </div>
                   
   
   
              </div>
            </div>
          </div>

        </div>

      </div>
      <br>
<div class="container">
<div class="container">
    <div class="row">
              <div class="col-md-12">
                <div class="card" style="border-radius: 0px;">
                  <div class="card-header" style="background-color: #f02e2e" style="border-radius: 0px;">
                    <font color="#f9f015" style="font-size: 14px;">
                      <strong>Sponsors</strong>
                    </font>
                  </div>
                  <div class="card-body">

                <div class="row">
                   <?php
                                    
      $sql = "SELECT * FROM spset";
      $data = mysqli_query($con,$sql);
      if (mysqli_num_rows($data) > 0) {
        while ($row = mysqli_fetch_assoc($data))
         {
              if ($row['sp_set'] == 'yes') 
              {

                ?>
                 <?php
                              $sql_sp = "SELECT * FROM sponsor";
                              $data_sp = mysqli_query($con,$sql_sp);
                              if (mysqli_num_rows($data_sp)) {
                                while ($row_sp = mysqli_fetch_assoc($data_sp)) {
                              ?>

                  <div class="col-md-3" style="margin-top: 15px;">
                    <div class="card" style="width: 15rem;">
                    <CENTER>  <img src="admincp/spphoto/<?php echo$row_sp['photo'] ;?>" class="card-img-top" alt="..." style="height: 150px;width: 150px;border-color: red;margin-top: 10px;  border: 10px solid transparent;"></CENTER>
                      <div class="card-body">
                        <hr>
                        <p class="card-text">
                         <strong> <?php echo $row_sp['sp_name']; ?></strong>
                        </p>
                      </div>
                    </div>
                  </div>
                                <?php
                              }
                              };
                              
                            ?>

                  <?php }}}; ?>

               
                
               
                </div>
                </div>
              </div>
            </div>
</div>
</div>
<br>
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exam" id="btn_exam" style="display: none;">
  
</button>

<!-- Modal -->
<div class="modal fade" id="exam" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-bs-backdrop="static">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">प्रतियोगिता की घोषणा
</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <table class="table table-bordered">
          <thead>
            <tr>           
              <th scope="col">प्रतियोगिता का नाम  </th>
              <th scope="col">प्रतियोगिता प्रायोजक का नाम
</th>
            </tr>
          </thead>
      <tbody>

                                                    <?php
                                                                if ($sql = mysqli_query($con,"SELECT * FROM exam WHERE ex_status='on' ORDER BY sr DESC ")) {
                                                                if (mysqli_num_rows($sql) > 0) 
                                                                {
                                                                    while ($row = mysqli_fetch_assoc($sql))
                                                                    {
                                                                    ?>
                                                                     <tr>
         
                                                                      <td><?php echo $row['ex_name']; ?></td>
                                                                      <td><?php echo $row['ex_spname']; ?></td>
                                                                     
                                                                    </tr>
                                                                     <?php 
                                                                }
                                                                }
                                                                }
                                                            ?>
     
      </tbody>
</table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">बंद करे</button>
        <a href="exam" type="button" class="btn btn-primary btn-sm">भाग लेना</a>
      </div>
    </div>
  </div>
</div>
      <div class="container">
        <div class="row">
          <div class="container">
            <div class="col-md-12">
              <?php include 'footer.php'; ?>
            </div>
          </div>
        </div>
      </div>
      <!-- Button trigger modal -->

<!-- Modal -->

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous">
      </script>
</body>

</html>
<script type="text/javascript">
  var myCarousel = document.querySelector('#carouselExampleIndicators')
  var carousel = new bootstrap.Carousel(myCarousel, {
    interval: 1500,

  })
  var myCarousel = document.querySelector('#carouselExampleCaptions')
  var carousel = new bootstrap.Carousel(myCarousel, {
    interval: 1500,

  })

</script>