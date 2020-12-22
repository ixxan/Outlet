<?php

    require 'items_db.php';
    
    function getProductFormErrorMessages()
    {
        if(isset($_GET["error"]))
        {
            if($_GET["error"] == "emptyFields")
            {
                echo '<h2 style = "color:#e61928" class="signup-messages">Please fill in all the empty fields!</h2>';
            }
            else if($_GET["error"] == "priceNotNumeric")
            {
                echo '<h2 style = "color:#e61928" class="signup-messages">Please fill in a number for Price!</h2>';
            }
            else if($_GET["error"] == "sqlError")
            {
                echo '<h2 style = "color:#e61928" class="signup-messages">Connection failed, please try again!</h2>';
            }
            else if($_GET["error"] == "emptyPicture")
            {
                echo '<h2 style = "color:#e61928" class="signup-messages">Please upload a Product Picture!</h2>';
            }
            else if($_GET["error"] == "pictureUploadFailure")
            {
                echo '<h2 style = "color:#e61928" class="signup-messages">Picture upload failed, please try again!</h2>';
            }
        }
        else if($_GET["postitem"] == "success")
        {
            echo "<script> alert('Upload succeed!')</script>";
        }
                                    
    }
    
    
    function getProduct()
    {
        global $conn;
        
        $getProduct = "SELECT * FROM productList ";
        
        $runProduct = mysqli_query($conn, $getProduct) or die('Error');
        
        while($rowProduct = mysqli_fetch_array($runProduct))
        {
            $productId = $rowProduct['id'];
            $productName = $rowProduct['name'];
            $productPirture = $rowProduct['picture'];
            $productDescription = $rowProduct['description'];
            $productCategory = $rowProduct['category'];
            $productLink = $rowProduct['purchaseMethod'];
            $productPrice = $rowProduct['price'];
            $productPictureName = $rowProduct['pictureName'];
            
            echo" 
                <div id='single_product'> 
                   <a href='productdetail.php?productId=$productId'><image src= '/Project/pages/UserUploads/ProductPictures/$productPictureName'/></a>
                   <p name='product-name'>$productName</p>
                   <h4 name='product-price'>$$productPrice</h4>
                   <a href='productdetail.php?productId=$productId'><button name='cart_button'> Details</button></a>
                </div>
                <div><p></p></div>
            ";
        }
    }
    
    function getService()
    {
        global $conn;
        
        $getService = "SELECT * FROM serviceList ";
        
        $runService = mysqli_query($conn, $getService) or die('Error');
        
        while($rowService = mysqli_fetch_array($runService))
        {
            $serviceId = $rowService['id'];
            $serviceName = $rowService['name'];
            $serviceInfo = $rowService['info'];
            $serviceChargeRate = $rowService['chargeRate'];
            
            echo" 
                <div id='single_service'> 
                   <div>
                   <h4 name='service-name'><a href='servicedetail.php?serviceId=$serviceId'>$serviceName</a></h4>
                   </div>
                   <div>
                   <p name='service-charge-rate'>$serviceChargeRate</p>
                   </div>
                   <div>
                   <p><a href='servicedetail.php?serviceId=$serviceId'><button name='cart_button'> Details</button></a></p>
                   </div>
                </div>
            ";
        }
    }
    
    function getCoupon()
    {
        global $conn;
        
        $getCoupon = "SELECT * FROM couponList ";
        
        $runCoupon = mysqli_query($conn, $getCoupon) or die('Error');
        
        while($rowCoupon = mysqli_fetch_array($runCoupon))
        {
            $couponId = $rowCoupon['id'];
            $couponName = $rowCoupon['name'];
            $couponDescription = $rowCoupon['description'];
            $couponCategory = $rowCoupon['category'];
            $couponObtainMethod = $rowCoupon['obtainMethod'];
            $couponExpirationDate = $rowCoupon['expirationDate'];
            
            if($couponExpirationDate >= date("Y-m-d"))
            {
                echo" 
                <div id='single_coupon'> 
                   <div>
                   <h4 name='coupon-name'><a href='coupondetail.php?couponId=$couponId'>$couponName</a></h4>
                   </div>
                   <div>
                   <p><a href='coupondetail.php?couponId=$couponId'><button name='cart_button'> Details</button></a></p>
                   </div>
                </div>
                 ";
            }
            
        }
    }
    
    function getGiveaway()
    {
        global $conn;
        
        $getGiveaway = "SELECT * FROM giveawayList ";
        
        $runGiveaway = mysqli_query($conn, $getGiveaway) or die('Error');
        
        while($rowGiveaway = mysqli_fetch_array($runGiveaway))
        {
            $giveawayId = $rowGiveaway['id'];
            $giveawayName = $rowGiveaway['name'];
            $giveawayPictureName = $rowGiveaway['pictureName'];
            $giveawayInfo = $rowGiveaway['info'];
            
            echo" 
                <div id='single_giveaway'> 
                   <a href='giveawaydetail.php?giveawayId=$giveawayId'><image src= '/Project/pages/UserUploads/GiveawayPictures/$giveawayPictureName'/></a>
                   <p name='giveaway-name'>$giveawayName</p>
                   <a href='giveawaydetail.php?giveawayId=$giveawayId'><button name='cart_button'> Details</button></a>
                </div>
                <div><p></p></div>
            ";
        }
    }
    
    function getProductHome()
    {
        global $conn;
        
        $getProduct = "SELECT * FROM productList ";
        
        $runProduct = mysqli_query($conn, $getProduct) or die('Error');
        
        while($rowProduct = mysqli_fetch_array($runProduct))
        {
            $productId = $rowProduct['id'];
            $productName = $rowProduct['name'];
            $productPirture = $rowProduct['picture'];
            $productDescription = $rowProduct['description'];
            $productCategory = $rowProduct['category'];
            $productLink = $rowProduct['purchaseMethod'];
            $productPrice = $rowProduct['price'];
            $productPictureName = $rowProduct['pictureName'];
            
            if($productCategory=="Home & Office & Garden")
            {
                echo" 
                <div id='single_product'> 
                   <a href='productdetail.php?productId=$productId'><image src= '/Project/pages/UserUploads/ProductPictures/$productPictureName'/></a>
                   <p name='product-name'>$productName</p>
                   <h4 name='product-price'>$$productPrice</h4>
                   <a href='productdetail.php?productId=$productId'><button name='cart_button'> Details</button></a>
                </div>
                <div><p></p></div>
            ";
            }
        }
    }
    
    function getProductClothingShoes()
    {
        global $conn;
        
        $getProduct = "SELECT * FROM productList ";
        
        $runProduct = mysqli_query($conn, $getProduct) or die('Error');
        
        while($rowProduct = mysqli_fetch_array($runProduct))
        {
            $productId = $rowProduct['id'];
            $productName = $rowProduct['name'];
            $productPirture = $rowProduct['picture'];
            $productDescription = $rowProduct['description'];
            $productCategory = $rowProduct['category'];
            $productLink = $rowProduct['purchaseMethod'];
            $productPrice = $rowProduct['price'];
            $productPictureName = $rowProduct['pictureName'];
            
            if($productCategory=="Clothing & Shoes")
            {
                echo" 
                <div id='single_product'> 
                   <a href='productdetail.php?productId=$productId'><image src= '/Project/pages/UserUploads/ProductPictures/$productPictureName'/></a>
                   <p name='product-name'>$productName</p>
                   <h4 name='product-price'>$$productPrice</h4>
                   <a href='productdetail.php?productId=$productId'><button name='cart_button'> Details</button></a>
                </div>
                <div><p></p></div>
            ";
            }
        }
    }
    
    function getProductElectronics()
    {
        global $conn;
        
        $getProduct = "SELECT * FROM productList ";
        
        $runProduct = mysqli_query($conn, $getProduct) or die('Error');
        
        while($rowProduct = mysqli_fetch_array($runProduct))
        {
            $productId = $rowProduct['id'];
            $productName = $rowProduct['name'];
            $productPirture = $rowProduct['picture'];
            $productDescription = $rowProduct['description'];
            $productCategory = $rowProduct['category'];
            $productLink = $rowProduct['purchaseMethod'];
            $productPrice = $rowProduct['price'];
            $productPictureName = $rowProduct['pictureName'];
            
            if($productCategory=="Electronics")
            {
                echo" 
                <div id='single_product'> 
                   <a href='productdetail.php?productId=$productId'><image src= '/Project/pages/UserUploads/ProductPictures/$productPictureName'/></a>
                   <p name='product-name'>$productName</p>
                   <h4 name='product-price'>$$productPrice</h4>
                   <a href='productdetail.php?productId=$productId'><button name='cart_button'> Details</button></a>
                </div>
                <div><p></p></div>
            ";
            }
        }
    }
    
    function getProductEntertainment()
    {
        global $conn;
        
        $getProduct = "SELECT * FROM productList ";
        
        $runProduct = mysqli_query($conn, $getProduct) or die('Error');
        
        while($rowProduct = mysqli_fetch_array($runProduct))
        {
            $productId = $rowProduct['id'];
            $productName = $rowProduct['name'];
            $productPirture = $rowProduct['picture'];
            $productDescription = $rowProduct['description'];
            $productCategory = $rowProduct['category'];
            $productLink = $rowProduct['purchaseMethod'];
            $productPrice = $rowProduct['price'];
            $productPictureName = $rowProduct['pictureName'];
            
            if($productCategory=="Entertainment")
            {
                echo" 
                <div id='single_product'> 
                   <a href='productdetail.php?productId=$productId'><image src= '/Project/pages/UserUploads/ProductPictures/$productPictureName'/></a>
                   <p name='product-name'>$productName</p>
                   <h4 name='product-price'>$$productPrice</h4>
                   <a href='productdetail.php?productId=$productId'><button name='cart_button'> Details</button></a>
                </div>
                <div><p></p></div>
            ";
            }
        }
    }
    
    function getProductSportsOutdoors()
    {
        global $conn;
        
        $getProduct = "SELECT * FROM productList ";
        
        $runProduct = mysqli_query($conn, $getProduct) or die('Error');
        
        while($rowProduct = mysqli_fetch_array($runProduct))
        {
            $productId = $rowProduct['id'];
            $productName = $rowProduct['name'];
            $productPirture = $rowProduct['picture'];
            $productDescription = $rowProduct['description'];
            $productCategory = $rowProduct['category'];
            $productLink = $rowProduct['purchaseMethod'];
            $productPrice = $rowProduct['price'];
            $productPictureName = $rowProduct['pictureName'];
            
            if($productCategory=="Sports & Outdoors")
            {
                echo" 
                <div id='single_product'> 
                   <a href='productdetail.php?productId=$productId'><image src= '/Project/pages/UserUploads/ProductPictures/$productPictureName'/></a>
                   <p name='product-name'>$productName</p>
                   <h4 name='product-price'>$$productPrice</h4>
                   <a href='productdetail.php?productId=$productId'><button name='cart_button'> Details</button></a>
                </div>
                <div><p></p></div>
            ";
            }
        }
    }
    
    function getProductKids()
    {
        global $conn;
        
        $getProduct = "SELECT * FROM productList ";
        
        $runProduct = mysqli_query($conn, $getProduct) or die('Error');
        
        while($rowProduct = mysqli_fetch_array($runProduct))
        {
            $productId = $rowProduct['id'];
            $productName = $rowProduct['name'];
            $productPirture = $rowProduct['picture'];
            $productDescription = $rowProduct['description'];
            $productCategory = $rowProduct['category'];
            $productLink = $rowProduct['purchaseMethod'];
            $productPrice = $rowProduct['price'];
            $productPictureName = $rowProduct['pictureName'];
            
            if($productCategory=="Kids")
            {
                echo" 
                <div id='single_product'> 
                   <a href='productdetail.php?productId=$productId'><image src= '/Project/pages/UserUploads/ProductPictures/$productPictureName'/></a>
                   <p name='product-name'>$productName</p>
                   <h4 name='product-price'>$$productPrice</h4>
                   <a href='productdetail.php?productId=$productId'><button name='cart_button'> Details</button></a>
                </div>
                <div><p></p></div>
            ";
            }
        }
    }
    
    
    function getCouponFood()
    {
        global $conn;
        
        $getCoupon = "SELECT * FROM couponList ";
        
        $runCoupon = mysqli_query($conn, $getCoupon) or die('Error');
        
        while($rowCoupon = mysqli_fetch_array($runCoupon))
        {
            $couponId = $rowCoupon['id'];
            $couponName = $rowCoupon['name'];
            $couponDescription = $rowCoupon['description'];
            $couponCategory = $rowCoupon['category'];
            $couponObtainMethod = $rowCoupon['obtainMethod'];
            $couponExpirationDate = $rowCoupon['expirationDate'];
            
            if($couponCategory=="Food" && $couponExpirationDate >= date("Y-m-d"))
            {
               echo" 
                <div id='single_coupon'> 
                   <div>
                   <h4 name='coupon-name'><a href='coupondetail.php?couponId=$couponId'>$couponName</a></h4>
                   </div>
                   <div>
                   <p><a href='coupondetail.php?couponId=$couponId'><button name='cart_button'> Details</button></a></p>
                   </div>
                </div>
            "; 
            }
        }
    }
    
    function getCouponClothingShoes()
    {
        global $conn;
        
        $getCoupon = "SELECT * FROM couponList ";
        
        $runCoupon = mysqli_query($conn, $getCoupon) or die('Error');
        
        while($rowCoupon = mysqli_fetch_array($runCoupon))
        {
            $couponId = $rowCoupon['id'];
            $couponName = $rowCoupon['name'];
            $couponDescription = $rowCoupon['description'];
            $couponCategory = $rowCoupon['category'];
            $couponObtainMethod = $rowCoupon['obtainMethod'];
            $couponExpirationDate = $rowCoupon['expirationDate'];
            
            if($couponCategory=="Clothing & Shoes" && $couponExpirationDate >= date("Y-m-d"))
            {
               echo" 
                <div id='single_coupon'> 
                   <div>
                   <h4 name='coupon-name'><a href='coupondetail.php?couponId=$couponId'>$couponName</a></h4>
                   </div>
                   <div>
                   <p><a href='coupondetail.php?couponId=$couponId'><button name='cart_button'> Details</button></a></p>
                   </div>
                </div>
            "; 
            }
        }
    }
    
    function getCouponEntertainment()
    {
        global $conn;
        
        $getCoupon = "SELECT * FROM couponList ";
        
        $runCoupon = mysqli_query($conn, $getCoupon) or die('Error');
        
        while($rowCoupon = mysqli_fetch_array($runCoupon))
        {
            $couponId = $rowCoupon['id'];
            $couponName = $rowCoupon['name'];
            $couponDescription = $rowCoupon['description'];
            $couponCategory = $rowCoupon['category'];
            $couponObtainMethod = $rowCoupon['obtainMethod'];
            $couponExpirationDate = $rowCoupon['expirationDate'];
            
            if($couponCategory=="Entertainment" && $couponExpirationDate >= date("Y-m-d"))
            {
               echo" 
                <div id='single_coupon'> 
                   <div>
                   <h4 name='coupon-name'><a href='coupondetail.php?couponId=$couponId'>$couponName</a></h4>
                   </div>
                   <div>
                   <p><a href='coupondetail.php?couponId=$couponId'><button name='cart_button'> Details</button></a></p>
                   </div>
                </div>
            "; 
            }
        }
    }
    
    function getCouponGrocery()
    {
        global $conn;
        
        $getCoupon = "SELECT * FROM couponList ";
        
        $runCoupon = mysqli_query($conn, $getCoupon) or die('Error');
        
        while($rowCoupon = mysqli_fetch_array($runCoupon))
        {
            $couponId = $rowCoupon['id'];
            $couponName = $rowCoupon['name'];
            $couponDescription = $rowCoupon['description'];
            $couponCategory = $rowCoupon['category'];
            $couponObtainMethod = $rowCoupon['obtainMethod'];
            $couponExpirationDate = $rowCoupon['expirationDate'];
            
            if($couponCategory=="Grocery" && $couponExpirationDate >= date("Y-m-d"))
            {
               echo" 
                <div id='single_coupon'> 
                   <div>
                   <h4 name='coupon-name'><a href='coupondetail.php?couponId=$couponId'>$couponName</a></h4>
                   </div>
                   <div>
                   <p><a href='coupondetail.php?couponId=$couponId'><button name='cart_button'> Details</button></a></p>
                   </div>
                </div>
            "; 
            }
        }
    }
    
