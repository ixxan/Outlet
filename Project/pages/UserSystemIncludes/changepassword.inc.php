<?php
require 'dbh.inc.php';

if(isset($_POST["reset-password-button"]))
{
    
    $email = $_POST["email"];
    $oldPassword = $_POST["old-password"];
    $newPassword = $_POST["new-password"];
    $newPassword2 = $_POST["repeat-new-password"];
    
    if ($newPassword !== $newPassword2)
    {
      echo "Passwords do not match!";  
      exit(); 
    }
             
    $sql = "SELECT * FROM users WHERE emailUsers='$email'";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql))
    {
        echo "There was an error! Please try again!";
        exit();
    }
    else
    {
        mysqli_stmt_bind_param($stmt, "s", $email);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        if(!$row = mysqli_fetch_assoc($result))
        {
            echo "No user found";
            exit(); 
        }
        else
        {
            $sql = "UPDATE users SET passwordUsers=? WHERE	emailUsers=?";
            $stmt = mysqli_stmt_init($conn);
            if(!mysqli_stmt_prepare($stmt, $sql))
            {
                echo "There was an error!6";
                exit();
            }
            else
            {
                $newPasswordHash = password_hash($newPassword, PASSWORD_DEFAULT);
                mysqli_stmt_bind_param($stmt, "ss", $newPasswordHash, $email);
                mysqli_stmt_execute($stmt);
                           
                $sql = "DELETE FROM pwdReset WHERE pwdResetEmail=?";
                $stmt = mysqli_stmt_init($conn);
                if(!mysqli_stmt_prepare($stmt, $sql))
                {
                    echo "Please try again!7";
                    exit();
                }
                else
                {
                    mysqli_stmt_bind_param($stmt, "s", $email);
                    mysqli_stmt_execute($stmt);
                    header("Location: /Project/pages/login.php?newpassword=passwordupdated");
                }
            }
        }
   }
   
}
else
{
    header("Location:/Project/pages/home.php");
}