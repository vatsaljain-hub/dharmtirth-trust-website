 
 <aside id="leftsidebar" class="sidebar">
            <!-- User Info -->
            <div class="user-info">
                <div class="image">
                    <?php
                    include 'config.php';
                                    $user = $_SESSION['username'];
                                    $sql = "SELECT * FROM admin WHERE username = '$user'";
                                    $query = mysqli_query($con,$sql);
                                    if (mysqli_num_rows($query) > 0) {
                                        while ($row = mysqli_fetch_assoc($query))
                                         {
                                            # code...
                                        ?>

                    <img src="adminpic/<?php echo $row['profile'] ;?>" width="48" height="48" alt="User" />
                     
                </div>
                <div class="info-container">
                    <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo $_SESSION['username']; ?></div>
                    <div class="email"><?php  echo $row['email']; ?></div>
                     <?php }
                                };

                                ?>
                    <div class="btn-group user-helper-dropdown">
                        <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
                        <ul class="dropdown-menu pull-right">
                            <li><a href="profile"><i class="material-icons">person</i>Profile</a></li>
                            <li role="separator" class="divider"></li>
                            <?php
                                $user = $_SESSION['username'];
                                $encode = base64_encode($user);
                            ?>
                   
                            <li>
                                <a href="lock?ac=<?php echo$encode ;?>"><i class="material-icons">lock</i>Lock Account</a></li>
                   
                          
                            <li role="separator" class="divider"></li>
                            <li><a href="logout"><i class="material-icons">input</i>Sign Out</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- #User Info -->
            <!-- Menu -->
            <div class="menu">
                <ul class="list">
                    <li class="header">MAIN NAVIGATION</li>
                    <?php
                    error_reporting(0);
                        $getmenuname = $_GET['menu'];
                        if ($getmenuname=="home") {
                            $setactivemenu = 'class="active"';
                            
                        }
                    ?>
                    <li <?php echo $setactivemenu; ?>>
                        <a href="dashboard?menu=home">
                            <i class="material-icons">home</i>
                            <span>Home</span>
                        </a>
                    </li>
                      <li>
                        <a href="comp">
                            <i class="material-icons">filter_vintage</i>
                            <span>प्रतियोगिता</span>
                        </a>
                    </li>
                    <?php
                    error_reporting(0);
                        $getmenuname = $_GET['menu'];
                        if ($getmenuname=="mailbox") {
                            $setactive = 'class="active"';
                            $removeactive = '';
                        }
                    ?>
                    <li <?php echo $setactive; ?>>
                        <a href="mailbox?menu=mailbox">

                           <i class="material-icons">email</i>
                            <span>Mailbox</span>
                        </a>
                    </li>
                    <?php
                    error_reporting(0);
                        $getmenuname = $_GET['menu'];
                        if ($getmenuname=="pay" ) {
                            $setactivepdfxx = 'class="active"';
                           
                        }
                    ?>

                     <li <?php echo $setactivepdfxx; ?>>
                        
                        <a href="payment?menu=pay">
                          <i class="material-icons">payment</i>
                            <span>Donate History</span>
                        </a>
                    </li>
                     <?php
                    error_reporting(0);
                        $getmenuname = $_GET['menu'];
                        if ($getmenuname=="pdf" || $getmenuname == "all") {
                            $setactivepdf = 'class="active"';
                           
                        }
                    ?>
                     <li <?php echo $setactivepdf; ?>>
                        
                        <a href="pdf?menu=pdf">
                          <i class="material-icons">picture_as_pdf</i>
                            <span>Upload PDF</span>
                        </a>
                    </li>
                     <?php
                    error_reporting(0);
                        $getmenuname = $_GET['menu'];
                        if ($getmenuname=="sp") {
                            $a = 'class="active"';
                           
                        }
                    ?>
                    <?php
                    error_reporting(0);
                        $getmenuname = $_GET['menu'];
                        if ($getmenuname=="guru" ) {
                            $guru = 'class="active"';
                           
                        }
                    ?>
                    <li <?php echo $guru ?>>
                       
                        <a href="edit?menu=guru">
                          <i class="material-icons">info</i>
                            <span>Guru Manage</span>
                        </a>
                    </li>
                      <?php
                    error_reporting(0);
                        $getmenuname = $_GET['menu'];
                        if ($getmenuname=="trust" ) {
                            $trust = 'class="active"';
                           
                        }
                    ?>
                    <li <?php echo $trust ?>>
                       
                        <a href="trust?menu=trust">
                          <i class="material-icons">assignment_ind</i>
                            <span>Trustee Manage</span>
                        </a>
                    </li>
                      <?php
                    error_reporting(0);
                        $getmenuname = $_GET['menu'];
                        if ($getmenuname=="upa" ) {
                            $truxst = 'class="active"';
                           
                        }
                    ?>
                     <li <?php echo $truxst ?>>
                       
                        <a href="do?menu=upa">
                          <i class="material-icons">assignment_ind</i>
                            <span>Doners Manage</span>
                        </a>
                    </li>

                    <li <?php echo $a ?>>
                       
                        <a href="sponsor?menu=sp">
                          <i class="material-icons">group</i>
                            <span>Sponsor</span>
                        </a>
                    </li>
                     <?php
                    error_reporting(0);
                        $getmenuname = $_GET['menu'];
                        if ($getmenuname=="pro") {
                            $setactivepmediamenu = 'class="active"';
                           
                        }
                        else if ($getmenuname == "gallery") {
                            $setactivepmediagallery ='class="active"'; 
                        }
                        else if($getmenuname == "vid")
                        {
                            $getv = 'class="active"';
                        }
                        else if($getmenuname == "loc")
                        {
                            $getl = 'class="active"';
                        }
                        else if($getmenuname == "up")
                        {
                            $get_up ='class="active"';
                        }
                        else
                        {
                            $remov_active = '';
                        }
                        
                    ?>

                     <li <?php echo $setactivepmediamenu,$setactivepmediagallery,$getv,$getl,$get_up,$remov_active ?>>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">perm_media</i>
                            <span>Medias</span>
                        </a>
                        <ul class="ml-menu">
                            <li <?php echo $setactivepmediamenu; ?>>
                                <a href="program?menu=pro"> Recent Programms</a>
                            </li>
                            <li <?php echo $setactivepmediagallery; ?>>
                                <a href="gallery?menu=gallery">Gallery</a>
                            </li>
                            <li <?php echo $getv; ?>>
                                <a href="video?menu=vid">Video</a>
                            </li>
                             <li <?php echo $getl; ?>>
                                <a href="location?menu=loc">Location</a>
                            </li>

                             <li <?php echo $get_up; ?>>
                                <a href="upcoming?menu=up">Upcoming Events</a>
                            </li>
                        </ul>
                    </li>
                    
             
                   
                </ul>
            </div>
            <!-- #Menu -->
            <!-- Footer -->
            <div class="legal">
                <div class="copyright">
                    &copy; 2021 - 2022 <a href="javascript:void(0);">Admin Panel - Dharam Tirth </a>.
                </div>
                <div class="version">
                    <b>Version: </b> 1.0.5
                </div>
            </div>
            <!-- #Footer -->
        </aside>