function getLoginError()
    {
        if(isset($_GET["error"]))
        {
            if($_GET["error"] == "emptyfields")
            {
               echo '<p style = "color:#e61928" class="login-messages">Please fill in the empty fields</p>';
            } 
            else if($_GET["error"] == "sqlerror")
            {
               echo '<p style = "color:#e61928" class="login-messages">User does not exist</p>';
            }
            else if($_GET["error"] == "wrongpassword")
            {
                echo '<p style = "color:#e61928" class="login-messages">Incorrect Password</p>';
            }
            else if($_GET["error"] == "nouser")
            {
                echo '<p style = "color:#e61928" class="login-messages">User does not exist</p>';
            }
        }
        else if($_GET["login"] == "success")
        {
            header("Location:/Project/pages/home.php");
        }
    }
    
    function getMyProduct()
    {
        global $conn;
        
        $getProduct = "SELECT * FROM productList ";
        
        $runProduct = mysqli_query($conn, $getProduct) or die('Error');
        
        while($rowProduct = mysqli_fetch_array($runProduct))
        {
            $productId = $rowProduct['id'];
            $productName = $rowProduct['name'];
            $productPirture = $rowProduct['picture'];
            $productDescription = $rowProduct['description'];
            $productCategory = $rowProduct['category'];
            $productLink = $rowProduct['purchaseMethod'];
            $productPrice = $rowProduct['price'];
            $productPictureName = $rowProduct['pictureName'];
            $productUserId = $rowProduct['userId'];
            
            session_start();
            
            if($productUserId==$_SESSION['userId'])
            {
                echo" 
                <div id='single_product'> 
                <form action='/Project/pages/UserUploads/item_delete.php?productId=".$productId."' method='post'>
                   <a href='productdetail.php?productId=$productId'><image src= '/Project/pages/UserUploads/ProductPictures/$productPictureName'/></a>
                   <p name='product-name'>$productName</p>
                   <h4 name='product-price'>$$productPrice</h4>
                   <a href='productdetail.php?productId=$productId'><button name='cart_button'> Details</button></a>
                   <div></div>
                        <button class='delete-button' name='product-delete-button' type='submit'> Delete </button>
                     </div>
                </form>
                <div><p></p></div>
            ";
            }
        }
    }
    
    function getMyService()
    {
        global $conn;
        
        $getService = "SELECT * FROM serviceList ";
        
        $runService = mysqli_query($conn, $getService) or die('Error');
        
        while($rowService = mysqli_fetch_array($runService))
        {
            $serviceId = $rowService['id'];
            $serviceName = $rowService['name'];
            $serviceInfo = $rowService['info'];
            $serviceChargeRate = $rowService['chargeRate'];
            $serviceUserId = $rowService['userId'];
            
            session_start();
            
            if($serviceUserId==$_SESSION['userId'])
            {
            echo" 
                <div id='single_service'> 
                <form action='/Project/pages/UserUploads/item_delete.php?serviceId=".$serviceId."' method='post'>
                   <div>
                   <h4 name='service-name'><a href='servicedetail.php?serviceId=$serviceId'>$serviceName</a></h4>
                   </div>
                   <div>
                   <p name='service-charge-rate'>$serviceChargeRate</p>
                   </div>
                   <div>
                   <p></p>
                   <div></div>
                   <li style='color: white'>
                        <button class='delete-button' name='service-delete-button' type='submit'> Delete </button>
                     </div>
                    </li>
                </form>
                </div>
            ";
            }
        }
    }
    
    function getMyCoupon()
    {
        global $conn;
        
        $getCoupon = "SELECT * FROM couponList ";
        
        $runCoupon = mysqli_query($conn, $getCoupon) or die('Error');
        
        while($rowCoupon = mysqli_fetch_array($runCoupon))
        {
            $couponId = $rowCoupon['id'];
            $couponName = $rowCoupon['name'];
            $couponDescription = $rowCoupon['description'];
            $couponCategory = $rowCoupon['category'];
            $couponObtainMethod = $rowCoupon['obtainMethod'];
            $couponExpirationDate = $rowCoupon['expirationDate'];
            $couponUserId = $rowCoupon['userId'];
            
            session_start();
            
            if($couponUserId==$_SESSION['userId'])
            {
                echo" 
                
                <div id='single_coupon'> 
                <form action='/Project/pages/UserUploads/item_delete.php?couponId=".$couponId."' method='post'>
                   <div>
                   <h4 name='coupon-name'><a href='coupondetail.php?couponId=$couponId'>$couponName</a></h4>
                   </div>
                   <div>
                   
                   <div></div>
                        <button class='delete-button' name='coupon-delete-button' type='submit'> Delete </button>
                     </div>
                </form>
                </div>
                 ";
            }
            
        }
    }
    
    function getMyGiveaway()
    {
        global $conn;
        
        $getGiveaway = "SELECT * FROM giveawayList ";
        
        $runGiveaway = mysqli_query($conn, $getGiveaway) or die('Error');
        
        while($rowGiveaway = mysqli_fetch_array($runGiveaway))
        {
            $giveawayId = $rowGiveaway['id'];
            $giveawayName = $rowGiveaway['name'];
            $giveawayPictureName = $rowGiveaway['pictureName'];
            $giveawayInfo = $rowGiveaway['info'];
            $giveawayUserId = $rowGiveaway['userId'];
            
            session_start();
            
            if($giveawayUserId==$_SESSION['userId'])
            {
            echo" 
                <div id='single_giveaway'> 
                <form action='/Project/pages/UserUploads/item_delete.php?giveawayId=".$giveawayId."' method='post'>
                   <a href='giveawaydetail.php?giveawayId=$giveawayId'><image src= '/Project/pages/UserUploads/GiveawayPictures/$giveawayPictureName'/></a>
                   <p name='giveaway-name'>$giveawayName</p>
                   <a href='giveawaydetail.php?giveawayId=$giveawayId'><button name='cart_button'> Details</button></a>
                   <div></div>
                        <button class='delete-button' name='giveaway-delete-button' type='submit'> Delete </button>
                </div>
                </form>
                <div><p></p></div>
            ";
            }
        }
    }
    
    
