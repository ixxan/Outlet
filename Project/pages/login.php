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

    <title> Outlet - Login</title>
</head>

<body>

</body>

</html>


<?php
session_start();
?>

	<main>
		<!-- Login Form -->
		<div id="login-box">
      	  <div class="left-box">
			<form action="/Project/pages/UserSystemIncludes/login.inc.php" method="post">
				<h1> Login </h1>
				
				<!-- Login Messages -->
                <?php
                    if(isset($_GET["error"]))
                    {
                       if($_GET["error"] == "emptyfields")
                       {
                        echo '<p style = "color:#e61928" class="login-messages">Please fill in the empty fields</p>';
                       } 
                       else if($_GET["error"] == "sqlerror")
                       {
                        echo '<p style = "color:#e61928" class="login-messages">User does not exist</p>';
                       }
                       else if($_GET["error"] == "wrongpassword")
                       {
                        echo '<p style = "color:#e61928" class="login-messages">Incorrect Password</p>';
                       }
                       else if($_GET["error"] == "nouser")
                       {
                        echo '<p style = "color:#e61928" class="login-messages">User does not exist</p>';
                       }
                    }
                    else if($_GET["login"] == "success")
                    {
                        header("Location:/Project/pages/home.php");
                    }
             
                    if(isset($_GET["newpassword"]))
                    {
                       if($_GET["newpassword"] == "passwordupdated")
                       {
                        echo '<h5 class="login-messages" style="color:#16c214">Your password has been reset!</h5>';
                       } 
                    }
                   ?>
                
				<input type="text" name="emailusername" placeholder="Username/Email" required>
				<input type="password" name="password" placeholder="Password" required>
				
				<button type="submit" name="login-button" class="button"> Login </button>
         	</form>
         	
         	     
                   
         	<p type="text"> Forgot your password? <a href="resetpassword.php" type="link">Reset</a></p>
         	<p type="text"> Not yet a user? <a href="signup.php" type="link">Sign Up</a></p>
   
		  </div>
		</div>
	</main>