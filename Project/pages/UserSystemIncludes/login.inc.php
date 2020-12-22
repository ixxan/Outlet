<?php

    if(isset($_POST['login-button']))
    {
        //connect to database handler
        require 'dbh.inc.php';
        
        $emailusername = $_POST['emailusername'];
        $password = $_POST['password'];
        
        //empty info on login form
        if(empty($emailusername) || empty($password))
        {
            header("Location: /Project/pages/login.php?error=emptyfields");
            exit();
        }
        //match the user from database
        else 
        {
           $sql = "SELECT * FROM users WHERE usernameUsers=? OR emailUsers=?;"; 
           $stmt = mysqli_stmt_init($conn);
           //if the user does not exist
           if(!mysqli_stmt_prepare($stmt, $sql))
           {
             header("Location: /Project/pages/login.php?error=sqlerror");
             exit();  
           }
           else 
           {
              mysqli_stmt_bind_param($stmt, "ss", $emailusername, $emailusername);
              mysqli_stmt_execute($stmt);
              $result = mysqli_stmt_get_result($stmt);
              //user exists
              if($row = mysqli_fetch_assoc($result))
              {
                 $passwordCheck = password_verify($password, $row['passwordUsers']);
                 //worng password
                 if($passwordCheck == false)
                 {
                    header("Location: /Project/pages/login.php?error=wrongpassword");
                    exit(); 
                 }
                 //correct password
                 else if ($passwordCheck == true)
                 {
                    session_start();
                    $_SESSION['userId'] = $row['idUsers'];
                    $_SESSION['userUsername'] = $row['usernameUsers'];
                    
                    header("Location: /Project/pages/index.php?login=success");
                    exit(); 
                 }
              }
              //user does not exist
              else
              {
                header("Location: /Project/pages/login.php?error=nouser");
                exit();   
              }
           }
        }
    }
     else
    {
        header("Location: /Project/pages/login.php");
        exit();  
    }