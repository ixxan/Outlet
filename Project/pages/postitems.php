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

    <title>Outlet - Post Items</title>
    
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
                    <h1 class="page-header"  style = "padding-top: 40px ">Post Items</h1>
                </div>
            </div>
            <!-- /.row -->
            <div class="row">
            
            <?php
             session_start();
            //if logged in
            if(isset($_SESSION['userId']))
            {
             echo"                <!-- Post Item Forms -->
                <div class='col-lg-8'>
                    <div class='panel panel-default'>
                        <div class='panel-heading'>
                            <h4>What would you like to post?</h4>
                        </div>
                        <!-- /.panel-heading -->
                        <div class='panel-body'>
                            <!-- Nav tabs -->
                            <ul class='nav nav-pills'>
                                <li class='active'>
                                    <a href='#product-pills' data-toggle='tab' style = 'padding-left: 5px; padding-right:5px'>Product</a>
                                </li>
                                <li style = ' margin-left: 3px' >
                                    <a href='#service-pills' data-toggle='tab' style = 'padding-left: 5px; padding-right:5px'>Service</a>
                                </li>
                                <li style = ' margin-left: 3px'>
                                    <a href='#coupon-pills' data-toggle='tab' style = 'padding-left: 5px; padding-right:5px'>Coupon</a>
                                </li>
                                <li style = ' margin-left: 3px'>
                                    <a href='#giveaway-pills' data-toggle='tab' style = 'padding-left: 5px; padding-right:5px'>Giveaway</a>
                                </li>
                            </ul>

                            <!-- Tab panes -->
                            <div class='tab-content'>
                                
                                <!-- Product Form -->
                                <div class='tab-pane fade in active' id='product-pills'>
                                    <div class='panel-body' style = 'max-width: 100%; height: auto;'>
                                        <div class='row'>
                                            <div class='col-lg-8'>
                                               <form action='/Project/pages/UserUploads/product_upload.php' method='post' enctype='multipart/form-data'>
                                                   <?php getProductFormErrorMessages(); ?>
                                                <div class='form-group'>
                                                    <label>Name</label>
                                                    <input class='form-control' type='text' name='product-name' placeholder='Enter Product Name (100 characters limit)' required maxlength='100'>
                                                </div>

                                                <div class='form-group'>
                                                    <label>Picture</label>
                                                    <input type='file' name='product-picture' accept='image/*' required>
                                                </div>
                                        
                                                <div class='form-group'>
                                                <label>Description</label>
                                                <textarea class='form-control' name='product-description' placeholder='Enter Product Description' rows='3' required></textarea>
                                                </div>
                                        
                                                <div class='form-group'>
                                                    <label>Category</label>
                                                    <select class='form-control' name='product-category'>
                                                        <option>Home & Office & Garden</option>
                                                        <option>Clothing & Shoes</option>
                                                        <option>Electronics</option>
                                                        <option>Entertainment</option>
                                                        <option>Sports & Outdoors</option>
                                                        <option>Kids</option>
                                                        <option>Others</option>
                                                    </select>
                                                </div>
                                        
                                                <div class='form-group'>
                                                    <label>Purchase Method</label>
                                                    <input class='form-control'  name='product-purchase-method' placeholder='Enter Links, Contact, or Other Method of Purchase' required>
                                                </div>
                                                
                                                <div class='form-group'>
                                                    <label>Price</label>
                                                    <div class='form-group input-group'>
                                                        <span class='input-group-addon'>$</span>
                                                        <input type='number'  step=0.01 class='form-control' name='product-price' placeholder='00.00' required>
                                                    </div>
                                                </div>
                                                
                                                <button type='submit' name='product-submit-button' class='btn btn-primary'>Submit</button>
                                                <button type='reset' name='product-reset-button' class='btn btn-default'>Reset</button>
                                                </form>
                                            </div> <!-- /.col-lg-8 -->
                                        </div> <!-- /.row -->
                                    </div> <!-- /.panel-body -->
                                </div>  <!-- /.tab-pane -->
                                
                                <!-- Service Form -->
                                <div class='tab-pane fade' id='service-pills'>
                                    <div class='panel-body' style = 'max-width: 100%; height: auto;'>
                                        <div class='row'>
                                            <div class='col-lg-8'>
                                               <form action='/Project/pages/UserUploads/service_upload.php' method='post' enctype='multipart/form-data'>
                                                <div class='form-group'>
                                                    <label>Name</label>
                                                    <input class='form-control' type='text' name='service-name' placeholder='Enter Service Name (100 characters limit)' required maxlength='100'>
                                                </div>
                                        
                                                <div class='form-group'>
                                                    <label>Info</label>
                                                    <textarea class='form-control' name='service-info' placeholder='Enter Service Description, Location, Contact Information, etc.' rows='3' required></textarea>
                                                </div>
                                                
                                                <div class='form-group'>
                                                    <label>Charge Rate</label>
                                                    <input type='text'  class='form-control' name='service-charge-rate' placeholder='ex: $8.00/hour' required>
                                                </div>
                                        
                                                <button type='submit' name='service-submit-button' class='btn btn-primary'>Submit</button>
                                                <button type='reset' name='service-reset-button' class='btn btn-default'>Reset</button>
                                                </form>
                                            </div> <!-- /.col-lg-8 -->
                                        </div> <!-- /.row -->
                                    </div> <!-- /.panel-body -->
                                </div>  <!-- /.tab-pane -->
                                
                                <!-- Coupon Form -->
                                <div class='tab-pane fade' id='coupon-pills'>
                                    <div class='panel-body' style = 'max-width: 100%; height: auto;'>
                                        <div class='row'>
                                            <div class='col-lg-8'>
                                               <form action='/Project/pages/UserUploads/coupon_upload.php' method='post' enctype='multipart/form-data'>
                                                <div class='form-group'>
                                                    <label>Name</label>
                                                    <input class='form-control' type='text' name='coupon-name' placeholder='Enter Coupon Name (100 characters limit)' required maxlength='100'>
                                                </div>
                                        
                                                <div class='form-group'>
                                                <label>Description</label>
                                                <textarea class='form-control' name='coupon-description' placeholder='Enter Coupon Description' rows='3' required></textarea>
                                                </div>
                                        
                                                <div class='form-group'>
                                                    <label>Category</label>
                                                    <select class='form-control' name='coupon-category'>
                                                        <option>Food</option>
                                                        <option>Clothing & Shoes</option>
                                                        <option>Entertainment</option>
                                                        <option>Grocery</option>
                                                        <option>Others</option>
                                                    </select>
                                                </div>
                                                
                                                <div class='form-group'>
                                                    <label>Obtain Method</label>
                                                    <input class='form-control'  name='coupon-obtain-method' placeholder='Enter Coupon Links, Code, or Other Obtain Method' required>
                                                </div>
                                                
                                                <div class='form-group'>
                                                    <label>Expiration Date</label>
                                                    <input class='form-control' type='text' name='coupon-expiration-date' placeholder='YYYY-MM-DD (Enter 9999-12-31 if no expiration date)' required 
                                                            pattern='(?:19|20)[0-9]{2}-(?:(?:0[1-9]|1[0-2])-(?:0[1-9]|1[0-9]|2[0-9])|(?:(?!02)(?:0[1-9]|1[0-2])-(?:30))|(?:(?:0[13578]|1[02])-31))' 
                                                            title='Enter a date in this format YYYY-MM-DD'/>
                                                </div>
                                        
                                                <button type='submit' name='coupon-submit-button' class='btn btn-primary'>Submit</button>
                                                <button type='reset' name='coupon-reset-button' class='btn btn-default'>Reset</button>
                                                </form>
                                            </div> <!-- /.col-lg-8 -->
                                        </div> <!-- /.row -->
                                    </div> <!-- /.panel-body -->
                                </div>  <!-- /.tab-pane -->
                                
                                <!-- Giveaway Form -->
                                <div class='tab-pane fade' id='giveaway-pills'>
                                    <div class='panel-body' style = 'max-width: 100%; height: auto;'>
                                        <div class='row'>
                                            <div class='col-lg-8'>
                                               <form action='/Project/pages/UserUploads/giveaway_upload.php' method='post' enctype='multipart/form-data'>
                                                <div class='form-group'>
                                                    <label>Name</label>
                                                    <input class='form-control' type='text' name='giveaway-name' placeholder='Enter Object Name (100 characters limit)' required maxlength='100'>
                                                </div>

                                                <div class='form-group'>
                                                    <label>Picture</label>
                                                    <input type='file' name='giveaway-picture' accept='image/*' required>
                                                </div>
                                        
                                                <div class='form-group'>
                                                <label>Info</label>
                                                <textarea class='form-control' name='giveaway-info' placeholder='Enter Object Description, Giveaway Location, Contact Information, etc.' rows='3' required></textarea>
                                                </div>
                                        
                                                <button type='submit' name='giveaway-submit-button' class='btn btn-primary'>Submit</button>
                                                <button type='reset' name='giveaway-reset-button' class='btn btn-default'>Reset</button>
                                                </form>
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
                <!-- /.col-lg-8 -->";   
            }
            else
            {
                echo"   <!-- Login Form -->
                <div class='col-lg-8'>
                    <div class='panel panel-default'>
                        <div class='panel-heading'>
                            <h4>Please Login to Post Items</h4>
                        </div>
                        <!-- /.panel-heading -->
                        <div class='panel-body'>

                            <!-- Tab panes -->
                            <div class='tab-content'>
                                
                                <!-- Product Form -->
                                <div class='tab-pane fade in active' id='product-pills'>
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