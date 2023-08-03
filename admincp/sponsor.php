<?php
error_reporting(0);
include 'config.php';
session_start();
if(!isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] !== true && $_SESSION["admin"] !== "admin"){
    header("location: index");
    exit;
}
if (isset($_POST['sp_btn'])) {
    $get_sp_name = filter_var($_POST['spname'],FILTER_SANITIZE_STRING);
    $get_status = filter_var($_POST['status'],FILTER_SANITIZE_STRING);
    $date = date('d-m-yy');
    $ph_name =  filter_var($_POST['photo'],FILTER_SANITIZE_STRING);
    $photo_up = $_FILES['sp_photo']['name']; 
   $destination_photo = '../admincp/spphoto/'. $photo_up;
   $extension_ph = pathinfo($photo_up, PATHINFO_EXTENSION);
   $file_vi = $_FILES['sp_photo']['tmp_name'];
   error_reporting(0);
 if (!in_array($extension_ph, ['jpg','png','jpeg'])) {
         echo "<script>alert('Error! Invalid File Format');</script>";
    }
    else
    {
         $upload_video = move_uploaded_file($file_vi, $destination_photo);
          if ($upload_video) 
         {
                 $sql = "INSERT INTO sponsor VALUES (NULL,'$get_sp_name','$date','$get_status','$photo_up') ";
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

 

if (isset($_POST['set']))
 {
    $get = $_POST['set'];
    $update = "UPDATE spset SET sp_set='$get'";
    if (mysqli_query($con,$update)) 
    {
     // echo "<script>alert('updated');</script>";
    }
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Modals | Bootstrap Based Admin Template - Material Design</title>
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
                <h2>SPONSOR MANAGEMENT</h2>
            </div>
            <!-- Modal Size Example -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                SPONSOR DETAILS
                               
                            </h2>
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        <i class="material-icons">more_vert</i>
                                    </a>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="javascript:void(0);">Action</a></li>
                                        <li><a href="javascript:void(0);">Another action</a></li>
                                        <li><a href="javascript:void(0);">Something else here</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="body">
                            
                             

                            <form action="" method="POST">
                                <button type="button" data-color="purple" class="btn bg-red waves-effect" data-toggle="modal" data-target="#defaultModal" style="text-transform: uppercase;">Add Sponsor</button>
                                  <?php
                                    
                                    $sql = "SELECT * FROM spset";
                                    $data = mysqli_query($con,$sql);
                                    if (mysqli_num_rows($data) > 0) {
                                      while ($row = mysqli_fetch_assoc($data)) {
                                            if ($row['sp_set'] == 'yes') {?>
                                             
                                                <button type="submit" class="btn bg-red waves-effect m-r-20"  name="set" value="no">DISABLE SPONSORSHIP</button>

                                            
                                    
                               
                            <?php }

                            else
                            {?>
                                   <button type="submit" class="btn bg-green waves-effect m-r-20"  name="set" value="yes">ENABLE SPONSORSHIP</button>
                           <?php } }
                        }?>
                            </form>
                           
                        </div>
                    </div>
                </div>
                <div class="container-fluid">
            <div class="block-header">
                <h2>SPONSOR INFORMATION</h2>
            </div>
            <!-- Basic Table -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                               ALL SPONSOR
                              
                            </h2>

                        </div>
                        <div class="body table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>NAME</th>
                                       <th>STATUS</th>
                                       <th>PHOTO</th>
                                        <th>DATE</th>
                                       
                                        <th>ACTION</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                     $limit = isset($_POST["limit-records"]) ? $_POST["limit-records"] : 5;
                                     $page = filter_var(isset($_GET['page']) ? $_GET['page'] : 1,FILTER_SANITIZE_STRING);
                                      $start = ($page - 1) * $limit;
                                    $sql = "SELECT * FROM sponsor LIMIT $start,$limit";
                                    $data = mysqli_query($con,$sql);
                                    $result1 = $con->query("SELECT count(id) AS id FROM sponsor");
                                    $custCount = $result1->fetch_all(MYSQLI_ASSOC);
                                    $total = $custCount[0]['id'];
                                    $pages = ceil( $total / $limit );   
                                    $Previous = $page - 1;
                                    $Next = $page + 1; 
                                    if (mysqli_num_rows($data) > 0) {
                                      while ($row = mysqli_fetch_assoc($data)) {
                                        ?>
                                    <tr>
                                        <th scope="row"><?php echo $row['id']; ?></th>
                                        <td><?php echo $row['sp_name']; ?></td>
                                       
                                        <td><?php echo $row['status']; ?></td>
                                        <td> <img src="spphoto/<?php echo$row['photo'] ;?>" style="height: 50px;width:50px;"></td>
                                        <td><?php echo $row['date']; ?></td>
                                       
                                        <td>
                                            <a href="delsp?id=<?php echo $row['id'];?>" type="button"
                                                class="btn bg-red btn-circle waves-effect waves-circle waves-float">
                                                <i class="material-icons">delete</i>
                                            </a>
                                           
                                        </td>

                                    </tr>

                                    <?php }
                                    }
                                    else
                                    {
                                        echo "<td colspan='9'><b><center>No more data to show you!</b></center></td>";
                                    }
                                ?>

                                </tbody>

                            </table>
                            <div class="col-sm-7">
                                <div class="dataTables_paginate paging_simple_numbers" id="DataTables_Table_0_paginate">
                                    <ul class="pagination">
                                        <li class="paginate_button previous " id="DataTables_Table_0_previous">
                                            <a href="?page=<?= $Previous; ?>" aria-controls="DataTables_Table_0"
                                                data-dt-idx="0" tabindex="0">Previous</a>
                                        </li>
                                        <?php for($i = 1; $i<= $pages; $i++) : ?>
                                        <li class="paginate_button active"><a aria-controls="DataTables_Table_0"
                                                data-dt-idx="1" tabindex="0"
                                                href="?page=<?= $i; ?>"><b><?= $i; ?></b></a></li>
                                        <?php endfor; ?>
                                        <li>





                                        </li>

                                        <li class="paginate_button next" id="DataTables_Table_0_next">
                                            <a href="?page=<?= $Next; ?>" aria-controls="DataTables_Table_0"
                                                data-dt-idx="7" tabindex="0">Next</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

        </div>
            </div>

            <!-- #END# Modal Size Example -->
            <!-- Material Design Colors -->
           
            <!-- #END# Material Design Colors -->
            <!-- Modal Dialogs ====================================================================================================================== -->
            <!-- Default Size -->
            <div class="modal fade" id="defaultModal" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="defaultModalLabel">Enter Sponsor Details</h4>
                        </div>
                        <div class="modal-body">
                              <div role="tabpanel" class="tab-pane fade in" id="change_password_settings">
                                        <form class="form-horizontal" id="changepass" onsubmit="return validPass();" method="POST" enctype="multipart/form-data">
                                            
                                         
                                            <div class="form-group">
                                                <label for="NewPasswordConfirm" class="col-sm-3 control-label">Sponsor Name</label>
                                                <div class="col-sm-9">
                                                    <div class="form-line">
                                                        <input type="text" class="form-control" id="NewPasswordConfirm" name="spname" placeholder="sponsor name" >
                                                    </div>
                                                </div>
                                            </div>
                                            <br>
                                              <div class="form-group">
                                                <label for="NewPasswordConfirm" class="col-sm-3 control-label">Sponsor Status</label>
                                                <div class="col-sm-9">
                                                   
                                                       <div class="form-group">
                                                        <input type="radio" name="status" id="male" class="with-gap" aria-required="true" value="yes">
                                                        <label for="male">Display  on website</label>

                                                        <input type="radio" name="status" id="female" class="with-gap" value="no" checked="">
                                                        <label for="female" class="m-l-20">Don't Display on website</label>
                                                    </div>
                                                  
                                                </div>
                                            </div>
                                            <br>

                                            <div class="form-group">
                                                <label for="" class="col-sm-3 control-label">Sponsor Photo</label>
                                                <div class="col-sm-9">
                                                    <div class="form-line">
                                                        <input type="file" class="form-control" name="sp_photo">
                                                    </div>
                                                </div>
                                            </div>
                                            <br>
                                            <div class="form-group">
                                                <div class="col-sm-offset-3 col-sm-9">
                                                    <button type="submit" class="btn btn-danger" name="sp_btn">SAVE</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <script type="text/javascript">
                                        function validPass()
                                        {
                                            var getname = document.forms['changepass']['spname'].value;
                                            if (getname == "") {
                                                alert('Enter Sponsor Name');
                                                return false;
                                            }
                                        }
                                    </script>
                        </div>
                        
                    </div>
                </div>
            </div>

            <!-- Large Size -->
            <div class="modal fade" id="largeModal" tabindex="-1" role="dialog">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="largeModalLabel">Modal title</h4>
                        </div>
                        <div class="modal-body">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin sodales orci ante, sed ornare eros vestibulum ut. Ut accumsan
                            vitae eros sit amet tristique. Nullam scelerisque nunc enim, non dignissim nibh faucibus ullamcorper.
                            Fusce pulvinar libero vel ligula iaculis ullamcorper. Integer dapibus, mi ac tempor varius, purus
                            nibh mattis erat, vitae porta nunc nisi non tellus. Vivamus mollis ante non massa egestas fringilla.
                            Vestibulum egestas consectetur nunc at ultricies. Morbi quis consectetur nunc.
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-link waves-effect">SAVE CHANGES</button>
                            <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Small Size -->
            <div class="modal fade" id="smallModal" tabindex="-1" role="dialog">
                <div class="modal-dialog modal-sm" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="smallModalLabel">Modal title</h4>
                        </div>
                        <div class="modal-body">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin sodales orci ante, sed ornare eros vestibulum ut. Ut accumsan
                            vitae eros sit amet tristique. Nullam scelerisque nunc enim, non dignissim nibh faucibus ullamcorper.
                            Fusce pulvinar libero vel ligula iaculis ullamcorper. Integer dapibus, mi ac tempor varius, purus
                            nibh mattis erat, vitae porta nunc nisi non tellus. Vivamus mollis ante non massa egestas fringilla.
                            Vestibulum egestas consectetur nunc at ultricies. Morbi quis consectetur nunc.
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-link waves-effect">SAVE CHANGES</button>
                            <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- For Material Design Colors -->
            <div class="modal fade" id="mdModal" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="defaultModalLabel">Modal title</h4>
                        </div>
                        <div class="modal-body">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin sodales orci ante, sed ornare eros vestibulum ut. Ut accumsan
                            vitae eros sit amet tristique. Nullam scelerisque nunc enim, non dignissim nibh faucibus ullamcorper.
                            Fusce pulvinar libero vel ligula iaculis ullamcorper. Integer dapibus, mi ac tempor varius, purus
                            nibh mattis erat, vitae porta nunc nisi non tellus. Vivamus mollis ante non massa egestas fringilla.
                            Vestibulum egestas consectetur nunc at ultricies. Morbi quis consectetur nunc.
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-link waves-effect">SAVE CHANGES</button>
                            <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
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

    <!-- Bootstrap Notify Plugin Js -->
    <script src="plugins/bootstrap-notify/bootstrap-notify.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="plugins/node-waves/waves.js"></script>

    <!-- Custom Js -->
    <script src="js/admin.js"></script>
    <script src="js/pages/ui/modals.js"></script>

    <!-- Demo Js -->
    <script src="js/demo.js"></script>
</body>

</html>
