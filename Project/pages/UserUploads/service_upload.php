<?php
if (isset($_POST['service-submit-button']))
    {
        //connect to database 
        require 'items_db.php';
        
        //table items
        $serviceName = $_POST['service-name'];
        $serviceInfo = $_POST['service-info'];
        $serviceChargeRate = $_POST['service-charge-rate'];
        
        session_start();
        $userId = $_SESSION['userId'];
        
        //empty info on Post Items form
        if(empty($serviceName) || empty($serviceInfo) ||empty($serviceChargeRate))
        {
            header("Location: /Project/pages/postitems.php?error=emptyFields");
            exit();
        }
        
        //full info
        else
        {
            $sql = "INSERT INTO serviceList (name, info, chargeRate, userId) VALUES(?, ?, ?, ?)";
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
                mysqli_stmt_bind_param($stmt, "ssss", $serviceName, $serviceInfo, $serviceChargeRate, $userId);
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