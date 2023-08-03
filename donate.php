<?php
error_reporting(0);
  include 'admincp/config.php';
  if (isset($_POST['submit'])) {
    //get data
     // echo "<script>alert('101');</script>";
    $name = filter_var($_POST['name'],FILTER_SANITIZE_STRING);
    $mobile =filter_var( $_POST['phone'],FILTER_SANITIZE_STRING);
    $mode = filter_var( $_POST['mode'],FILTER_SANITIZE_STRING);
    $amount = filter_var( $_POST['amount'],FILTER_SANITIZE_STRING);
    $txn = filter_var( $_POST['txn'],FILTER_SANITIZE_STRING);
    $pan = filter_var( $_POST['pan'],FILTER_SANITIZE_STRING);
    $msg = filter_var( $_POST['msg'],FILTER_SANITIZE_STRING);
    $ss = $_FILES['ss']['name'];
    $destination_ss = 'admincp/ss/'. $ss;
    $extension_ss = pathinfo($ss, PATHINFO_EXTENSION);
    $date = date('d-m-y');
    $file_vi = $_FILES['ss']['tmp_name'];
    if (!in_array($extension_ss, ['jpg','png','jpeg'])) {
         echo "<script>alert('Error! Invalid File Format');</script>";
    }
      else
  {  
    $upload_video = move_uploaded_file($file_vi, $destination_ss);
     if ($upload_video) 
     {
		
       $sql = "INSERT INTO `payment`(`id`, `name`, `mobile`, `pay_mode`, `txn_id`, `pan_card`, `ss`, `msg`, `date`) VALUES (NULL,'$name','$mobile','$mode','$txn','$pan' ,'$ss','$msg','$date')";
		 
       if (mysqli_query($con,$sql)) {
           $done = '<div class="alert alert-success  alert-dismissible fade show" role="alert">
  <strong>Thank You!</strong> Your details are send successfully!!.
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
       }
       else
       {
        echo "<script>alert('Error');</script>";
       }
     }
     else
     {
      echo "<script>alert('Error files destination problem..');</script>";
     }
  }

    //echo $first_name , $last_name , $state , $city , $phone , $date;
   
  }
?>
<!doctype html>
<html lang="en">

