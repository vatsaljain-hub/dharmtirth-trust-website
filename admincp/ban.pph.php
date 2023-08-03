<?php
 include 'config.php';
 $ip = $_SERVER["REMOTE_ADDR"];
 $result = mysqli_query($con, "SELECT COUNT(*) FROM `ip_ban` WHERE `address` LIKE '$ip' AND `timestamp` > (now() - interval 1 minute)");
                        $count = mysqli_fetch_array($result, MYSQLI_NUM);

                        if($count[0] > 3){
                         header('location:ban');
                          exit();
                        }
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>500 | BANED</title>
    <!-- Favicon-->
    <link rel="icon" href="favicon.ico" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="plugins/node-waves/waves.css" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body class="five-zero-zero">
    <div class="five-zero-zero-container">
        <div class="error-code">BANED!!</div>
        <div class="error-message">INVALID LOGIN ACTIVITY DETECTED BY OUR SYSTEM</div>
        <p>Try again later..</p>
        <div class="button-place">
            <a href="./" class="btn btn-default btn-lg waves-effect">RETRY</a>
        </div>
    </div>

    <!-- Jquery Core Js -->
    <script src="plugins/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core Js -->
    <script src="plugins/bootstrap/js/bootstrap.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="plugins/node-waves/waves.js"></script>
</body>

</html>