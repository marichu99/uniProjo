<?php 
    $conn=mysqli_connect("localhost","root","");
    mysqli_select_db($conn,"farmer");
    $arr_results=array();

    // get the details for the product you want to sell
    if(isset($_GET["ID"])){
        $prodID=$_GET["ID"];

        // query the database for the product details that match the passed ID
        $sql="select * from products where productID='$prodID'";
        $result=mysqli_query($conn,$sql);
        $rows=mysqli_fetch_assoc($result);


        $prodName=$rows["productName"];
        // show the buyer more products they might be interested in
        $query="select * from products where productName='$prodName'";
        $resultAll=mysqli_query($conn,$query) or die(mysqli_error($conn));
        $numResult=mysqli_num_rows($result);
        while($rowAll= mysqli_fetch_assoc ($resultAll)){
            array_push($arr_results,$rowAll);
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="productDetail.css">
    <title>Document</title>
</head>
<body>
    <div class="main">
        <form action="">
            <div class="row">
                <div class="col">
                    <h3 class="title">PRODUCT DETAILS</h3>
                    <div class="flex">
                        <div class="user">
                            <h4>Product Name:</h4>
                            <span><?php echo $rows["productName"];?></span>
                        </div>
                        <div class="user">
                            <h4>Comprehensive Price:</h4>
                            <span>Kshs: <?php echo $rows["productPrice"] ?></span>
                        </div>
                    </div>
                    <div class="user">
                        <div class="profilePic">
                        <img src="images/<?php echo $rows['productImg']; ?>" alt="">
                        </div>
                    </div>
                    
                </div>
                <div class="col">
                    <h3 class="title" onclick="window.location.href='accessToken.php'">Payment</h3>
                    <div class="user">
                        <label>Name:</label>
                        <input type="text" placeholder="Enter Your Name"/>
                    </div>
                    <div class="user">
                        <label>Phone Number:</label>
                        <input type="number" placeholder=" e.g. 254712345678"/>
                    </div>
                    <input type="submit" value="proceed to checkout" class="submit">
                </div>
            </div>
            
        </form>
       
    </div>
    <div class="prodRow">
            <!-- all products -->
            <h1>All Products</h1>
            <?php
                $iterations=0;
                if(isset($resultAll)){
                    if($numResult>0){
                        while($iterations<$numResult){
                          
            ?>
            <div class="prod_item">
            <span><?php print_r($rows);?></span>
                <img src='images/<?php echo $arr_results[$iterations]["productImg"];?>' class="image_prod"/><br/>
                <span class="prodName"><?php echo $arr_results[$iterations]["productName"];?></span><br/>
                <span class="prodLocation"><?php echo $arr_results[$iterations]["productLocation"]; ?></span><br/>
                <span class="prodPrice"><?php echo $arr_results[$iterations]["productPrice"]."Per Kilogram";?></span><br/>
                <div className="fpRating">
                <button class="prodBuy">Buy</button>
                </div>
            </div>
                <?php
                $iterations=$iterations+1;
                    }
                }
                }                    
            ?>

        </div>
    
</body>
</html>