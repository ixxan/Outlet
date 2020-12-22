<?php
if (isset($_POST['giveaway-submit-button']))
    {
        //connect to database 
        require 'items_db.php';
        
        //table items
        $giveawayName = $_POST['giveaway-name'];
        $giveawayPictureName = $_FILES['giveaway-picture']['name'];
        $giveawayInfo = $_POST['giveaway-info'];
        
        session_start();
        $userId = $_SESSION['userId'];
        
        //empty info on Post Items form
        if(empty($giveawayName) || empty($giveawayPictureName) ||empty($giveawayInfo))
        {
            header("Location: /Project/pages/postitems.php?error=emptyFields");
            exit();
        }
        
        //full info
        else
        {
            $sql = "INSERT INTO giveawayList (name, pictureName, info, userId) VALUES(?, ?, ?, ?)";
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
                $pictureContents = file_get_contents($_FILES['giveaway-picture']['tmp_name']);
                //empty picture
                if(empty($pictureContents))
                {
                    header("Location: /Project/pages/postitems.php?error=emptyPicture");
                    exit();   
                }
                else
                {
                    mysqli_stmt_bind_param($stmt, "ssss", $giveawayName, $giveawayPictureName, $giveawayInfo, $userId);
                    mysqli_stmt_execute($stmt);
                    
                    //picture upload
                    $pictureTmpName = $_FILES['giveaway-picture']['tmp_name'];
                    $pictureDestination = __DIR__.'/GiveawayPictures/'.$_FILES['giveaway-picture']['name'];
                    //$pictureExt = explode('.',$_FILES['giveaway-picture']['name'] );
                    //$pictureActualExt = strtolower(end($pictureExt));
                    //$pictureNameNew = uniqid('', true).".".$pictureActualExt;
                    //$pictureDestination = __DIR__.'/giveawayPictures/'.$pictureNameNew;
                    
                    if(move_uploaded_file($pictureTmpName, $pictureDestination))
                    {
                        header("Location: /Project/pages/postitems.php?postitem=success");
                    }
                    else
                    {
                        header("Location: /Project/pages/postitems.php?error=pictureUploadFailure");
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
        header("Location: /Project/pages/postitems.php");
        exit();  
    }