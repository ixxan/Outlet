<?php
if (isset($_POST['report-submit-button']))
    {
        //connect to database 
        require 'items_db.php';
        
        //table items
        $reportMessage = $_POST['report-message'];
        $reportCategory = $_GET["category"];
        $reportCategoryId = $_GET["id"];
        
        $sql = "INSERT INTO reportList (reportMessage,category,itemCategoryId) VALUES(?,?,?)";
        $stmt = mysqli_stmt_init($conn);
            
            //no mysql connection
            if(!mysqli_stmt_prepare($stmt, $sql))
            {
                header("Location: /Project/pages/report.php?error=sqlError");
                exit();  
            }
            //mysql connected
            else
            {
                mysqli_stmt_bind_param($stmt, "sss", $reportMessage,$reportCategory,$reportCategoryId);
                mysqli_stmt_execute($stmt);
                
                header("Location: /Project/pages/report.php?report=success");
            }
   
        mysqli_stmt_close($stmt);
        mysqli_close($conn);
    }
else
    {
        header("Location: /Project/pages/report.php");
        exit();  
    }