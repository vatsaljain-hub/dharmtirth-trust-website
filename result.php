<?php
  error_reporting(0);
  include 'admincp/config.php';
  //get data of form
  if (isset($_POST['submit'])) {
      $mobile = filter_var($_POST['mobile'],FILTER_SANITIZE_STRING);
      $exam = filter_var($_POST['exam'],FILTER_SANITIZE_STRING);
      $link = "?examid=".base64_encode($exam)."&mobile=".base64_encode(base64_encode($mobile));
      header('location:show-result'.$link);
 }
 if (isset($_GET['e'])) {
    //echo "<script>alert('you dont have given Competition');</script>";
    $error = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>त्रुटि:</strong> आपने प्रतियोगिता नहीं दी है! कृपया मान्य विवरण दर्ज करें
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div><br>';
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
    
    <!-- CDN Links are here -->
    <?php include 'cdn.php'; ?>
    <title>Competition | Dharm Tirth &#8211; Jain Mandir</title>
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
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false"
                        aria-label="Toggle navigation" style="color: white;">
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
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                    data-bs-toggle="dropdown" aria-expanded="false"
                                    style="color: yellow;text-transform: uppercase;"
                                    onmouseover="this.style.color='white';" onmouseout="this.style.color='#f9f015'; ">
                                    <b> More</b>
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown"
                                    style="background-color: #f02e2e">
                                    <li><a class="dropdown-item" href="guru"
                                            style="color: yellow;text-transform: uppercase;"
                                            onmouseover="this.style.backgroundColor='#f02e2e';"><strong
                                                onmouseover="this.style.color='white';"
                                                onmouseout="this.style.color='#f9f015'; ">SANGH PARICHYA</strong></a>
                                    </li>

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
                                            <strong style="text-transform: uppercase;">Competition</strong>
                                        </font>
                                    </div>
                                    <div class="col-md-1">
                                    </div>
                                </div>
                            </div>
                                <?php echo $error; ?>
                            <div class="card-body">
                                <div class="card">
                                
                                    <h5 class="card-header">Please Enter Your Details For Result</h5>
                                    <div class="card-body">
                                        <form id="cForm" onsubmit="return validForm()" method="POST">
                                            <div class="col-md-6">
                                                <label for="validationCustom03" class="form-label"><strong>Please select
                                                        Competition</strong></label>
                                                <select class="form-select" aria-label="Default select example" name="exam">

                                                    <?php
                                                                if ($sql = mysqli_query($con,"SELECT * FROM exam WHERE ex_status='on' ORDER BY sr DESC ")) {
                                                                if (mysqli_num_rows($sql) > 0) 
                                                                {
                                                                    while ($row = mysqli_fetch_assoc($sql))
                                                                    {
                                                                    ?>
                                                                    <option value="<?php echo$row['ex_id'] ;?>">
                                                                       <?php echo $row['ex_name']; ?></option>
                                                                     <?php 
                                                                }
                                                                }
                                                                }
                                                            ?>
                                                    </select>
                                                </div>
                                                <br>
                                            <div class="col-md-6">
                                                <label class="form-label"><strong>Please Enter your WhatsApp
                                                        number</strong></label>
                                                <input type="text" class="form-control" id="phone" maxlength="10"
                                                    minlength="10" pattern="[789]{1}[0-9]{9}" name="mobile"
                                                    oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"
                                                    placeholder="Please enter your whatsapp no here" >

                                            </div>
                                         
                                            <br>
                                                                            <div class="col-12">
                                                <button class="btn btn-danger" name="submit" type="submit"
                                                    style="border-radius: 0px;background-color: #f02e2e"
                                                    onmouseover="this.style.color='#f9f015';"
                                                    onmouseout="this.style.color='white' ">View Result</button>
                                            </div>
                                        </form>
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
    function validForm()
    {
        var mobile = document.forms['cForm']['mobile'].value;
        if (mobile == "") {
             alert('Please Enter Your WhatsApp Number');
            return false;
            document.forms['cForm']['mobile'].focus(); 
        }
        else
        {
            return true;
        }
    }
</script>