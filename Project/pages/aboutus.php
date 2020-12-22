<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Outlet - About Us</title>
    
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

</head>

<body>

     
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
            
            <!-- /.navbar-header -->
            <ul class="nav navbar-top-links navbar-right">
                
             <?php
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
            </ul>
            <!-- /.navbar-top-links -->

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

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header" style = "padding-top: 40px ">About Us</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            About Outlet
                        </div>
                        <!-- .panel-heading -->
                        <div class="panel-body">
                            Outlet is a multi-purpose website providing users a platform to share, earn, help, save, and give while enjoying the great features presented by the website. 
                            <br>Outlet provides a wide variety of contents ranging from lawn mowing services to free t-shirt giveaways.
                            <br>
                            <br>Our Slogan: "We don't charge, we provide!"
                                
                        </div><!-- .panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-4">
                    <div class="panel panel-success">
                        <div class="panel-heading">
                            Irpan Abdaurahman
                        </div>
                        <div class="panel-body">
                            <p>Irpan Abdaurahman is a senior at Farragut High School. He enjoys playing soccer with his friends and sleeping in free times.</p>
                        </div>
                    </div>
                </div>
                <!-- /.col-lg-4 -->
                <div class="col-lg-4">
                    <div class="panel panel-warning">
                        <div class="panel-heading">
                            Marlin Ford 
                        </div>
                        <div class="panel-body">
                            <p>Hey I'm Marlin a senior at Farragut Highschool. I'm planning on going to TN Tech </p>
                        </div>
                    </div>
                </div>
                <!-- /.col-lg-4 -->
                <div class="col-lg-4">
                    <div class="panel panel-danger">
                        <div class="panel-heading">
                            John Murtha
                        </div>
                        <div class="panel-body">
                            <p>John Murtha is a senior at Farragut High School. He is planning on attending Tennessee Tech University in the fall to continue his study in computer science.</p>
                        </div>
                    </div>
                </div>
                <!-- /.col-lg-4 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-4">
                    <div class="panel panel-success">
                        <div class="panel-heading">
                            Eugene Lee
                        </div>
                        <div class="panel-body">
                            <p>Eugene is a junior attending Farragut High School and he is a part of this team. Eugene is interested in computer science and hopefully plans to continue in this field. In the future, Eugene plans on studying IT and having a career in the tech industry.</p>
                        </div>
                    </div>
                </div>
                <!-- /.col-lg-4 -->
                <div class="col-lg-4">
                    <div class="panel panel-warning">
                        <div class="panel-heading">
                            Michael Phillips
                        </div>
                        <div class="panel-body">
                            <p> Michael is a senior at Farragut High School. He wants to go to Pellissippi community college next year, and eventually contineducation at the University of TN.</p>
                        </div>
                    </div>
                </div>
                <!-- /.col-lg-4 -->
                <div class="col-lg-4">
                    <div class="panel panel-danger">
                        <div class="panel-heading">
                            Zhengyang Yu
                        </div>
                        <div class="panel-body">
                            <p>I'm Zhengyang Yu, I am in Farragut High School. I am a freshman and I'm 14 years old.</p>
                        </div>
                    </div>
                </div>
                <!-- /.col-lg-4 -->
            </div>
            <!-- /.row -->
            
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            Contact Us
                        </div>
                        <!-- .panel-heading -->
                        <div class="panel-body">
                            Please contact us at <a href="mailto:farragutqros@gmail.com??&subject=Contact&body=Please enter your message:">Farragut Qros</a>(farragutqros@gmail.com).
                                
                        </div><!-- .panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>  
            
            <div class="row">
                <div class="col-lg-4">
                    <div class="panel panel-green">
                        <div class="panel-heading"></div>
                    </div>
                    <!-- /.col-lg-4 -->
                </div>
                <div class="col-lg-4">
                    <div class="panel panel-yellow">
                        <div class="panel-heading"></div>
                    </div>
                    <!-- /.col-lg-4 -->
                </div>
                <div class="col-lg-4">
                    <div class="panel panel-red">
                        <div class="panel-heading"></div>
                    </div>
                    <!-- /.col-lg-4 -->
               </div>
            </div>
            
            <div class="row">
                <div class="col-lg-12">
                     <div class="panel panel-default">
                        <div class="panel-heading">
                            Our Location
                        </div>
                        <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3232.425205945637!2d-84.1622455!3d35.8876004!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x885c2ee99837ffab%3A0x7924dacb7e9c95b2!2sFarragut+High+School!5e0!3m2!1sen!2sus!4v1553716536917" style ="width:100%; height:400px" frameborder="0" style="border:4" allowfullscreen></iframe><script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY&callback=myMap"></script>
                    </div>
                </div>
            </div>
            
            
         
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="../vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../vendor/metisMenu/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>

    <script type="text/javascript">
        var scale = Math.min
        (   availableWidth / contentWidth, 
            availableHeight / contentHeight );
    </script>
</body>