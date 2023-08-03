<?php
error_reporting(0);
  include 'admincp/config.php';
  if (isset($_POST['submit'])) {
    //get data
    $first_name = filter_var($_POST['name'],FILTER_SANITIZE_STRING);
    $last_name =filter_var( $_POST['last_name'],FILTER_SANITIZE_STRING);
    $state = filter_var($_POST['state'],FILTER_SANITIZE_STRING);
    $city = filter_var($_POST['city'],FILTER_SANITIZE_STRING);
    $member = filter_var($_POST['trend'],FILTER_SANITIZE_STRING);
    $phone = filter_var($_POST['phone'],FILTER_SANITIZE_STRING);
    $msg = filter_var($_POST['msg'],FILTER_SANITIZE_STRING);
    $date = date('d-m-y');
    //echo $first_name , $last_name , $state , $city , $phone , $date;
    $sql = "INSERT INTO contact VALUES (null,'$first_name','$last_name','$state','$city','$member' ,'$phone','$date','$msg') ";
    if (mysqli_query($con,$sql)) {
     $done = '<div class="alert alert-success  alert-dismissible fade show" role="alert">
  <strong>Thank You!</strong> Your details are send successfully!!.
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
    }
    else
    {
      echo "<script>alert(11);</script>";
    }
  }
