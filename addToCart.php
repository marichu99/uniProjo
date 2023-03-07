<?php 
    session_start();
    $conn=mysqli_connect("localhost","root","");
    mysqli_select_db($conn,"farmer");
    $arr_results=array();

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php include("navLogin.php") ?>
    <section class="farm_produce">        
                <h3>Featured Farm Products</h3>
                <?php if($all==true){
                    echo "All produce";
                }else{
                    echo $numResult." results found";
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
</body>
</html>