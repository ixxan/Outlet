<?php

    if (isset($_POST['signup-button']))
    {
        //connect to database handler
        require 'dbh.inc.php';
        
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $password2 = $_POST['password2'];
        
        //empty info on signup form
        if(empty($username) || empty($email) ||empty($password) ||empty($password2) )
        {
            header("Location: /Project/pages/signup.php?error=emptyfields&username=".$username."&email=".$email);
            exit();
        }
        //invalid email and username
        else if(!filter_var($email, FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-9]*$/", $username))
        {
            header("Location: /Project/pages/signup.php?error=invalidemail&username");
            exit();
        }
        //invalid email only
        else if(!filter_var($email, FILTER_VALIDATE_EMAIL))
        {
            header("Location: /Project/pages/signup.php?error=invalidemail&username=".$username);
            exit();
        }
        //invalid username only
        else if(!preg_match("/^[a-zA-Z0-9]*$/", $username))
        {
            header("Location: /Project/pages/signup.php?error=invalidusername&email=".$email);
            exit();
        }
        //passwords not matching
        else if($password !== $password2)
        {
            header("Location: /Project/pages/signup.php?error=passwordcheck&username=".$username."&email=".$email);
            exit(); 
        }
        //username is already taken
        else
        {
            $sql = "SELECT usernameUsers FROM users WHERE usernameUsers=?";
            $stmt = mysqli_stmt_init($conn);
            if(!mysqli_stmt_prepare($stmt, $sql))
            {
                header("Location: /Project/pages/signup.php?error=sqlerror");
                exit();  
            }
            else
            {
                mysqli_stmt_bind_param($stmt, "s", $username);
                mysqli_stmt_execute($stmt);
                mysqli_stmt_store_result($stmt);
                $resultCheck = mysqli_stmt_num_rows($stmt);
                if($resultCheck > 0)
                {
                    header("Location: /Project/pages/signup.php?error=usertaken&email=".$email);
                    exit();   
                }
                else
                {
                    $sql = "INSERT INTO users (usernameUsers, emailUsers, passwordUsers) VALUES(?,?,?)";
                    $stmt = mysqli_stmt_init($conn);
                    if(!mysqli_stmt_prepare($stmt, $sql))
                    {
                        header("Location: /Project/pages/signup.php?error=sqlerror2");
                        exit();  
                    }
                    else
                    {
                        //hide password
                        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
                        
                        mysqli_stmt_bind_param($stmt, "sss", $username, $email, $hashedPassword);
                        mysqli_stmt_execute($stmt);
                        
                        header("Location: /Project/pages/signup.php?signup=success");
                        exit();  
                    }
                }
            }
        }
        
        mysqli_stmt_close($stmt);
        mysqli_close($conn);
    }
    
    else
    {
        header("Location: /Project/pages/signup.php");
        exit();  
    }