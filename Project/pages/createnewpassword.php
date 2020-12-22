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

    <title> Outlet - Create New Password</title>
</head>
<body></body>
</html>


	<main>
		<!-- Create New Password Form -->
		<div id="login-box">
      	  <div class="left-box">
			<?php
			    $selector = $_GET["selector"];
			    $validator = $_GET["validator"];
			    
			    if(empty($selector) || empty($validator))
			    {
			        echo"Could not validate your request!";
			    }
			    else
			    {
			        if(ctype_xdigit($selector) !== false && ctype_xdigit($validator) !== false)
			        {
			            ?>
			        	<form action="/Project/pages/UserSystemIncludes/resetpassword.inc.php" method="post">
			        	     <input type="hidden" name="selector" value="<?php echo $selector; ?>"/>
			        	     <input type="hidden" name="validator" value="<?php echo $validator; ?>"/> 
			        	     <input type="password" name="password" placeholder="Enter a new password"/>  
			        	     <input type="password" name="password2" placeholder="Repeat the new password"/> 
			        	     <button type="submit" name="reset-password-button">Reset password</button>
			        	</form>
			        	<?php
			        }
			    }
			?>
		  </div>
		</div>
	</main>