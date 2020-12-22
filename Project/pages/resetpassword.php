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
		<!-- Password Reset Form -->
		<div id="login-box">
      	  <div class="left-box">
			<form action="/Project/pages/UserSystemIncludes/resetpasswordrequest.inc.php" method="post">
				<h1> Reset Password </h1>
				<input type="text" name="email" placeholder="Please enter your email" required>
				<button type="submit" name="reset-request-button" class="button"> Send </button>
         	</form>
         		<p type="text"> An e-mail will be send to you with instructions on how to reset your password.</p>
		  </div>
		</div>
	</main>