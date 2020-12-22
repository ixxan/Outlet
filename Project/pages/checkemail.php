<!DOCTYPE html>
<html lang="en">

<head>

   	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
   
    <!-- User System Style Sheet-->
	<link rel="stylesheet" type="text/css" href="../pages/CSS/user_system_style.css"/>
	<!-- Tab Logo -->
    <link href="../pages/images/tab_logo.png" rel="shortcut icon">

    <title> Outlet - Reset Password</title>
</head>
<body></body>
</html>


	<main>
		<div id="login-box">
      	  <div class="left-box">
				<h1> Reset Password </h1>
         		<!-- Messages -->
                <?php
                    if(isset($_GET["reset"]))
                    {
                       if($_GET["reset"] == "success")
                       {
                        echo '<p class="signup-messages"> Please check your email!</p>';
                        echo '<p class="signup-messages"> Note: <br>
                                                          Due to our website is still at
                                                          its development stage, we may
                                                          not fulfill all the customer 
                                                          requests. <br>
                                                          If you did not recieve a reset 
                                                          link within the next 10 minutes,
                                                          please write to
                                                          <a href="mailto:farragutqros@gmail.com??&subject=Reset%20Password&body=Please enter your email address associated with your Outlet account:"> 
                                                          Farragut Qros</a> (farragutqros@gmail.com). 
                                                          Please be sure to include your email address,
                                                          our customer service
                                                          will be in touch with you 
                                                          within 2 business days.
                                                          Our sincere apologies.
                               </p>';
                       } 
                    }
                ?>
		  </div>
		</div>
	</main>