function searchProducts()
{
    global $conn;
        
    if(isset($_GET['input']))
    {
        $searchInput = $_GET['input'];
        
        //get product results
        $getProduct = "SELECT * FROM productList WHERE name LIKE '%$searchInput%' OR description LIKE '%$searchInput%' OR category LIKE '%$searchInput%'";

        $runProduct = mysqli_query($conn, $getProduct) or die('Error');
        
        $i=0;
       
        while($rowProduct = mysqli_fetch_array($runProduct))
        {
            $i++;
            if($i=='1')
            {
               echo" <h4>Products</h4>";
            }
            
            $productId = $rowProduct['id'];
            $productName = $rowProduct['name'];
            $productPirture = $rowProduct['picture'];
            $productDescription = $rowProduct['description'];
            $productCategory = $rowProduct['category'];
            $productLink = $rowProduct['purchaseMethod'];
            $productPrice = $rowProduct['price'];
            $productPictureName = $rowProduct['pictureName'];
            
            echo" 
                <div id='single_product'> 
                   <a href='productdetail.php?productId=$productId'><image src= '/Project/pages/UserUploads/ProductPictures/$productPictureName'/></a>
                   <p name='product-name'>$productName</p>
                   <h4 name='product-price'>$$productPrice</h4>
                   <a href='productdetail.php?productId=$productId'><button name='cart_button'> Details</button></a>
                </div>
                <div><p></p></div>
            ";
        }
    }
}

