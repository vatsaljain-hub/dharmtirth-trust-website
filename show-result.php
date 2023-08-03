<?php
    include 'admincp/config.php';
    error_reporting(0);
    //getting results of a student
        $mobile= filter_var(base64_decode(base64_decode($_GET['mobile'])),FILTER_SANITIZE_STRING);
        $id= filter_var(base64_decode($_GET['examid']),FILTER_SANITIZE_STRING);
       
            if ($sql=mysqli_query($con,"SELECT * FROM results WHERE mobile='$mobile' AND exam_id='$id' ")) {
            if (mysqli_num_rows($sql)>0) {
                while ($row = mysqli_fetch_assoc($sql)) {
                    $result = $row['result'];
                    $name = $row['name'];
                    $exam_name = $row['exam_name'];

                    $exam_sp_name = $row['exam_sp_name'];
                    $exam_host_date =$row['exam_host_date'];
                  
                }
            }
            else
            {
                //echo "No data found";
            }
            }
            else
            {
               // echo "No data found";
              }
           
?>
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
                                    <h5 class="card-header">Your Result  </h5>
                                    <div class="table-responsive table-bordered">
                                        <table class="table table-success">
                                      <thead>
                                        <tr>
                                          <th scope="col">नाम</th>
                                        <td><?php echo $name; ?></td>
                                        
                                        </tr>
                                      </thead>
                                      <thead>
                                        <tr>
                                          <th scope="col">प्रतियोगिता का नाम    </th>
                                        <td><?php echo $exam_name; ?></td>
                                        
                                        </tr>
                                      </thead>
                                       <thead>
                                        <tr>
                                          <th scope="col">प्रतियोगिता प्रायोजक    </th>
                                        <td><?php echo $exam_sp_name; ?></td>
                                        
                                        </tr>
                                      </thead>
                                      <thead>
                                        <tr>
                                          <th scope="col">मोबाइल    </th>
                                        <td><?php echo $mobile; ?></td>
                                        
                                        </tr>
                                      </thead>
                                      <thead>
                                        <tr>
                                          <th scope="col">अपने स्कोर   </th>
                                        <td><?php echo $result; ?>%</td>
                                        
                                        </tr>
                                      </thead>
                                

                                      <tbody>
                                    
                                  </tbody>
                                </table>
                                         <table class="table table-bordered table-striped table-hover">
                                          <thead>

                                            <tr>
                                              <th scope="col">क्रमांक   </th>
                                              <th scope="col">सवाल</th>
                                              <th scope="col">आपका जवाब    </th>
                                              <th scope="col">सही जवाब
</th>
                                            </tr>
                                          </thead>
                                           <tbody>
                                            <?php
                                                $count =0;
                                           if ($sql=mysqli_query($con,"SELECT * FROM user_answer WHERE user_phone='$mobile' AND user_exam='$id' ")) {
                                                if (mysqli_num_rows($sql)>0) {
                                                    while ($row = mysqli_fetch_assoc($sql)) {
                                                        $que = $row['que'];
                                                        $count++;
                                                        $a = $row['a'];
                                                        $b = $row['b'];
                                                        $c = $row['c'];
                                                        $d = $row['d'];
                                                        $user_answer = $row['user_answer'];
                                                        $correct_answer = $row['correct_answer'];
                                                        if ($user_answer == "1") {
                                                            $set = $row['a'];
                                                        }
                                                        else if ($user_answer == "2") {
                                                             $set = $row['b'];
                                                        }
                                                        else if ($user_answer == "3") {
                                                             $set = $row['c'];
                                                        }
                                                        else
                                                        {
                                                              $set = $row['d'];
                                                        }
                                                        if ($correct_answer == "1") {
                                                            $set_answer = $row['a'];
                                                         } 
                                                         elseif ($correct_answer == "2") {
                                                             $set_answer = $row['b'];
                                                         }
                                                         elseif ($correct_answer == "3") {
                                                            $set_answer = $row['c'];
                                                         }
                                                         else
                                                         {
                                                            $set_answer = $row['d'];
                                                         }

                                                    ?>

                                            <tr>
                                              <th scope="row"><?php echo $count; ?></th>
                                              <td><?php echo $que; ?></td>
                                              <td><?php echo $set; ?></td>
                                              <td><?php echo $set_answer; ?></td>
                                            </tr>
                                                    <?php
                                                }
                                                }
                                                else
                                                {
                                                   echo "<script>window.open('result?e=','_self');</script> ";
                                                }
                                                }
                                                else
                                                {
                                                     echo "<script>window.open('result?e=','_self');</script> ";
                                                  }
                                               
                                            ?>

                                            <tr>
                                                <td colspan="4"><center>  <button  href="result" class="btn btn-danger" name="submit" type="submit" data-bs-toggle="modal" data-bs-target="#topper"
                                                    style="border-radius: 0px;background-color: #f02e2e"
                                                    onmouseover="this.style.color='#f9f015';"
                                                    onmouseout="this.style.color='white' ">प्रतियोगिता के विजेता देखणे के लिये यहा क्लिक करे</button></center>
                                                </td>
                                            </tr>

                                         
                                         
                                        
                                          </tbody>
                                        </table>
                                                                                </div>
                                                                         
                                                                           <!--  <div class="card-body">
                                       <?php 
                                        // echo $result;
                                        // echo $exam_name ;
                                        // echo $exam_sp_name ;
                                        // echo $exam_host_date;

                                       ?>
                                    </div> -->
                                    <div class="modal fade" id="topper" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-bs-backdrop="static">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><STRONG>प्रतियोगिता के विजेता </STRONG></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">क्रमांक</th>
      <th scope="col">विजेता का नाम </th>
      <th scope="col">स्कोर</th>
      <th scope="col">Mobile</th>
     
    </tr>
  </thead>
  <tbody>
    <?php
        $count_a = 0;
         $ida = base64_decode($_GET['examid']);
        if ($sql = mysqli_query($con,"SELECT * FROM win WHERE exam_id='$ida' ORDER BY result DESC LIMIT 0,5 ")) {
           if (mysqli_num_rows($sql) > 0) {
             while ($row_top = mysqli_fetch_assoc($sql)) {
                $count_a++;
                ?>
                  <tr>
                    <td><?php echo $count_a; ?></td>
                  <th scope="row"><?php echo $row_top['name'];  ?></th>
                 
                   <th scope="row"><?php echo $row_top['result'];  ?></th>
                    <th scope="row"><?php echo $row_top['mobile'];  ?></th>
                </tr>
             <?php
         }
           }
           else
           {
            echo "<th colspan='4'>अभी तक कोही विजेता को घोषित नही किया है ! </th>";
           }
        }
    ?>
  

  
  </tbody>
</table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">बंद करे </button>
       
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