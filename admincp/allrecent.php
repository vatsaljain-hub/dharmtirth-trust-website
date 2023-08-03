<!DOCTYPE html>
<html>

<?php
include 'config.php';
session_start();
if(!isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] !== true && $_SESSION["admin"] !== "admin"){
    header("location: index");
    exit;
}
?>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <title>Admin Panel &#8211; Jain Mandir | Founder &#8211; Acharya Shri Guptinandi ji Muniraj</title>
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
                <h2>RECENT PROGRAMS INFORMATION</h2>
            </div>
            <!-- Basic Table -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                RECENT PROGRAMS
                                <small>this are images uploaded at website recent program seaction </small>
                            </h2>

                        </div>
                        <div class="body table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>TITLE</th>
                                        <th>NAME</th>
                                        <th>DATE</th>
                                        <th>SIZE</th>
                                        <th>ACTION</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                     $limit = isset($_POST["limit-records"]) ? $_POST["limit-records"] : 5;
                                     $page = filter_var(isset($_GET['page']) ? $_GET['page'] : 1,FILTER_SANITIZE_STRING);
                                      $start = ($page - 1) * $limit;
                                    $sql = "SELECT * FROM recent LIMIT $start,$limit";
                                    $data = mysqli_query($con,$sql);
                                    $result1 = $con->query("SELECT count(id) AS id FROM recent");
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
                                        <td><?php echo $row['title']; ?></td>
                                        <td><?php echo $row['name']; ?></td>
                                          <td><?php echo $row['date']; ?></td>
                                        <td><?php echo floor($row['size'] / 1000) . ' KB'; ?></td>
                                        
                                        <td>
                                            <a href="delrecent?id=<?php echo $row['id'];?>" type="button"
                                                class="btn bg-red btn-circle waves-effect waves-circle waves-float">
                                                <i class="material-icons">delete</i>
                                            </a>
                                            <a href="recent/<?php echo $row['name'];?>" type="button"
                                                class="btn bg-purple btn-circle waves-effect waves-circle waves-float">
                                                <i class="material-icons">visibility</i>
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
    </section>

    <!-- Jquery Core Js -->
    <script src="plugins/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core Js -->
    <script src="plugins/bootstrap/js/bootstrap.js"></script>

    <!-- Select Plugin Js -->
    <script src="plugins/bootstrap-select/js/bootstrap-select.js"></script>

    <!-- Slimscroll Plugin Js -->
    <script src="plugins/jquery-slimscroll/jquery.slimscroll.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="plugins/node-waves/waves.js"></script>

    <!-- Custom Js -->
    <script src="js/admin.js"></script>

    <!-- Demo Js -->
    <script src="js/demo.js"></script>
</body>

</html>