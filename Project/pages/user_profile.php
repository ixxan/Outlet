<?php 
    //session_start();
    include('../pages/UserUploads/upload_function.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Outlet - User Profile</title>
    
    <!-- Tab Logo -->
    <link href="../pages/images/tab_logo.png" rel="shortcut icon">
    
    <!-- Bootstrap Core CSS -->
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
     <link rel="stylesheet" type="text/css" href="/Project/pages/CSS/items_style.css"/>
    

</head>
<body>
</body>    
</html>

<main>
    <div id="wrapper" style = "padding-top: 40px" >
        
        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-fixed-top" role="navigation" style="margin-bottom: 0 ">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                
                <!--Logo-->
                <a href="home.php">
                    <img src="images/outlet.png" width="180" height="54">
                </a>
            </div>
                
             <?php
             session_start();
            //if logged in
            if(isset($_SESSION['userId']))
            {
                echo"
                
                <ul class='nav navbar-top-links navbar-right'>
                    <li class='dropdown'>
                        <a class='dropdown-toggle' data-toggle='dropdown' href='#'>
                            <i class='fa fa-user fa-fw'></i> <i class='fa fa-caret-down'></i>
                        </a>
                        
                       <ul class='dropdown-menu'>
                            <li>
                                <p style='text-align:center; color:#337ab7'>Welcome, ".$_SESSION['userUsername']."</p>
                            </li>
                            <li>
                                <a href='/Project/pages/user_profile.php'><i class='fa fa-user fa-fw'></i> User Profile</a>
                            </li>
                            <li>
                                
                            </li>
                        
                            <li class='divider'></li>
                        
                            <li>
                                <a href='/Project/pages/UserSystemIncludes/logout.inc.php' method='post'><i class='fa fa-sign-out fa-fw'></i> Logout</a>
                            </li>
                        
                        </ul>
                    </li>
                </ul>";
                    
            }
                //if not logged in
            else 
            {
                echo"
                <ul class='nav navbar-top-links navbar-right'>
                    <li class='dropdown'>
                        <a class='dropdown-toggle' data-toggle='dropdown' href='#'>
                            <i class='fa fa-user fa-fw'></i> <i class='fa fa-caret-down'></i>
                        </a>
                        <ul class='dropdown-menu'>
                            <li>
                                <a href='login.php'><i class='fa fa-sign-in fa-fw'></i> Login</a>
                            </li>
                            <li>
                                <a href='signup.php'><i class='fa fa-plus fa-fw'></i> Sign Up</a>
                            </li> 
                        </ul>
                    </li>
                </ul>";
            }
            ?>          

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li class="sidebar-search">
                            <form action="/Project/pages/search_result.php" method="GET" name="searchForm">
                                <div class="input-group custom-search-form">
                                    <input type="text" class="form-control" name="input" placeholder="Search...">
                                        <span class="input-group-btn">
                                            <button class="btn btn-default" type="submit">
                                                <i class="fa fa-search"></i>
                                            </button>
                                        </span>
                                </div>
                            </form>
                            <!-- /input-group -->
                        </li>
                        <li>
                            <a href="home.php"><i class="fa fa-home fa-fw"></i> Home</a>
                        </li>
                        <li>
                            <a href="postitems.php"><i class="fa fa-edit fa-fw"></i> Post Items</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-th-large fa-fw"></i> Categories<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="products.php"><i class="fa fa-lightbulb-o fa-fw"></i> Products </a>
                                </li>
                                <li>
                                    <a href="services.php"><i class="fa fa-wrench fa-fw"></i> Services </a>
                                </li>
                                <li>
                                    <a href="coupons.php"><i class="fa fa-ticket fa-fw"></i> Coupons </a>
                                </li>
                                <li>
                                    <a href="giveaways.php"><i class="fa fa-gift fa-fw"></i> Giveaways </a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        
                        <li>
                            <a href="aboutus.php"><i class="fa fa-group fa-fw"></i> About Us</a>
                        </li>
                        <li>
                            <a href="faq.php"><i class="fa fa-question fa-fw"></i> FAQ</a>
                        </li>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>
    
        <!--Page Content -->
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header"  style = "padding-top: 40px ">User Profile</h1>
                </div>
            </div>
            <!-- /.row -->
            <div class="row">
            
            <?php
             session_start();
            //if logged in
            if(isset($_SESSION['userId']))
            {
             echo"                
                                <div class='col-lg-8'>
                    <div class='panel panel-default'>
                        <div class='panel-heading'>
                            <h4>Welcome, ".$_SESSION['userUsername']."</h4>
                        </div>
                        <!-- /.panel-heading -->
                        <div class='panel-body'>
                            <!-- Nav tabs -->
                            <ul class='nav nav-pills'>
                                <li class='active'>
                                    <a href='#posts-pills' data-toggle='tab' style = 'padding-left: 5px; padding-right:5px'>My Posts</a>
                                </li>
                                <li style = ' margin-left: 3px' >
                                    <a href='#change-password-pills' data-toggle='tab' style = 'padding-left: 5px; padding-right:5px'>Change Password</a>
                                </li>
                            </ul>

                            <!-- Tab panes -->
                            <div class='tab-content'>

                                <div class='tab-pane fade in active' id='posts-pills'>
                                    <div class='panel-body' style = 'max-width: 100%; height: auto;'>
                                       
                                            
                                            <!-- Nav tabs -->
                                            <ul class='nav nav-pills'>
                                            <li class='active'>
                                                <a href='#product-pills' data-toggle='tab' title='Your Products' style='background-color:#FFFFFF;color:#000000;text-decoration:none'>
                                                <button type='button' class='btn btn-default btn-circle '><i class='fa fa-lightbulb-o'></i></button>
                                                </a>
                                            </li>
                                            <li style = ' margin-left: 2px' >
                                                <a href='#service-pills' data-toggle='tab' title='Your Services' style='background-color:#FFFFFF;color:#000000;text-decoration:none'>
                                                <button type='button' class='btn btn-default btn-circle '><i class='fa fa-wrench'></i></button>
                                                </a>
                                            </li>
                                            <li style = ' margin-left: 2px' >
                                                <a href='#coupon-pills' data-toggle='tab' title='Your Coupons' style='background-color:#FFFFFF;color:#000000;text-decoration:none'>
                                                <button type='button' class='btn btn-default btn-circle '><i class='fa fa-ticket'></i></button>
                                                </a>
                                            </li>
                                            <li style = ' margin-left: 2px' >
                                                <a href='#giveaway-pills' data-toggle='tab' title='Your Giveaways' style='background-color:#FFFFFF;color:#000000;text-decoration:none'>
                                                <button type='button' class='btn btn-default btn-circle '><i class='fa fa-gift'></i></button>
                                                </a>
                                            </li>
                                         </ul>
                                                       

                                                    <!-- Tab content -->
                                                    <div class='tab-content'>
                                
                                                        <!-- Products -->
                                                        <div class='tab-pane fade in active' id='product-pills'>
                                                            <div class='panel-body' style = 'max-width: 100%; height: auto;'>
                                                                 <div class='row'>
                                                                     <div class='col-lg-8'>";?>
                                                                        <?php getMyProduct();
                                                                        echo"
                                                                    </div> <!-- /.col-lg-8 -->
                                                                </div> <!-- /.row -->
                                                            </div> <!-- /.panel-body -->
                                                        </div>  <!-- /.tab-pane -->
                                
                                                        <!-- Services -->
                                                         <div class='tab-pane fade in active' id='service-pills'>
                                                             <div class='panel-body' style = 'max-width: 100%; height: auto;'>
                                                                 <div class='row'>
                                                                     <div class='col-lg-8'>";?>
                                                                        <?php getMyService();
                                                                        echo"
                                                                    </div> <!-- /.col-lg-8 -->
                                                                </div> <!-- /.row -->
                                                            </div> <!-- /.panel-body -->
                                                        </div>  <!-- /.tab-pane -->

                                                        <!-- Coupons -->
                                                         <div class='tab-pane fade in active' id='coupon-pills'>
                                                             <div class='panel-body' style = 'max-width: 100%; height: auto;'>
                                                                 <div class='row'>
                                                                     <div class='col-lg-8'>";?>
                                                                        <?php getMyCoupon();
                                                                        echo"
                                                                    </div> <!-- /.col-lg-8 -->
                                                                </div> <!-- /.row -->
                                                            </div> <!-- /.panel-body -->
                                                        </div>  <!-- /.tab-pane -->

                                                        <!-- Giveaways -->
                                                         <div class='tab-pane fade in active' id='giveaway-pills'>
                                                             <div class='panel-body' style = 'max-width: 100%; height: auto;'>
                                                                 <div class='row'>
                                                                     <div class='col-lg-8'>";?>
                                                                        <?php getMyGiveaway();
                                                                        echo"
                                                                    </div> <!-- /.col-lg-8 -->
                                                                </div> <!-- /.row -->
                                                            </div> <!-- /.panel-body -->
                                                        </div>  <!-- /.tab-pane -->
                                                
                                                    </div><!-- Tab content -->    
                   
                                        
                                </div>
                            </div>  <!-- /.tab-pane fade in active -->

                                
                                <!-- change-password Form -->
                                <div class='tab-pane fade' id='change-password-pills'>
                                    <div class='panel-body' style = 'max-width: 100%; height: auto;'>
                                        <div class='row'>
                                            <div class='col-lg-8'>
                                            
                                               <form action='/Project/pages/UserSystemIncludes/changepassword.inc.php' method='post' enctype='multipart/form-data'>
                                                <div class='form-group'>
                                                    <label>Email</label>
                                                    <input class='form-control' type='text' name='email' placeholder='Enter your Email' required>
                                                </div>
                                                <div class='form-group'>
                                                    <label>Old Password</label>
                                                    <input class='form-control' type='password' name='old-password' placeholder='Enter your Old Password' required>
                                                </div>
                                        
                                                <div class='form-group'>
                                                    <label>New Password</label>
                                                    <input class='form-control' type='password' name='new-password' placeholder='Enter your New Password' required>
                                                </div>
                                                
                                                <div class='form-group'>
                                                    <label>Repeat New Password</label>
                                                    <input class='form-control' type='password' name='repeat-new-password' placeholder='Repeat your New Password' required>
                                                </div>
                                        
                                                <button type='submit' name='reset-password-button' class='btn btn-primary'>Submit</button>
                                                <button type='reset' class='btn btn-default'>Reset</button>
                                                </form>
                                            </div> <!-- /.col-lg-8 -->
                                        </div> <!-- /.row -->
                                    </div> <!-- /.panel-body -->
                                </div>  <!-- /.tab-pane -->
                            </div><!-- /.tab-content -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-8 -->";        
            }
            else
            {
                echo"   <!-- Login Form -->
                <div class='col-lg-8'>
                    <div class='panel panel-default'>
                        <div class='panel-heading'>
                            <h4>Login</h4>
                        </div>
                        <!-- /.panel-heading -->
                        <div class='panel-body'>

                            <!-- Tab panes -->
                            <div class='tab-content'>
                                
                                <!-- posts Form -->
                                <div class='tab-pane fade in active' id='posts-pills'>
                                    <div class='panel-body' style = 'max-width: 100%; height: auto;'>
                                        <div class='row'>
                                            <div class='col-lg-8'>
                                               <form action='/Project/pages/UserSystemIncludes/login.inc.php' method='post'>
                                                   <?php getLoginError(); ?>
                                                <div class='form-group'>
                                                    <label>Username/Email</label>
                                                    <input class='form-control' type='text' name='emailusername' placeholder='Username/Email' required>
                                                </div>

                                                <div class='form-group'>
                                                    <label>Password</label>
                                                    <input class='form-control' type='password' name='password' placeholder='Password' required>
                                                </div>
                                                
                                                <button type='submit' name='login-button' class='btn btn-primary'> Login </button>
                                                </form>
                                                <p></P>
                                                <p type='text'> Forgot your password? <a href='resetpassword.php' type='link'>Reset</a></p>
                                                <p type='text'> Not yet a user? <a href='signup.php' type='link'>Sign Up</a></p>
                                            </div> <!-- /.col-lg-8 -->  
                                        </div> <!-- /.row -->
                                    </div> <!-- /.panel-body -->
                                </div>  <!-- /.tab-pane -->
                            </div>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-8 -->


                    ";
            }
            
            ?>
            </div> <!-- /.row -->
            
        </div> <!-- /#page-wrapper -->
        
    </div> <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="../vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../vendor/metisMenu/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>
</main>    