<head>
  <!--  meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script language="Javascript" src="js/jquery.js"></script>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

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
              <a class="nav-link" href="donate" style="color: white;text-transform: uppercase;"
                onmouseover="this.style.color='white';" onmouseout="this.style.color='#f9f015'; ">
                <strong>Donate</strong>
              </a>
              <a class="nav-link" href="contact" style="color: yellow;text-transform: uppercase;"
                onmouseover="this.style.color='white';" onmouseout="this.style.color='#f9f015'; ">
                <strong>contact</strong>
              </a>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown"
                  aria-expanded="false" style="color: yellow;text-transform: uppercase;"
                  onmouseover="this.style.color='white';" onmouseout="this.style.color='#f9f015'; ">
                  <b> More</b>
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown" style="background-color: #f02e2e">
                  <li><a class="dropdown-item" href="guru" style="color: yellow;text-transform: uppercase;"
                      onmouseover="this.style.backgroundColor='#f02e2e';"><strong
                        onmouseover="this.style.color='white';" onmouseout="this.style.color='#f9f015'; ">SANGH
                        PARICHYA</strong></a></li>

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
                    <h4 style="color: #f02e2e">Bank Details</h4>
                        <hr>
                        <br>
                    <div class="row">

                      <div class="col-md-12">
                     <img src="images/bank.jpeg" class="img-fluid" alt="Image Here">
                      </div>
                     
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <br>
                     
                 <STRONG style="color: #f02e2e">
                  
                      <hr>
                      <h4>
                        <strong style="color: #f02e2e">धर्मतीर्थ  बैंक डिटेल</strong>
                     </h4>
                    नाम:- धर्मराजश्री तपोभूमि दिगंबर जैन ट्रस्ट<br>
                      Bank Details:- बैंक ऑफ बड़ौदा   <br>
                      A/C No.04600100006425  <br>
                      IFSC Code:BARB0AURANG  <br>
                      Branch:- Aurangabad Main branch  <br>
                      <hr>
                   
                          <i class="fa fa-phone"></i> For Any Technical Support-
                         <ul type="dics">
                           <li>+91 9146338680</li>
                              
                         </ul>
                        
                        <hr>
                      नाम:- धर्मराजश्री तपोभूमि दिगंबर जैन ट्रस्ट  <br>
                      Bank Name--State Bank Of India  <br>
                      A/C No.30642359148  <br>
                      IFSC Code-- SBIN0004428  <br>
                      Branch--Aliganj Lucknow  <br></STRONG>
                       <hr>
                      </div>
                     
                    </div>
                  </div>

                  <div class="col-md-6">
                    <form action="" method="POST" enctype="multipart/form-data" id="donate" onsubmit="return valid()">
                      <div class="mb-3">
                        <h4 style="color: #f02e2e">Submit Your Transaction Here</h4>
                        <hr>
                        <br>
                        <label for="exampleInputEmail1" class="form-label">Full Name</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                          placeholder="Enter your full name" name="name">

                      </div>
                      <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Mobile No</label>

                        <input type="text" class="form-control" id="phone" maxlength="10" minlength="10"
                          pattern="[789]{1}[0-9]{9}" name="phone"
                          oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"
                          placeholder="Mobile no" >
                      </div>
                      <div class="mb-3">
                        <label>Mode of Payment</label>
                        <select class="form-select" aria-label="Default select example" name="mode">

                        <option value="Net Banking">Net Banking</option>
                          <option value="NEFT">NEFT</option>
                          <option value="UPI">UPI</option>
                          <option value="RTGS">RTGS</option>
                        </select>
                      </div>
                      <div class="mb-3">
                        <label>Amount</label>
                        <div class="input-group mb-3">
                          <span class="input-group-text">₹</span>
                          <input type="text" class="form-control" aria-label="Amount (to the nearest dollar)" name="amount"  oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');">
                          <span class="input-group-text">.00</span>
                        </div>
                      </div>

                      <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Transaction No</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                          placeholder="Enter Transaction No " name="txn">

                      </div>

                      <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">PAN CARD No</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                          placeholder="Enter PAN no" name="pan">

                      </div>
                      <label for="exampleInputEmail1" class="form-label">Upload Screen shot</label>
                      <div class="input-group mb-3">
                        <input type="file" class="form-control" id="inputGroupFile02" name="ss">
                        <label class="input-group-text" for="inputGroupFile02">Upload</label>

                      </div>
                      <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">Message</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="msg"></textarea>
                      </div>
                     <button class="btn btn-danger" name="submit" type="submit" style="border-radius: 0px;background-color: #f02e2e" onmouseover="this.style.color='#f9f015';" onmouseout="this.style.color='white' ">SUBMIT</button>
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

  function onSubmit() {
    if (isSumbitted) {
      /*
       * 3) reset to false after the form submission executed
       */
      isSumbitted = false;
      return false;
    }
  }
  function valid()
    {
        
        var name = document.forms['donate']['name'].value;
        var phone = document.forms['donate']['phone'].value;
        var amount = document.forms['donate']['amount'].value;
        var txn = document.forms['donate']['txn'].value;
        //var pan = document.forms['donate']['pan'].value;
        if (name == "") {
          alert('Enter Name');
          return false;
        }
        if (phone == "") {
          alert('Enter Phone');
          return false;
        }
        if (amount == "") {
          alert('Enter Amount');
          return false;
        }
        if (amount == 0) {
          alert('Invalid Amount');
          return false;
        }
        if (txn == "") {
          alert('Enter Transaction No');
          return false;
        }

        else
        {
          return true;
        }
    }
</script>