<?php
    error_reporting(E_ALL ^ E_NOTICE);
    ini_set('display_errors', 1);

    session_start();

    if(isset($_POST['signup']))
    {
        //performing verfication
        $upass = $_POST['upass'];
        $pass2 = $_POST['pass2'];

        if ($upass == $pass2){

                 // Create connection
                $servername = "localhost";
                $username = "root";
                $password = "root";
                $dbname = "timewise";
                $conn = new mysqli($localhost, $username, $password, $dbname);
                // Check connection
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                } 

                $fullName = mysqli_escape_string($conn, $_POST['fullName']);
                $tphon = mysqli_escape_string($conn, $_POST['telephone']);
                $email = mysqli_escape_string($conn, $_POST['email']);
                /*$role = mysqli_escape_string($conn, $_POST['role']);*/
                $upass = mysqli_escape_string($conn, $upass);
                $pass2 = mysqli_escape_string($conn, $pass2);

                $upass = md5($upass);


                // email exist or not
                $query = "SELECT email FROM users WHERE email='$email'";
                $result = mysqli_query($conn, $query);
                
                $count = mysqli_num_rows($result); // if email not found then register


                if($count > 1){
                    $err = "Sorry Email ID already taken.";
                    //header('location: register.php');
                    /*exit();*/
                } else {

                $sql = "INSERT INTO users (fullname, telephone, email, role, pass)
                    VALUES ('$fullName', '$tphon', '$email', 'N', '$upass')";


                if (mysqli_query($conn, $sql)) {
                    echo "New record created successfully";
                    header('location: login.php');
                } else {
                    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                }

                mysqli_close($conn);

            }
        }
     }   
?>


