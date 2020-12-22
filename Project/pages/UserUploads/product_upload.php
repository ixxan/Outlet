<?php
if (isset($_POST['product-submit-button']))
    {
        //connect to database 
        require 'items_db.php';
        
        //table items
        $productName = $_POST['product-name'];
        $productPicture = $_FILES['product-picture'];
        $productDescription = $_POST['product-description'];
        $productCategory = $_POST['product-category'];
        $productPurchaseMethod = $_POST['product-purchase-method'];
        $productPrice = $_POST['product-price'];
        $productPictureName = $_FILES['product-picture']['name'];
                    
        session_start();
        $userId = $_SESSION['userId'];
        
        //empty info on Post Items form
        if(empty($productName) || empty($productPicture) ||empty($productDescription) ||empty($productCategory) ||empty($productPurchaseMethod) )
        {
            header("Location: /Project/pages/postitems.php?error=emptyFields");
            exit();
        }
        
        //price not a number
        else if(!is_numeric($productPrice))
        {
            header("Location: /Project/pages/postitems.php?error=priceNotNumeric");
            exit(); 
        }
        
        //full info
        else
        {
            $sql = "INSERT INTO productList (name, picture, description, category, purchaseMethod, price, pictureName, userId) VALUES(?, ?, ?, ?, ?, ?, ?, ?)";
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
                $pictureContents = file_get_contents($_FILES['product-picture']['tmp_name']);
                //empty picture
                if(empty($pictureContents))
                {
                    header("Location: /Project/pages/postitems.php?error=emptyPicture");
                    exit();   
                }
                else
                {
                    mysqli_stmt_bind_param($stmt, "sssssdss", $productName, $pictureContents, $productDescription, $productCategory, $productPurchaseMethod, $productPrice, $productPictureName, $userId);
                    mysqli_stmt_execute($stmt);
                    
                    //picture upload
                    $pictureTmpName = $_FILES['product-picture']['tmp_name'];
                    $pictureDestination = __DIR__.'/ProductPictures/'.$_FILES['product-picture']['name'];
                    //$pictureExt = explode('.',$_FILES['product-picture']['name'] );
                    //$pictureActualExt = strtolower(end($pictureExt));
                    //$pictureNameNew = uniqid('', true).".".$pictureActualExt;
                    //$pictureDestination = __DIR__.'/ProductPictures/'.$pictureNameNew;
                    
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