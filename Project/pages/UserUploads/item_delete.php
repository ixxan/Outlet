<?php
if (isset($_POST['product-delete-button']))
    {
        //connect to database 
        require 'items_db.php';
        
        $productId = $_GET["productId"];
 
        
        $sql = "DELETE FROM productList WHERE id=$productId";

        if (mysqli_query($conn, $sql)) 
        {
            header("Location:/Project/pages/user_profile.php?delete=succeed");
        } 
        else {
            echo "Error, please go back and try again! " . mysqli_error($conn);
            }
    }
 
if (isset($_POST['service-delete-button']))
    {
        //connect to database 
        require 'items_db.php';
        
        $serviceId = $_GET["serviceId"];
 
        
        $sql = "DELETE FROM serviceList WHERE id=$serviceId";

        if (mysqli_query($conn, $sql)) 
        {
            header("Location:/Project/pages/user_profile.php?delete=succeed");
        } 
        else {
            echo "Error, please go back and try again! " . mysqli_error($conn);
            }
    } 
    
if (isset($_POST['coupon-delete-button']))
    {
        //connect to database 
        require 'items_db.php';
        
        $couponId = $_GET["couponId"];
 
        
        $sql = "DELETE FROM couponList WHERE id=$couponId";

        if (mysqli_query($conn, $sql)) 
        {
            header("Location:/Project/pages/user_profile.php?delete=succeed");
        } 
        else {
            echo "Error, please go back and try again! " . mysqli_error($conn);
            }
    }  
    
if (isset($_POST['giveaway-delete-button']))
    {
        //connect to database 
        require 'items_db.php';
        
        $giveawayId = $_GET["giveawayId"];
 
        
        $sql = "DELETE FROM giveawayList WHERE id=$giveawayId";

        if (mysqli_query($conn, $sql)) 
        {
            header("Location:/Project/pages/user_profile.php?delete=succeed");
        } 
        else {
            echo "Error, please go back and try again! " . mysqli_error($conn);
            }
    }  
    
else
{
     header("Location:/Project/pages/user_profile.php");
}