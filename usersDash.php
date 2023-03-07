
<?php 
    session_start();
    $conn=mysqli_connect("localhost","root","");
    mysqli_select_db($conn,"farmer");
    $arr_results=array();
    if(isset($_POST["submit"])){
        // the all variable is used to know whether all products are being queried or not
        $all=false;
        // search using product name only
        if(isset($_POST["prodName"]) && strlen($_POST["prodLocation"])<1 && strlen($_POST["prodQuantity"])<1){
            $prodName=$_POST["prodName"];
            $prodName=stripcslashes($prodName);
            $prodName=mysqli_real_escape_string($conn,$prodName);
            $query="select * from products where productName='$prodName'";
            $result=mysqli_query($conn,$query) or die(mysqli_error($conn));
            $numResult=mysqli_num_rows($result);
            while($rows= mysqli_fetch_assoc ($result)){
                array_push($arr_results,$rows);
            }
            
        }
        // search using product name and product Location only
        if(strlen($_POST["prodName"])>1 && strlen($_POST["prodLocation"])>1 && strlen($_POST["prodQuantity"])<1){
            $prodName=$_POST["prodName"];
            $prodName=stripcslashes($prodName);
            $prodName=mysqli_real_escape_string($conn,$prodName);
            $prodLocation=$_POST["prodLocation"];
            $prodLocation=stripcslashes($prodLocation);
            $prodLocation=mysqli_real_escape_string($conn,$prodLocation);
            $query="select * from products where productName='$prodName' and productLocation like '%$prodLocation%' ";
            $result=mysqli_query($conn,$query) or die(mysqli_error($conn));
            $numResult=mysqli_num_rows($result);
            echo $numResult;
            while($rows= mysqli_fetch_assoc ($result)){
                array_push($arr_results,$rows);
            }            
        }
        // search using product name and product quantity only
        if(isset($_POST["prodName"]) && strlen($_POST["prodLocation"])<1 && strlen($_POST["prodQuantity"])>1){
            $prodName=$_POST["prodName"];
            $prodName=stripcslashes($prodName);
            $prodName=mysqli_real_escape_string($conn,$prodName);
            $prodQuantity=$_POST["prodQuantity"];
            $prodQuantity=stripcslashes($prodQuantity);
            $prodQuantity=mysqli_real_escape_string($conn,$prodQuantity);
            $query="select * from products where productName='$prodName' and productQuantity >='$prodQuantity-10' and productQuantity <='$prodQuantity+10'";
            $result=mysqli_query($conn,$query) or die(mysqli_error($conn));
            $numResult=mysqli_num_rows($result);
            while($rows= mysqli_fetch_assoc ($result)){
                array_push($arr_results,$rows);
            }
            
        }

    }else{
        $all=true;
        // get all produce from the database
        $queryAll="select * from products";
        $resultsAll=mysqli_query($conn,$queryAll) or die(mysqli_error($conn));
        $numResult=mysqli_num_rows($resultsAll);
        while($rows=mysqli_fetch_assoc($resultsAll)){
            array_push($arr_results,$rows);
        }
        

    }
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="buy.css">
    <title>Document</title>
</head>
<body>
        
        <div class="main">
            <section class="farm_produce">        
                <h3>Featured Farm Products</h3>
                <?php if($all==true){
                    echo "All users";
                }else{
                    echo $numResult." users found";
                }?>
                <div class="prod_row">
                    <?php
                        $iterations=0;
                        if(isset($result) and $all==false){
                            if($numResult>0){
                            while($iterations<$numResult){
                          
                    ?>
                     <div class="prod_item">
                        <span><?php print_r($rows);?></span>
                         <img src='images/<?php echo $arr_results[$iterations]["productImg"];?>' class="image_prod"/><br/>
                         <span class="prodName"><?php echo $arr_results[$iterations]["productName"];?></span><br/>
                         <span class="prodLocation"><?php echo $arr_results[$iterations]["productLocation"]; ?></span><br/>
                         <span class="prodPrice"><?php echo $arr_results[$iterations]["productPrice"]."Per Kilogram";?></span><br/>
                         <?php $prodID=$arr_results[$iterations]["productID"];?>
                         <form method="post" action="">
                         <div className="fpRating">
                            <input type="button" class="prodBuy" onclick="window.location.href='productDetail.php?ID='+<?php echo $prodID;?>" name="getDetails" value="Buy"/>
                         </div>
                         </form>
                     </div>
                     <?php
                        $iterations=$iterations+1;
                            }
                        }
                    }                     
                    
                    ?>

                    <!-- all products -->
                    
                    <?php
                        $iterations=0;
                        if(isset($resultsAll) and $all==true){
                            if($numResult>0){
                            while($iterations<$numResult){
                          
                    ?>
                    
                     <div class="prod_item">
                        <span><?php print_r($rows);?></span>
                         <img src='images/<?php echo $arr_results[$iterations]["productImg"];?>' class="image_prod"/><br/>
                         <span class="prodName"><?php echo $arr_results[$iterations]["productName"];?></span><br/>
                         <span class="prodLocation"><?php echo $arr_results[$iterations]["productLocation"]; ?></span><br/>
                         <span class="prodPrice"><?php echo $arr_results[$iterations]["productPrice"]."Per Kilogram";?></span><br/>
                         <?php $prodID=$arr_results[$iterations]["productID"];?>
                         <form method="post" action="">
                         <div className="fpRating">
                            <input type="button" class="prodBuy" onclick="window.location.href='productDetail.php?ID='+<?php echo $prodID;?>" name="getDetails" value="Buy"/>
                         </div>
                         </form>
                     </div>
                     <?php
                        $iterations=$iterations+1;
                            }
                        }
                    }                     
                    
                    ?>
                </div>
                
            </section>        
        </div>
        <div class="foot">
            <?php include "footer.php"?>
        </div>
        <script type="text/javascript">
            // get the input fields with minimum price and maximum price
            var minPrices= document.getElementById("minPrice");
            var maxPrices=document.getElementById("maxPrice");
            var i =1;
            function addMinus(types){
                if(types === "add"){
                   console.log(i+i)
                   minPrices.value=parseFloat(5)
                   console.log(minPrices.value+parseFloat(1+1))
                }
                else if(types === "minus"){
                    if (parseInt(minPrice.value-1)<1){
                        var minuss= document.querySelector(".minus")
                        minuss.disabled=true;
                    }else{
                        console.log("hey")
                        console.log(parseInt(minPrices.value-1));
                        minPrices.value=minPrices.value-1;
                    }
                }
            }
        </script>
</body>
</html>