function searchServices()
{
    global $conn;
        
    if(isset($_GET['input']))
    {
        $searchInput = $_GET['input'];
        
        $getService = "SELECT * FROM serviceList WHERE name LIKE '%$searchInput%' OR info LIKE '%$searchInput%'";
        
        $runService = mysqli_query($conn, $getService) or die('Error');
        
        $i=0;
        
        while($rowService = mysqli_fetch_array($runService))
        {
            $i++;
            if($i=='1')
            {
              echo" <h4 style='text-align:center'>Services</h4>";
            }
            
            $serviceId = $rowService['id'];
            $serviceName = $rowService['name'];
            $serviceInfo = $rowService['info'];
            $serviceChargeRate = $rowService['chargeRate'];
            
            echo" 
                <div id='single_service'> 
                   <div>
                   <h4 name='service-name'><a href='servicedetail.php?serviceId=$serviceId'>$serviceName</a></h4>
                   </div>
                   <div>
                   <p name='service-charge-rate'>$serviceChargeRate</p>
                   </div>
                   <div>
                   <p><a href='servicedetail.php?serviceId=$serviceId'><button name='cart_button'> Details</button></a></p>
                   </div>
                </div>
            ";
        }
    }
}

function searchCoupons()
{
    global $conn;
        
    if(isset($_GET['input']))
    {
        $searchInput = $_GET['input'];
        
        $getCoupon = "SELECT * FROM couponList WHERE name LIKE '%$searchInput%' OR description LIKE '%$searchInput%' OR category LIKE '%$searchInput%'";
        
        $runCoupon = mysqli_query($conn, $getCoupon) or die('Error');
        
        $i=0;
        
        while($rowCoupon = mysqli_fetch_array($runCoupon))
        {
            $i++;
            if($i=='1')
            {
              echo"<h4 style='text-align:center'>Coupons</h4>";
            }
            
            $couponId = $rowCoupon['id'];
            $couponName = $rowCoupon['name'];
            $couponDescription = $rowCoupon['description'];
            $couponCategory = $rowCoupon['category'];
            $couponObtainMethod = $rowCoupon['obtainMethod'];
            $couponExpirationDate = $rowCoupon['expirationDate'];
            
            if($couponExpirationDate >= date("Y-m-d"))
            {
                echo" 
                
                <div id='single_coupon'> 
                   <div>
                   <h4 name='coupon-name'><a href='coupondetail.php?couponId=$couponId'>$couponName</a></h4>
                   </div>
                   <div>
                   <p><a href='coupondetail.php?couponId=$couponId'><button name='cart_button'> Details</button></a></p>
                   </div>
                </div>
                 ";
            }
            
        }
    }
}

