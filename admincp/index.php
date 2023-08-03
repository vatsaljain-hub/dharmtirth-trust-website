<?php
 include 'config.php';
 $ip = $_SERVER["REMOTE_ADDR"];
 $result = mysqli_query($con, "SELECT COUNT(*) FROM `ip_ban` WHERE `address` LIKE '$ip' AND `timestamp` > (now() - interval 1 minute)");
                        $count = mysqli_fetch_array($result, MYSQLI_NUM);

                        if($count[0] > 3){
                         header('location:ban');
                          exit();
                        }
    if (isset($_GET['msg'])) {
        $decode = base64_decode(filter_var($_GET['msg']),FILTER_SANITIZE_STRING);
        echo ' <div class="alert alert-success">
                <strong>Your Details Are Updated!!</strong>'.$decode .'</div>';
    }
   
    session_start();
// Check if the user is logged in, if not then redirect him to login page
    if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] == true && $_SESSION["admin"] == "admin"){
        header("location: dashboard?menu=home");
        exit;
    }
    if (isset($_POST['submit'])) {
        $username = filter_var($_POST['username'],FILTER_SANITIZE_STRING);
        $password = filter_var($_POST['password'],FILTER_SANITIZE_STRING);
        $mdpass = md5($password);
        $select = "SELECT * FROM admin WHERE username='$username' AND password='$mdpass'";
        $result = mysqli_query($con,$select);
        $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
        $count = mysqli_num_rows($result);
        if ($count == 1) {
                        $_SESSION["loggedin"] = true;
                        $_SESSION["username"] = $username;
                        $_SESSION["admin"] = "admin";      
                        session_regenerate_id();                                           
                        header("location: dashboard?menu=home");
    }
     else
    {
         echo ' <div class="alert alert-danger">
                                <strong>Oh snap!</strong> Invalid Details are Entered.
                            </div>';
                            $ip = $_SERVER["REMOTE_ADDR"];
                        mysqli_query($con, "INSERT INTO `ip_ban` (`address` ,`timestamp`)VALUES ('$ip',CURRENT_TIMESTAMP)");
                        $result = mysqli_query($con, "SELECT COUNT(*) FROM `ip_ban` WHERE `address` LIKE '$ip' AND `timestamp` > (now() - interval 1 minute)");
                        $count = mysqli_fetch_array($result, MYSQLI_NUM);

                        if($count[0] > 3){
                           header('location:ban');
                             exit();
                          
                        }
    }

    }
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Admin Panel &#8211; Jain Mandir | Founder &#8211; Acharya Shri Guptinandi ji Muniraj</title>
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
</head>
<script type="text/javascript">
    var val1;
function randomNumber(min, max) {  
    min = Math.ceil(min); 
    max = Math.floor(max); 
    val1 = Math.floor(Math.random() * (max - min + 99999)) + min; 

    return val1;
}  
function valid()
{
    var captcha = document.forms['sign_in']['captcha'].value;
    if (captcha != val1) {
        alert('Wrong Captcha');
        return false;
        window.focus();
    }
}
  
  
</script>
<body class="login-page">
    <div class="login-box">
        <div class="logo">
            <a href="javascript:void(0);">Admin<b>Dharm Tirth</b></a>
            <small>THIS PAGE IS ONLY FOR ADMINS!!</small>
        </div>
        <div class="card">
            <div class="body">
                <form id="sign_in" method="POST" onsubmit="return valid()">
                    <div class="msg">Sign in to start your session</div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">person</i>
                        </span>
                        <div class="form-line">
                            <input type="text" class="form-control" name="username" placeholder="Username" required autofocus>
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">lock</i>
                        </span>
                        <div class="form-line">
                            <input type="password" class="form-control" name="password" placeholder="Password" required>
                        </div>
                    </div>
                      <div class="input-group">
                        <span class="input-group-addon" id="">
                            Enter Captcha
                            <script type="text/javascript">
                                 
                                document.write("<font color='green' >(<b>"+randomNumber(1, 10)+")</font></b>" ); 
                            </script>
                        </span>
                        <div class="form-line">
                            <input type="text" class="form-control" name="captcha" placeholder="Captcha value" required  oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-8 p-t-5">
                            <input type="checkbox" name="rememberme" id="rememberme" class="filled-in chk-col-pink">
                            <label for="rememberme">Remember Me</label>
                        </div>
                        <div class="col-xs-4">
                            <button class="btn btn-block bg-pink waves-effect" type="submit" name="submit">SIGN IN</button>
                        </div>
                    </div>
                    
                </form>
            </div>
        </div>
    </div>

    <!-- Jquery Core Js -->
    <script src="plugins/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core Js -->
    <script src="bootstrap/js/bootstrap.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="plugins/node-waves/waves.js"></script>

    <!-- Validation Plugin Js -->
    <script src="plugins/jquery-validation/jquery.validate.js"></script>

    <!-- Custom Js -->
    <script src="js/admin.js"></script>
    <script src="js/pages/examples/sign-in.js"></script>
</body>

</html>
