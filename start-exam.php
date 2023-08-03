<?php
  //error_reporting(0);
  include 'admincp/config.php';
    $result=0;
    $exam = filter_var(base64_decode($_GET['exam_id']),FILTER_SANITIZE_STRING);
    $name = filter_var(base64_decode($_GET['name']),FILTER_SANITIZE_STRING);
    $mobile =filter_var(base64_decode($_GET['phone']),FILTER_SANITIZE_STRING);
    $state =filter_var(base64_decode($_GET['state']),FILTER_SANITIZE_STRING);
    $city =filter_var(base64_decode($_GET['city']),FILTER_SANITIZE_STRING);

    if ($sql = mysqli_query($con,"SELECT * FROM que WHERE exam_id = '$exam'")) 
    {
        $rows= mysqli_num_rows($sql);
        
    }
    //working of end button
    function saveResult($con,$name,$mobile,$exam,$result,$exam_name,$exam_sp_name,$exam_host_date,$status,$state,$city)
    {
        //checking user already saved result or not
        if ($check = mysqli_query($con,"SELECT * FROM results WHERE mobile='$mobile' AND exam_id='$exam' "))
         {
            if (mysqli_num_rows($check)>0)
            {
                echo "<script>alert('Exam is already givin');</script>";
                header('location:exam');
            }
            else
            {
                if (mysqli_query($con,"INSERT INTO results VALUES (NULL,'$name','$mobile','$exam','$result','$exam_name','$exam_sp_name','$exam_host_date','$status','$state','$city') ")) {
                    header('location:status?name='.base64_encode(base64_encode(base64_encode(base64_encode(base64_encode(base64_encode(base64_encode($name))))))));
                }
            }
        }
        
    }
    //end exam button
    if (isset($_POST['end']))
     {
        //making result
        if ($sql_result = mysqli_query($con,"SELECT * FROM user_answer WHERE user_phone ='$mobile' AND user_exam='$exam'  ")) 
        {
            if (mysqli_num_rows($sql_result) > 0) 
            {
                while ($row_result = mysqli_fetch_assoc($sql_result)) {
                    if ($row_result['user_answer'] == $row_result['correct_answer']) 
                    {
                        $result++;
                    }
                }
            }
        }
        //get the all data for required exam form exam table
        if ($get_data=mysqli_query($con,"SELECT * FROM exam WHERE ex_id='$exam'")) 
        {
            if (mysqli_num_rows($get_data)>0) {
                while ($row_get_data=mysqli_fetch_assoc($get_data)) {
                    $exam_name = $row_get_data['ex_name'];
                    $exam_sp_name = $row_get_data['ex_spname'];
                    $exam_host_date = $row_get_data['ex_date'];
                }
            }
        }
        $status = 'submited';
        $result = $result*2;
        saveResult($con,$name,$mobile,$exam,$result,$exam_name,$exam_sp_name,$exam_host_date,$status,$state,$city);
    }
    //it represent the seiral no of quections

    $sr =  $_GET['sr'];

    if (isset($_POST['submit'])) {
        $answer = filter_var($_POST['answer'],FILTER_SANITIZE_STRING);
        $que_id = filter_var($_POST['que_id'],FILTER_SANITIZE_STRING);
        $bn = filter_var(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode(base64_decode($_POST['bn'])))))),FILTER_SANITIZE_STRING);
        $opt_a = filter_var($_POST['opt_a'],FILTER_SANITIZE_STRING);
        $opt_b = filter_var($_POST['opt_b'],FILTER_SANITIZE_STRING);
        $opt_c = filter_var($_POST['opt_c'],FILTER_SANITIZE_STRING);
        $opt_d = filter_var($_POST['opt_d'],FILTER_SANITIZE_STRING);
        //checking exam is already givin or not
        if ($check = mysqli_query($con,"SELECT * FROM results WHERE mobile='$mobile' AND exam_id='$exam'  AND user_exam='$exam' ")) {
            if (mysqli_num_rows($check)>0) {
                echo "<script>alert('Exam is already givin');</script>";
                exit(0);
            }
            
        }
        function random_str(
    int $length = 64,
    string $keyspace = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'
): string {
    if ($length < 1) {
        throw new \RangeException("Length must be a positive integer");
    }
    $pieces = [];
    $max = mb_strlen($keyspace, '8bit') - 1;
    for ($i = 0; $i < $length; ++$i) {
        $pieces []= $keyspace[random_int(0, $max)];
    }
    return implode('', $pieces);
}
        //if answer is not empty then store answer 
        if (!empty($answer)) 
        {
            $answer_id = random_str(64);
            $que = $_POST['que'];
            //checking user is already saved answer or not
            if ($check_answer=mysqli_query($con,"SELECT * FROM user_answer WHERE user_phone='$mobile' AND que_id='$que_id'")) 
            {
                if (mysqli_num_rows($check_answer)>0)
                {
                    //if user already responded to the answer then update its value
                    if (mysqli_query($con,"UPDATE user_answer SET user_answer='$answer' WHERE que_id='$que_id' AND user_phone='$mobile' "))
                    {
                        $sr = $sr+1;
                         $link = "?exam_id=".base64_encode($exam)."&name=".base64_encode($name)."&phone=".base64_encode($mobile)."&sr=".$sr."&state=".base64_encode($state)."&city=".base64_encode($city);
                      
                        header('location:start-exam'.$link);
                    }
                    else
                    {
                        echo "could not updated!";
                    }
                }
                else
                {
                    //if no then insert the answer of users
                    if ($sql_answer = mysqli_query($con,"INSERT INTO user_answer VALUES (NULL,'$answer_id','$name','$mobile','$que','$opt_a','$opt_b','$opt_c','$opt_d','$que_id','$answer','$bn','$exam') "))
                    {
                        $sr = $sr+1;
                         $link = "?exam_id=".base64_encode($exam)."&name=".base64_encode($name)."&phone=".base64_encode($mobile)."&sr=".$sr."&state=".base64_encode($state)."&city=".base64_encode($city);
                        header('location:start-exam'.$link);
                    }
                }
            }
        }
        else
        {
                        $sr = $sr+1;
                        $link = "?exam_id=".base64_encode($exam)."&name=".base64_encode($name)."&phone=".base64_encode($mobile)."&sr=".$sr."&state=".base64_encode($state)."&city=".base64_encode($city);
                        header('location:start-exam'.$link);
        }
        
    }
    if (isset($_POST['next'])) {
        $sr = $sr+1;
           $link = "?exam_id=".base64_encode($exam)."&name=".base64_encode($name)."&phone=".base64_encode($mobile)."&sr=".$sr."&state=".base64_encode($state)."&city=".base64_encode($city);
        header('location:start-exam'.$link);
    }
    if (isset($_POST['prev'])) {
        $sr = $sr-1;
          $link = "?exam_id=".base64_encode($exam)."&name=".base64_encode($name)."&phone=".base64_encode($mobile)."&sr=".$sr."&state=".base64_encode($state)."&city=".base64_encode($city);
        header('location:start-exam'.$link);
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
                            <div class="card-body">
                                <div class="card">
                                    <h5 class="card-header" id="header_q"><?php echo "Total Quections :".$rows; ?></h5>
                                    <div class="card-body">
                                     
    <form method="POST">
        <?php
        
        if ($sql = mysqli_query($con,"SELECT * FROM que WHERE exam_id = '$exam' LIMIT $sr,1 "))
    {
        if (mysqli_num_rows($sql) > 0)
        {
            while ($row = mysqli_fetch_assoc($sql)) 
            {   
                    $que  = $row['quection'];
                ?>
                <button type="button" class="btn btn-primary btn-sm">
  Quection <span class="badge bg-danger"><?php  echo $sr+1; ?></span>
  <span class="visually-hidden">Quection</span>
</button>
              
                <br>
                <hr>
            <label><strong><?php  echo $row['quection']; ?></strong></label><br>
            <input type="hidden" name="que" id="users" value="<?php echo $row['quection']; ?>">
                <input type="hidden" name="que_id" id="users" value="<?php echo $row['qu_id']; ?>">
                <input type="hidden" name="bn" id="users" value="<?php echo base64_encode(base64_encode(base64_encode(base64_encode(base64_encode(base64_encode($row['answer'])))))) ?>">
                <input type="hidden" name="opt_a" value="<?php echo $row['opt_a']; ?>">
                 <input type="hidden" name="opt_b" value="<?php echo $row['opt_b']; ?>">
                  <input type="hidden" name="opt_c" value="<?php echo $row['opt_c']; ?>">
                   <input type="hidden" name="opt_d" value="<?php echo $row['opt_d']; ?>">

          <br>
                     
            <ul class="list-group">
  <li class="list-group-item" onclick="document.getElementById('ra').checked = true">
   <input type="radio" id="ra" name="answer" value="1" >
  <?php echo $row['opt_a']; ?>
  </li>
  <li class="list-group-item"onclick="document.getElementById('rb').checked = true">
       <input type="radio" id="rb" name="answer" value="2" >
   <?php echo $row['opt_b']; ?>
  </li>
  <li class="list-group-item"onclick="document.getElementById('rc').checked = true">
     <input type="radio" id="rc" name="answer" value="3">
  <?php echo $row['opt_c']; ?>
  </li>
  <li class="list-group-item"onclick="document.getElementById('rd').checked = true">
   <input type="radio" id="rd" name="answer" value="4">
   <?php echo $row['opt_d']; ?>
  </li>
 
</ul>
<br>
            <?php
        }
    }   
    }
    else
    {
        echo "string";
    }
    ?>
    <br>
    <?php
    if ($sr>0) {
        echo '<input type="submit" name="prev" value="Previous" id="p_btn" class="btn btn-secondary btn-sm">';
    }
    ?>
    <input type="submit" name="submit" value="Save and Next" id="btn_next" class="btn btn-success btn-sm">
<?php
    if ($sr < $rows-1) {
        // echo '<input type="submit" name="next" value="Next" class="btn btn-primary btn-sm">';
        
    }
    if ($sr >$rows-1) {
        echo "<b><br>आपने  सवालो का जवाब दे दिया  है!!प्रतियोगिता को बंद करने के लिए निचे दिए गए बटन पर क्लिक करें!! </b> <br><br>";
        echo '<input type="submit" name="end" value="
प्रतियोगिता समाप्त करने के लिए यहां क्लिक करें"  class="btn btn-primary">';
        echo '<script type="text/javascript">
        document.getElementById("btn_next").style.display="none";
        </script>';
         echo '<script type="text/javascript">
        document.getElementById("header_q").style.display="none";
        </script>';
    }
    // else
    // {
        
    //  echo '';
    // }
?>
<br><br>
<?php 

for ($i=1; $i <=$rows ; $i++) { 
    $n = $i-1;
    $link = "?exam_id=".base64_encode($exam)."&name=".base64_encode($name)."&phone=".base64_encode($mobile)."&sr=".$n."&state=".base64_encode($state)."&city=".base64_encode($city);
   ?>
   <a href="<?php echo $link; ?>"  class="btn btn-outline-danger btn-sm" style="margin-top:5px" id="<?php echo $n; ?>" ><?php echo $i; ?></a>
<?php 
}
?>
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
        var name = document.forms['cForm']['name'].value;
        var mobile = document.forms['cForm']['mobile'].value;
        if (name =="") {
            alert('Please Enter Your Name');
            return false;
            document.forms['cForm']['name'].focus();
        }
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
    var url_string = window.location.href;
    var url = new URL(url_string);
        var c = url.searchParams.get("sr");
        //alert(parseInt(c+1));
      
           var element =   document.getElementById(parseInt(c));
              element.classList.add("active");
</script>