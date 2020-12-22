<?php

if(isset($_POST["reset-request-button"]))
{
    //random generate tokens
    $selecter = bin2hex(openssl_random_pseudo_bytes('8'));
    $token = openssl_random_pseudo_bytes('32');
    
    //link for email
    $url = "https://outlet-ixxan.c9users.io/Project/pages/createnewpassword.php?selector=" .$selecter. "&validator=" . bin2hex($token);
    
    //link expires in 600 seconds(10 minutes)
    $expires = date("U") + 600;
    
    //connect to database handler
    require 'dbh.inc.php';
    
    $userEmail = $_POST["email"];
    
    //error for existing token of an email within 600s
    $sql = "DELETE FROM pwdReset WHERE pwdResetEmail=?";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql))
    {
     echo "Please try again after 10 minutes.";
     exit();
    }
    else
    {
        mysqli_stmt_bind_param($stmt, "s", $userEmail);
        mysqli_stmt_execute($stmt);
    }
    
    $sql = "INSERT INTO pwdReset (pwdResetEmail, pwdResetSelector, pwdResetToken, pwdResetExpires) VALUES (?,?,?,?);";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql))
    {
     echo "Please try again after 10 minutes.";
     exit();
    }
    else
    {
        $hashedToken = password_hash($token, PASSWORD_DEFAULT);
        mysqli_stmt_bind_param($stmt, "ssss", $userEmail, $selecter, $hashedToken, $expires);
        mysqli_stmt_execute($stmt);
    }
    
    //close statement and connection
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
    
    //send email
    $to = $userEmail;
    //email content
    $subject = 'Reset your password for Outlet';
    $message = '<h1>Reset your password for Outlet</h1>';
    $message.= '<p>The link to reset your password is below. If you did not make this request, you may ignore this message.</p>';
    $message.= '<p> Here is the password reset link: </br>';
    $message.= '<a href="' .$url . '">' .$url. '</a></p>';
    $headers = "From: Farragut Qros Team <farragutqros@gmail.com>\r\n";
    $headers.= "Reply-To: <farragutqros@gmail.com>\r\n";
    $headers.= "Content-type: text/html\r\n";
    
    mail($to, $subject, $message, $headers);
    
    header("Location: /Project/pages/checkemail.php?reset=success");
}
else
{
    header("Location:/Project/pages/home.php");
}