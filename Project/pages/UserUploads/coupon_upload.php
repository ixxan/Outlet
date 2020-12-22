<?php
if (isset($_POST['coupon-submit-button']))
    {
        //connect to database 
        require 'items_db.php';
        
        //table items
        $couponName = $_POST['coupon-name'];
        $couponDescription = $_POST['coupon-description'];
        $couponCategory = $_POST['coupon-category'];
        $couponObtainMethod = $_POST['coupon-obtain-method'];
        $couponExpirationDate = $_POST['coupon-expiration-date'];
        
        session_start();
        $userId = $_SESSION['userId'];   
        
        //empty info on Post Items form
        if(empty($couponName) ||empty($couponDescription) ||empty($couponCategory) ||empty($couponObtainMethod) ||empty($couponExpirationDate) )
        {
            header("Location: /Project/pages/postitems.php?error=emptyFields");
            exit();
        }
        
        //full info
        else
        {
            $sql = "INSERT INTO couponList (name, description, category, obtainMethod, expirationDate, userId) VALUES(?, ?, ?, ?, ?, ?)";
            $stmt = mysqli_stmt_init($conn);
            
            //no mysql connection
            if(!mysqli_stmt_prepare($stmt, $sql))
            {
                header("Location: /Project/pages/postitems.php?error=sqlError");
                exit();  
            }
            //mysql connected
            else
            {
                mysqli_stmt_bind_param($stmt, "ssssss", $couponName, $couponDescription, $couponCategory, $couponObtainMethod, $couponExpirationDate, $userId);
                mysqli_stmt_execute($stmt);
                
                header("Location: /Project/pages/postitems.php?postitem=success");
            }
        }
        mysqli_stmt_close($stmt);
        mysqli_close($conn);
    }
    
else
    {
        header("Location: /Project/pages/postitems.php");
        exit();  
    }