<?php
include 'config.php';
session_start();
if(!isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] !== true && $_SESSION["admin"] !== "admin"){
    header("location: index");
    exit;
}
if (isset($_POST['submit'])) {
    $name = filter_var($_POST['pdfname'],FILTER_SANITIZE_STRING);
    $pdf = $_FILES['pdffile']['name']; 
    $destination_pdf = '../admincp/videoupload/'. $pdf;
    $extension_pdf = pathinfo($pdf, PATHINFO_EXTENSION);
    $file_vi = $_FILES['pdffile']['tmp_name'];
    $size = $_FILES['pdffile']['size'];
    $date = date('d-m-yy');
    if (!in_array($extension_pdf, ['mp4'])) {
         echo "<script>alert('Error! Invalid File Format');</script>";
  }
  else
  {  
    $upload_video = move_uploaded_file($file_vi, $destination_pdf);
     if ($upload_video) 
     {
       $sql = "INSERT INTO video VALUES (null,'$name','$pdf','$date','$size',0)";
       if (mysqli_query($con,$sql)) {
          $done ='<div class="alert alert-success alert-dismissible" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                                File uploaded successfully!
                            </div>' ;
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
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet"
        type="text/css">
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
                <h2>UPLOAD A VIDEO FILE</h2>
            </div>
            <!-- Color Pickers -->
            <div class="row clearfix">

            </div>
            <!-- #END# Color Pickers -->
            <!-- File Upload | Drag & Drop OR With Click & Choose -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                 WEBSITE VIDEOS
                                <small>VIDEOS  WILL DISPLAY IN VIDEO SEACTION PAGE OF WEBSITE</small>
                                <?php echo $done; ?>
                            </h2>

                        </div>
                        <div class="body">
                            <form action="" id="frmFileUpload" method="post" enctype="multipart/form-data"
                                onsubmit="return valid()">
                                <div class="dz-message">
                                    <div class="drag-icon-cph">
                                        <i class="material-icons">

                                        </i>
                                    </div>
                                    <h3>Drop files here or click to upload.</h3>

                                </div>
                                <div class="fallback">
                                    <input type="file" class="btn btn-primary waves-effect" name="pdffile" />
                                </div>
<br>
                                <div class="row clearfix">
                                    <div class="col-md-4">
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="material-icons">movie</i>
                                            </span>
                                            <div class="form-line">
                                                <input type="text" class="form-control date"
                                                    placeholder="Please enter  title" name="pdfname">
                                            </div>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-danger waves-effect" name="submit">
                                        <i class="material-icons">upload</i>
                                        <span>UPLOAD</span>

                                    </button>
                                    <a href="allvid?menu=vid" type="button" class="btn bg-deep-purple waves-effect">
                                    <i class="material-icons">movie</i>
                                    <span>ALL VIDEOS</span>
                                </a>

                                </div>

                            </form>
                            <script type="text/javascript">
                                function valid() {

                                    var check = document.forms['frmFileUpload']['pdfname'].value;
                                    if (check == "") {
                                        alert('Please enter file title');
                                        return false;
                                    }

                                }
                            </script>

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