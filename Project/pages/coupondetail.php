<?php 
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

    <title>Outlet - Coupons</title>
    
    <!-- Tab Logo -->
    <link href="../pages/images/tab_logo.png" rel="shortcut icon">
    
    <!-- Bootstrap Core CSS -->
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- DataTables CSS -->
    <link href="../vendor/datatables-plugins/dataTables.bootstrap.css" rel="stylesheet">

    <!-- DataTables Responsive CSS -->
    <link href="../vendor/datatables-responsive/dataTables.responsive.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    
    <link rel="stylesheet" type="text/css" href="/Project/pages/CSS/items_style.css"/>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

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
                    <h1 class="page-header" style = "padding-top: 40px ">Coupons</h1>
                </div>
                
                <?php
                if(isset($_GET["couponId"]))
                {
                    $couponId = $_GET["couponId"];
                    $getCoupon = "SELECT * FROM couponList WHERE id ='$couponId'";
        
                    $runCoupon = mysqli_query($conn, $getCoupon) or die('Error');
        
                    while($rowCoupon = mysqli_fetch_array($runCoupon))
                    {
                        $couponId = $rowCoupon['id'];
                        $couponName = $rowCoupon['name'];
                        $couponDescription = $rowCoupon['description'];
                        $couponCategory = $rowCoupon['category'];
                        $couponObtainMethod = $rowCoupon['obtainMethod'];
                        $couponExpirationDate = $rowCoupon['expirationDate'];
            
                        if(filter_var($couponObtainMethod, FILTER_VALIDATE_URL))
                        {
                            $couponLink = "<a href='$couponObtainMethod'><button type='button' class='btn btn-primary'>Get Coupon</button></a>";
                            
                            echo" 
                            <div id='single_coupon_detail'> 
                                
                                <p name='goback-button'>
                                    <button  onclick='history.back()'  type='button' class='btn btn-primary btn-circle '><i class='fa fa-arrow-left '></i></button>
                                </p>
                                <p name='report_button'><a href='report.php?couponId=$couponId'><button> Report </button></a></p>
                                <p name='coupon-name'>$couponName</p>
                                <div name='coupon-detail'>
                                    <div class= 'info_description'>
                                        <h4>Description:</h4>
                                        <p>$couponDescription</P> 
                                    </div>
                                    <div  class= 'info_others'>
                                        <div name='coupon-info-2'>
                                            <h4>Obtain Method:</h4>
                                            <p>$couponLink</P> 
                                        </div>
                                        <div name='coupon-info-2'>
                                            <h4>Expiration Date:</h4>
                                            <p>$couponExpirationDate</P> 
                                        </div>
                                    </div>
                                </div>
                            </div>
                            ";
                        }
                        else
                        {
                         echo" 
                            <div id='single_coupon_detail'> 
                                
                                <p name='goback-button'>
                                    <button  onclick='history.back()'  type='button' class='btn btn-primary btn-circle '><i class='fa fa-arrow-left '></i></button>
                                </p>
                                <p name='report_button'><a href='report.php?couponId=$couponId'><button> Report </button></a></p>
                                <p name='coupon-name'>$couponName</p>
                                <div name='coupon-detail'>
                                    <div class= 'info_description'>
                                        <h4>Description:</h4>
                                        <p>$couponDescription</P> 
                                    </div>
                                    <div  class= 'info_others'>
                                        <div name='coupon-info-2'>
                                            <h4>Obtain Method:</h4>
                                            <p>$couponObtainMethod</P> 
                                        </div>
                                        <div name='coupon-info-2'>
                                            <h4>Expiration Date:</h4>
                                            <p>$couponExpirationDate</P> 
                                        </div>
                                    </div>
                                </div>
                            </div>
                            ";   
                        }
                        
                    }
                }
                else
                {
                   echo"
                   <p style = 'padding-left: 20px'>Sorry, the item does not exist!</p>
                   <p style = 'padding-left: 20px' name='goback-button' >
                        <a href='/Project/pages/coupons.php'>
                            <i class='fa fa-arrow-left '></i> Go Back
                        </a>
                    </p>"; 
                }
             ?>   
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

</body>

</html>