<!DOCTYPE html>
<html>
    <head>
        
        <!-- Title -->
        <title>Timewise | Register</title>
        
        <meta content="width=device-width, initial-scale=1" name="viewport"/>
        <meta charset="UTF-8">
        <meta name="description" content="Admin Dashboard Template" />
        <meta name="keywords" content="admin,dashboard" />
        <meta name="author" content="Steelcoders" />
        
        <!-- Styles -->
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600' rel='stylesheet' type='text/css'>
        <link href="assets/plugins/pace-master/themes/blue/pace-theme-flash.css" rel="stylesheet"/>
        <link href="assets/plugins/uniform/css/uniform.default.min.css" rel="stylesheet"/>
        <link href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="assets/plugins/fontawesome/css/font-awesome.css" rel="stylesheet" type="text/css"/>
        <link href="assets/plugins/line-icons/simple-line-icons.css" rel="stylesheet" type="text/css"/> 
        <link href="assets/plugins/offcanvasmenueffects/css/menu_cornerbox.css" rel="stylesheet" type="text/css"/>  
        <link href="assets/plugins/waves/waves.min.css" rel="stylesheet" type="text/css"/>  
        <link href="assets/plugins/switchery/switchery.min.css" rel="stylesheet" type="text/css"/>
        <link href="assets/plugins/3d-bold-navigation/css/style.css" rel="stylesheet" type="text/css"/> 
        <link href="assets/plugins/slidepushmenus/css/component.css" rel="stylesheet" type="text/css"/>
        <link href="assets/plugins/bootstrap-datepicker/css/datepicker3.css" rel="stylesheet" type="text/css"/>
        
        <!-- Theme Styles -->
        <link href="assets/css/modern.min.css" rel="stylesheet" type="text/css"/>
        <link href="assets/css/themes/white.css" class="theme-color" rel="stylesheet" type="text/css"/>
        <link href="assets/css/custom.css" rel="stylesheet" type="text/css"/>
        
        <script src="assets/plugins/3d-bold-navigation/js/modernizr.js"></script>
        <script src="assets/plugins/offcanvasmenueffects/js/snap.svg-min.js"></script>
        
        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
        
    </head>
    <body class="page-header-fixed">
        <div class="overlay"></div>
        <nav class="cbp-spmenu cbp-spmenu-vertical cbp-spmenu-right" id="cbp-spmenu-s1">
            <h3><span class="pull-left">Chat</span><a href="javascript:void(0);" class="pull-right" id="closeRight"><i class="fa fa-times"></i></a></h3>
            <div class="slimscroll">
                <a href="javascript:void(0);" class="showRight2"><img src="assets/images/avatar2.png" alt=""><span>Sandra smith<small>Hi! How're you?</small></span></a>
                <a href="javascript:void(0);" class="showRight2"><img src="assets/images/avatar3.png" alt=""><span>Amily Lee<small>Hi! How're you?</small></span></a>
                <a href="javascript:void(0);" class="showRight2"><img src="assets/images/avatar4.png" alt=""><span>Christopher Palmer<small>Hi! How're you?</small></span></a>
                <a href="javascript:void(0);" class="showRight2"><img src="assets/images/avatar5.png" alt=""><span>Nick Doe<small>Hi! How're you?</small></span></a>
                <a href="javascript:void(0);" class="showRight2"><img src="assets/images/avatar2.png" alt=""><span>Sandra smith<small>Hi! How're you?</small></span></a>
                <a href="javascript:void(0);" class="showRight2"><img src="assets/images/avatar3.png" alt=""><span>Amily Lee<small>Hi! How're you?</small></span></a>
                <a href="javascript:void(0);" class="showRight2"><img src="assets/images/avatar4.png" alt=""><span>Christopher Palmer<small>Hi! How're you?</small></span></a>
                <a href="javascript:void(0);" class="showRight2"><img src="assets/images/avatar5.png" alt=""><span>Nick Doe<small>Hi! How're you?</small></span></a>
            </div>
        </nav>
        <nav class="cbp-spmenu cbp-spmenu-vertical cbp-spmenu-right" id="cbp-spmenu-s2">
            <h3><span class="pull-left">Sandra Smith</span> <a href="javascript:void(0);" class="pull-right" id="closeRight2"><i class="fa fa-angle-right"></i></a></h3>
            
            <div class="chat-write">
                <form class="form-horizontal" action="javascript:void(0);">
                    <input type="text" class="form-control" placeholder="Say something">
                </form>
            </div>
        </nav>
        <div class="menu-wrap">
            <nav class="profile-menu">
                <div class="profile"><img src="assets/images/avatar1.png" width="52" alt="David Green"/><span>David Green</span></div>
                <div class="profile-menu-list">
                    <a href="#"><i class="fa fa-star"></i><span>Favorites</span></a>
                    <a href="#"><i class="fa fa-bell"></i><span>Alerts</span></a>
                    <a href="#"><i class="fa fa-envelope"></i><span>Messages</span></a>
                    <a href="#"><i class="fa fa-comment"></i><span>Comments</span></a>
                </div>
            </nav>
            <button class="close-button" id="close-button">Close Menu</button>
        </div>
        <form class="search-form" action="#" method="GET">
            <div class="input-group">
                <input type="text" name="search" class="form-control search-input" placeholder="Search...">
                <span class="input-group-btn">
                    <button class="btn btn-default close-search waves-effect waves-button waves-classic" type="button"><i class="fa fa-times"></i></button>
                </span>
            </div><!-- Input Group -->
        </form><!-- Search Form -->
        <main class="page-content content-wrap">
           
           <!--form here-->
            <div class="page-inner">
                
                <div id="main-wrapper">
                    <div class="row">
                                    <div id="formHolder">
                                        <form id="wizardForm" action="register.php" method="POST">
                                                    <div class="row m-b-lg">
                                                            <div class="col-md-4 center">
                                                                <div class="login-box">
                                                                <a href="register.php" class="logo-name text-lg text-center">Timewise</a>
                                                                <p class="text-center m-t-md">Enter the following Details to Register</p>
                                                                </div>
                                                                <div class="form-group col-md-12">
                                                                    <label for="exampleInputName">Full Name</label>
                                                                    <input type="text" class="form-control" name="fullName" id="exampleInputName" placeholder="Full Name">
                                                                </div>
                                                                <div class="form-group  col-md-12">
                                                                    <label for="telephone">Telephone</label>
                                                                    <input type="text" class="form-control" name="telephone" id="telephone" placeholder="Telephone" >
                                                                </div>
                                                                <div class="form-group col-md-12">
                                                                    <label for="exampleInputEmail">Email Address</label>
                                                                    <input type="email" class="form-control" name="email" id="exampleInputEmail" placeholder="Enter email" >
                                                                </div>
                                                                
                                                                <div class="form-group col-md-12">
                                                                    <label for="exampleInputPassword1">Password</label>
                                                                    <input type="password" class="form-control" name="upass" id="exampleInputPassword1" placeholder="Password" >
                                                                </div>
                                                                <div class="form-group col-md-12">
                                                                    <label for="exampleInputPassword2">Confirm Password</label>
                                                                    <input type="password" class="form-control" name="pass2" id="exampleInputPassword2" placeholder="Confirm Password">
                                                                </div>
                                                                <div class="form-group col-md-12">
                                                                    <input type="submit"  name="signup" value="Submit" class="btn btn-success btn-block">
                                                                </div>      
                                                                 <div class="form-group col-md-12">
                                                                    <?php echo $err; ?>
                                                                </div>                                                              

                                                                <p class="no-s text-center">2015 &copy; Timewise Errand Services</p>
                                                            </div>
                                                    </div>
                                        </form>

                                    </div>
                    </div><!-- Row -->
                </div><!-- Main Wrapper -->
                
            </div><!-- Page Inner -->
        </main><!-- Page Content -->
        
        <div class="cd-overlay"></div>
    

        <!-- Javascripts -->
        <script src="assets/plugins/jquery/jquery-2.1.3.min.js"></script>
        <script src="assets/plugins/jquery-ui/jquery-ui.min.js"></script>
        <script src="assets/plugins/pace-master/pace.min.js"></script>
        <script src="assets/plugins/jquery-blockui/jquery.blockui.js"></script>
        <script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>
        <script src="assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js"></script>
        <script src="assets/plugins/switchery/switchery.min.js"></script>
        <script src="assets/plugins/uniform/jquery.uniform.min.js"></script>
        <script src="assets/plugins/offcanvasmenueffects/js/classie.js"></script>
        <script src="assets/plugins/offcanvasmenueffects/js/main.js"></script>
        <script src="assets/plugins/waves/waves.min.js"></script>
        <script src="assets/plugins/3d-bold-navigation/js/main.js"></script>
        <script src="assets/plugins/twitter-bootstrap-wizard/jquery.bootstrap.wizard.min.js"></script>
        <script src="assets/plugins/jquery-validation/jquery.validate.min.js"></script>
        <script src="assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
        <script src="assets/js/modern.min.js"></script>
        <script src="assets/js/pages/form-wizard.js"></script>
        
    </body>
  
</html>