?>
<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script language="Javascript" src="js/jquery.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script type="text/JavaScript" src='js/state.js'></script>
  <!-- CDN Links are here -->
  <?php include 'cdn.php'; ?>
  <title>Contact | Dharm Tirth &#8211; Jain Mandir</title>
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
              <a class="nav-link" href="gallery" style="color: yellow;text-transform: uppercase;"
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
              <a class="nav-link" href="contact" style="color: white;text-transform: uppercase;"
                onmouseover="this.style.color='#f9f015';" onmouseout="this.style.color='white'; ">
                <strong>Contact</strong>
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
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="row">
          <div class="col-md-12" style="border-radius: 0px;margin-top: 15px;">
            <div class="card" style="border-radius: 0px;">
              <div class="card-header" style="background-color: #f02e2e" style="border-radius: 0px;">
                <div class="row">
                  <div class="col-md-11">
                    <font color="#f9f015" style="font-size: 14px;">
                      <strong style="text-transform: uppercase;">contact us</strong>
                    </font>
                  </div>
                  <div class="col-md-1">
                  </div>
                </div>
              </div>
              <div class="card-body">
                <div class="row">
                  <div class="col-md-6">
                   <div class="row">
                     <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3756.1904933072365!2d75.47304201491092!3d19.704512386730453!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bdb09b69fda2abb%3A0x1fb714a88d5cd5ad!2sShri%20Kshetra%20Dharmatirth!5e0!3m2!1sen!2sin!4v1610946603771!5m2!1sen!2sin" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                     <hr>
                     <div class="row">
                       <div class="col-md-6">
                          <STRONG style="color: #f02e2e">
                     धर्मराजश्री तपोभुमी दिगंबर जैन ट्रस्ट <br>
                  अंतर्गत धर्मतीर्थ विकास समिती कचनेर <br>
                  धर्मतीर्थ मार्ग,होनेबाची वाडी रोड,गट<br>
                   नं 11-12,कचनेर,जि.औरंगाबाद(महा.) <br>
                   पिन कोड:-431007<br></STRONG>
                       </div>
                       <div class="col-md-6">
                        <STRONG style="color: #f02e2e">
                          <i class="fa fa-phone"></i> For Calling-
                         <ul type="dics">
                           <li>+91 7499943522</li>
                              <li>+91 7888010087</li>
                                 <li>+91 9146338680</li>
                         </ul>
                        </STRONG>
                         <STRONG style="color: #f02e2e">
                           <i class="fa fa-whatsapp"></i> For WhatsApp-
                           <ul type="dics">
                             <li>+91 7020577608</li>
                             <li>+91 7448185024</li>
                             <li>+91 9359019460</li>
                           </ul>
                         </STRONG>

                        
                       </div>
                     </div>
                   </div>
                  </div>
                  <div class="col-md-6">
                    <form class="row g-3 needs-validation" novalidate action="" method="post" id="idGetUserFrm" onreset="return false;">
                      <div class="col-md-6">
                        <label for="validationCustom01" class="form-label">First name</label>
                        <input type="text" class="form-control" id="validationCustom01"  required name="name" oninput="this.value = this.value.replace(/[^a-zA-Z\s.]/g, '').replace(/(\..*)\./g, '$1');" >
                        <div class="valid-feedback">
                          Looks good!
                        </div>
                      </div>
                      <div class="col-md-6">
                        <label for="validationCustom02" class="form-label">Last name</label>
                        <input type="text" class="form-control" id="validationCustom02"  required name="last_name"oninput="this.value = this.value.replace(/[^a-zA-Z\s.]/g, '').replace(/(\..*)\./g, '$1');">
                        <div class="valid-feedback">
                          Looks good!
                        </div>
                      </div>
                      <div class="col-md-6">
                        <label for="validationCustom03" class="form-label">State</label>
                        <div class='resp_code frms'>
                          <div id="selection" class="">
                            <select class="form-select" id="listBox" onchange='selct_district(this.value)'  id="validationCustom01" required="" name="state"></select>
                          </div>
                        </div>
                       
                      </div>
                      </select>
                      <div class="col-md-6">
                        <label for="validationCustom03" class="form-label">City</label>
                        <div class='resp_code frms'>
                          <div id="selection" class="">
                            <select id="secondlist" class="form-select" id="listBox"
                              onchange='selct_district(this.value)'  id="validationCustom01 "required name="city"></select>
                          </div>
                          <div id="dumdiv" align="center" style=" font-size: 10px;color: #dadada;"
                            style="display: none;">
                            <a id="dum" style="padding-right:0px; text-decoration:none;color: green;text-align:center;"
                           href="http://www.hscripts.com"></a>
                          </div>
                        </div>
                        <div class="invalid-feedback">
                          Please provide a valid city.
                        </div>
                      </div>
                      <div class="col-md-6">
                        <label for="validationCustom02" class="form-label">Do you want to become member?</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="trend" id="exampleRadios1" value="yes" >
                                      
                            <label class="form-check-label" for="flexRadioDefault1">
                              Yes
                            </label>
                          </div>
                          <div class="form-check">
                             <input class="form-check-input" type="radio" name="trend" id="exampleRadios1" value="no" checked>
                                      
                            <label class="form-check-label" for="flexRadioDefault2">
                              No
                            </label>
                          </div>
                      </div>
                      <div class="col-md-6">
                        <label class="form-label">Mobile no</label>
                    <input type="text" class="form-control" id="phone" maxlength="10" minlength="10" pattern="[789]{1}[0-9]{9}" name="phone" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" placeholder="Mobile no" required="">
                        <div class="valid-feedback">
                          Looks good!
                        </div>
                      </div>
                    
                      <div class="col-md-3">
                      </div>
                      <div class="col-12">
      <div class="mb-3">
        <label for="exampleFormControlTextarea1" class="form-label">Message</label>
        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" id="validationCustom02" name="msg"></textarea>
      </div>
       <div class="valid-feedback">
                          Looks good!
                        </div>
                       </div>
                      <div class="col-12">
                        <button class="btn btn-danger" name="submit" type="submit" style="border-radius: 0px;background-color: #f02e2e" onmouseover="this.style.color='#f9f015';" onmouseout="this.style.color='white' ">SUBMIT</button>
                      </div>
                    </form>
                    <br>
                      <?php echo $done; ?>
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
    <?php include 'footer.php'; ?>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous">
  </script>
</body>

</html>
<script type="text/javascript">
  function validS() {
    var getQuery = document.forms['search']['stext'].value;
    if (getQuery == "") {
      alert('Enter search query');
      return false;
    }
  }
  // Example starter JavaScript for disabling form submissions if there are invalid fields
  (function () {
    'use strict'

    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.querySelectorAll('.needs-validation')

    // Loop over them and prevent submission
    Array.prototype.slice.call(forms)
      .forEach(function (form) {
        form.addEventListener('submit', function (event) {
          if (!form.checkValidity()) {
            event.preventDefault()
            event.stopPropagation()
          }

          form.classList.add('was-validated')
        }, false)
      })
  })()
  var isSumbitted = false;

function checkEnter(e) {
  if (e && e.keyCode == 13) {
    inForm.submit();
    /*
      * 2) set to true after the form submission was invoked
      */
    isSumbitted = true;
  }
}
function onSubmit () {
  if (isSumbitted) {
    /*
    * 3) reset to false after the form submission executed
    */
    isSumbitted = false;
    return false;
  }
}
</script>