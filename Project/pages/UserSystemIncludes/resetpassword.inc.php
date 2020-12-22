<?php

if(isset($_POST["reset-password-button"]))
{
    $selecter = $_POST["selector"];
    $validator = $_POST["validator"];
    $password = $_POST["password"];
    $password2 = $_POST["password2"];
    
    if(empty($password) || empty($password2))
    {
      header("Location:/Project/pages/createnewpassword.php?newpassword=empty");  
      exit();
    }
    else if ($password !== $password2)
    {
      header("Location:/Project/pages/createnewpassword.php?newpassword=passwordnotmatch");  
      exit(); 
    }
    
    $currentDate = date("U");
    
    require 'dbh.inc.php';
    
    $sql = "SELECT * FROM pwdRest WHERE pwdResetSelector=? AND pwdResetExpires >= ?";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql))
    {
     echo "There was an error!";
     exit();
    }
    else
    {
        mysqli_stmt_bind_param($stmt, "ss", $selecter, $currentDate);
        mysqli_stmt_execute($stmt);
        //$currentDate 1:08:56
        
        $result = mysqli_stmt_get_result($stmt);
        if(!$row = mysqli_fetch_assoc($result))
        {
            echo "There was an error! Please re-submit your reset request.";
            exit(); 
        }
        else
        {
            $tokenBin = hex2bin($validator);
            $tokenCheck = password_verify($tokenBin, $row["pwdResetToken"]);
            
            if($tokenCheck == false)
            {
                echo "Please re-submit your reset request.";
                exit(); 
            }
            else if($tokenCheck == true)
            {
             $tokenEmail = $row['pwdResetEmail'];
             
             $sql = "SELECT * FROM users WHERE emailUsers=?;";
             $stmt = mysqli_stmt_init($conn);
                if(!mysqli_stmt_prepare($stmt, $sql))
                {
                    echo "There was an error!";
                    exit();
                }
                else
                {
                    mysqli_stmt_bind_param($stmt, "s", $tokenEmail);
                    mysqli_stmt_execute($stmt);
                    $result = mysqli_stmt_get_result($stmt);
                    if(!$row = mysqli_fetch_assoc($result))
                    {
                        echo "There was an error!";
                        exit(); 
                    }
                    else
                    {
                        $sql = "UPDATE users SET passwordUsers=? WHERE	emailUsers=?";
                        $stmt = mysqli_stmt_init($conn);
                        if(!mysqli_stmt_prepare($stmt, $sql))
                        {
                            echo "There was an error!";
                            exit();
                        }
                        else
                        {
                            $newPasswordHash = password_hash($password, PASSWORD_DEFAULT);
                            mysqli_stmt_bind_param($stmt, "ss", $newPasswordHash, $tokenEmail);
                            mysqli_stmt_execute($stmt);
                           
                            $sql = "DELETE FROM pwdReset WHERE pwdResetEmail=?";
                            $stmt = mysqli_stmt_init($conn);
                            if(!mysqli_stmt_prepare($stmt, $sql))
                            {
                                echo "Please try again after 10 minutes.";
                                exit();
                            }
                            else
                            {
                                mysqli_stmt_bind_param($stmt, "s", $tokenEmail);
                                mysqli_stmt_execute($stmt);
                                header("Location: /Project/pages/login.php?newpassword=passwordupdated");
                             }
                        }
                    }
                }
            }
        }
    }
}
else
{
    header("Location:/Project/pages/home.php");
}