<?php
error_reporting(0);
include 'config.php';
session_start();
if(!isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] !== true && $_SESSION["admin"] !== "admin"){
    header("location: index");
    exit;
}
if (isset($_POST['submit'])) {
   $name = filter_var($_POST['name'],FILTER_SANITIZE_STRING);
   $mobile = filter_var($_POST['mobile'],FILTER_SANITIZE_STRING);
   $pad = filter_var($_POST['st'],FILTER_SANITIZE_STRING);
   $ph_name =  filter_var($_POST['photo'],FILTER_SANITIZE_STRING);
   $photo_up = $_FILES['photo']['name']; 
   $destination_photo = '../admincp/trustph/'. $photo_up;
   $extension_ph = pathinfo($photo_up, PATHINFO_EXTENSION);
   $file_vi = $_FILES['photo']['tmp_name'];
    $date = date('d-m-yy');
  if (!in_array($extension_ph, ['jpg','png','jpeg'])) {
         echo "<script>alert('Error! Invalid File Format');</script>";
    }
    else
    {
         $upload_video = move_uploaded_file($file_vi, $destination_photo);
         if ($upload_video) 
         {
               $sql = "INSERT INTO trust VALUES (NULL,'$name','$pad','$mobile','$date','$photo_up') ";
           if (mysqli_query($con,$sql)) 
           {
                $msg = '<div class="alert alert-success">
                                        <strong>Success!</strong> Trustee addedd successfully.
                                    </div>';
               //header('location:trust?menu=trust');

            
                
                 }
                  else
       {
        echo "<script>alert('Error');</script>";
       }
    }

  
 
    else{
        echo "<script>alert('File destination problem!');</script>";
    }
}
}

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Advanced Form Elements | Bootstrap Based Admin Template - Material Design</title>

    <!-- Favicon-->
    <link rel="icon" href="favicon.ico" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="plugins/node-waves/waves.css" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="plugins/animate-css/animate.css" rel="stylesheet" />

    <!-- Colorpicker Css -->
    <link href="plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.css" rel="stylesheet" />

    <!-- Dropzone Css -->
    <link href="plugins/dropzone/dropzone.css" rel="stylesheet">

    <!-- Multi Select Css -->
    <link href="plugins/multi-select/css/multi-select.css" rel="stylesheet">

    <!-- Bootstrap Spinner Css -->
    <link href="plugins/jquery-spinner/css/bootstrap-spinner.css" rel="stylesheet">

    <!-- Bootstrap Tagsinput Css -->
    <link href="plugins/bootstrap-tagsinput/bootstrap-tagsinput.css" rel="stylesheet">

    <!-- Bootstrap Select Css -->
    <link href="plugins/bootstrap-select/css/bootstrap-select.css" rel="stylesheet" />

    <!-- noUISlider Css -->
    <link href="plugins/nouislider/nouislider.min.css" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="css/style.css" rel="stylesheet">

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="css/themes/all-themes.css" rel="stylesheet" />
</head>

<body class="theme-red">
    <!-- Page Loader -->
    <div class="page-loader-wrapper">
        <div class="loader">
            <div class="preloader">
                <div class="spinner-layer pl-red">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
            </div>
            <p>Please wait...</p>
        </div>
    </div>
    <!-- #END# Page Loader -->
    <!-- Overlay For Sidebars -->
    <div class="overlay"></div>
    <!-- #END# Overlay For Sidebars -->
    <!-- Search Bar -->
    <div class="search-bar">
        <div class="search-icon">
            <i class="material-icons">search</i>
        </div>
        <input type="text" placeholder="START TYPING...">
        <div class="close-search">
            <i class="material-icons">close</i>
        </div>
    </div>
    <!-- #END# Search Bar -->
    <!-- Top Bar -->
   <?php include 'navbar.php'; ?>
    <!-- #Top Bar -->
    <section>
        <!-- Left Sidebar -->
         <?php include 'sidebar.php'; ?>
        <!-- #END# Left Sidebar -->
        <!-- Right Sidebar -->
        <?php include 'rightsidebar.php'; ?>
        <!-- #END# Right Sidebar -->
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2><?php echo $msg; ?>
                        </h2>
            </div>
           
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                
                        <div class="body">
                            <form method="POST" action="" enctype="multipart/form-data">
                                <label for="email_address">Name</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" id="email_address" class="form-control" placeholder="Enter name" name="name" required="">
                                    </div>
                                </div>
                                <label for="password">Mobile No</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" id="password" class="form-control" placeholder="Enter mobile no" name="mobile" required="">
                                    </div>
                                </div>
                                 <label for="password">Designation </label>
                                <div class="form-group">
                                    <div class="form-line">
                                      <select class="form-control show-tick" name="st">
                                        <option value="General Secretary">General Secretary (महामंत्री)</option>
                                        <option value="Joint Minister">Joint Minister (सहमंत्री)</option>
                                        <option value="President ">President (अध्यक्ष)</option>
                                        <option value="Vice President ">Vice President (उपाध्यक्ष)</option>
                                        <option value="Treasurer ">Treasurer (कोषाध्यक्ष)</option>
                                        <option value="Senior president">Senior president (वरिष्ट अध्यक्ष)</option>
                                           <option value="Member">Member (सदस्य)</option>
                                           <option value="advisor">Advisor (सल्लागार)</option>
                                    </select>
                                    </div>
                                </div>
                                   <label for="password">Upload Photo</label>
                                <div class="form-group">
                                    <div class="form-line">
                                         <input type="file" class="btn btn-primary waves-effect" name="photo" />
                                    </div>
                                </div>
                                <br>
                                <button type="submit" class="btn btn-primary m-t-15 waves-effect" name="submit">SUBMIT</button>
                                <a href="view_trust?menu=trust"  class="btn btn-success m-t-15 waves-effect" name="submit" name="view">VIEW ALL</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
   
        </div>
    </section>

    <!-- Jquery Core Js -->
    <script src="plugins/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core Js -->
    <script src="plugins/bootstrap/js/bootstrap.js"></script>

    <!-- Select Plugin Js -->
    <script src="plugins/bootstrap-select/js/bootstrap-select.js"></script>

    <!-- Slimscroll Plugin Js -->
    <script src="plugins/jquery-slimscroll/jquery.slimscroll.js"></script>

    <!-- Bootstrap Colorpicker Js -->
    <script src="plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.js"></script>

    <!-- Dropzone Plugin Js -->
    <script src="plugins/dropzone/dropzone.js"></script>

    <!-- Input Mask Plugin Js -->
    <script src="plugins/jquery-inputmask/jquery.inputmask.bundle.js"></script>

    <!-- Multi Select Plugin Js -->
    <script src="plugins/multi-select/js/jquery.multi-select.js"></script>

    <!-- Jquery Spinner Plugin Js -->
    <script src="plugins/jquery-spinner/js/jquery.spinner.js"></script>

    <!-- Bootstrap Tags Input Plugin Js -->
    <script src="plugins/bootstrap-tagsinput/bootstrap-tagsinput.js"></script>

    <!-- noUISlider Plugin Js -->
    <script src="plugins/nouislider/nouislider.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="plugins/node-waves/waves.js"></script>

    <!-- Custom Js -->
    <script src="js/admin.js"></script>
    <script src="js/pages/forms/advanced-form-elements.js"></script>

    <!-- Demo Js -->
    <script src="js/demo.js"></script>
</body>

</html>
