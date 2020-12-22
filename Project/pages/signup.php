<!DOCTYPE html>
<html lang="en">
<head>
	   <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    
    <!-- CSS style sheet-->
	   <link rel="stylesheet" type="text/css" href="../pages/CSS/user_system_style.css"/>
	   <!-- Tab Logo -->
    <link href="../pages/images/tab_logo.png" rel="shortcut icon">
    
<title>Outlet - Sign Up</title>

</head>
<body>
</body>    
</html>


<main>
    <!-- Sign Up Form -->
	<div id="login-box">
      <div class="left-box">
		       <form class="form-signup" action="/Project/pages/UserSystemIncludes/signup.inc.php" method="post">
			           <h1> Sign Up</h1>
                
                <!-- Sign Up Messages -->
                <?php
                    if(isset($_GET["error"]))
                    {
                       if($_GET["error"] == "emptyfields")
                       {
                        echo '<p style = "color:#e61928;margin:0" class="signup-messages">Please fill in the empty fields</p>';
                       } 
                       else if($_GET["error"] == "invalidemail&username")
                       {
                        echo '<p style = "color:#e61928;margin:0" class="signup-messages">Invalid Email & Username</p>';
                       }
                       else if($_GET["error"] == "invalidemail")
                       {
                        echo '<p style = "color:#e61928;margin:0" class="signup-messages">Invalid Email</p>';
                       }
                        else if($_GET["error"] == "invalidusername")
                       {
                        echo '<p style = "color:#e61928;margin:0" class="signup-messages">Invalid Username</p>';
                       }
                        else if($_GET["error"] == "passwordcheck")
                       {
                        echo '<p style = "color:#e61928;margin:0" class="signup-messages">Passwords do not match</p>';
                       }
                       else if($_GET["error"] == "sqlerror")
                       {
                        echo '<p style = "color:#e61928;margin:0" class="signup-messages">Username or Email already taken</p>';
                       }
                       else if($_GET["error"] == "usertaken")
                       {
                        echo '<p style = "color:#e61928;margin:0" class="signup-messages">Username is already taken</p>';
                       }
                       else if($_GET["error"] == "sqlerror2")
                       {
                        echo '<p style = "color:#e61928;margin:0" class="signup-messages">Email is already taken</p>';
                       }
                    }
                    else if($_GET["signup"] == "success")
                    {
                        header("Location:/Project/pages/signupsucceed.php");
                    }
                ?>
                
          	<input type="text" name="username" placeholder="Username (No space allowed)"required>
          	<input type="text" name="email" placeholder="Email"required>
          	<input type="password" name="password" placeholder="Password"required>
          	<input type="password" name="password2" placeholder="Confirm password"required>
          	
          	<button type="submit" name="signup-button" class="button"> Sign Up </button>
        </form>
          	<p type="text"> Already a user? <a href="login.php" type="link">Log In</a></p>
        </div>
    </div>
</main>