function searchGiveaways()
{
    global $conn;
        
    if(isset($_GET['input']))
    {
        $searchInput = $_GET['input'];
        
        $getGiveaway = "SELECT * FROM giveawayList WHERE name LIKE '%$searchInput%' OR info LIKE '%$searchInput%'";
        
        $runGiveaway = mysqli_query($conn, $getGiveaway) or die('Error');
        
        $i = 0;
        
        while($rowGiveaway = mysqli_fetch_array($runGiveaway))
        {
            $i++;
            if($i=='1')
            {
              echo" <h4>Giveaways</h4>";  
            }
            
            $giveawayId = $rowGiveaway['id'];
            $giveawayName = $rowGiveaway['name'];
            $giveawayPictureName = $rowGiveaway['pictureName'];
            $giveawayInfo = $rowGiveaway['info'];
            
            echo" 
               
                <div id='single_giveaway'> 
                   <a href='giveawaydetail.php?giveawayId=$giveawayId'><image src= '/Project/pages/UserUploads/GiveawayPictures/$giveawayPictureName'/></a>
                   <p name='giveaway-name'>$giveawayName</p>
                   <a href='giveawaydetail.php?giveawayId=$giveawayId'><button name='cart_button'> Details</button></a>
                </div>
                <div><p></p></div>
            ";
        }
    }
}