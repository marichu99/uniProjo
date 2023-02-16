
<?php 
    session_start();
    $conn=mysqli_connect("localhost","root","");
    mysqli_select_db($conn,"farmer");
    if(isset($_GET["prodName"])){
        $prodName=$_GET["prodName"];
        $prodName=stripcslashes($prodName);
        $prodName=mysqli_real_escape_string($conn,$prodName);
    }
    if(isset($_GET["prodLocation"])){
        $prodLocation=$_GET["prodLocation"];
        $prodLocation=stripcslashes($prodLocation);
        $prodLocation=mysqli_real_escape_string($conn,$prodLocation);
    }
    if(isset($_GET["prodQuantity"])){
        $prodQuantity=$_GET["prodQuantity"];
        $prodQuantity=stripcslashes($prodQuantity);
        $prodQuantity=mysqli_real_escape_string($conn,$prodQuantity);
    }
    if(isset($prodName,$prodLocation,$prodQuantity)){
    $query="select * from products where productName='$prodName' and productLocation like '%$prodLocation%' and productQuantity='$prodQuantity' ";
    $result=mysqli_query($conn,$query);
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
        <div class ="nav-back">
            <?php 
                include "nav.php";
            ?>
            <form action="" method="get">
            <div class="searchContainer">
                
                <div class="searchItem">
                    <input type="text" placeholder="Search Produce" class="search_produce first" name="prodName"/>
                </div>
                <div class="searchItem">
                    <input type="text" placeholder="Search Location" class="search_produce" name="prodLocation"/>
                </div>
                <div class="searchItem">
                    <input type="text" placeholder="Quantity in Kilos" class="search_produce" name="prodQuantity"/>
                </div>
                <input class="searchBtn" type="submit" value="Search">
             </div>
            </form>
        </div>
        
        <div class="main">

            <div class="advanced">
                <?php 
                  include "advanced.php";
                ?>
            </div>
            <section class="farm_produce">        
                <h1>Featured Farm Products</h1>
                <div class="prod_row">
                    <?php
                        $search=false;
                        if(isset($result)) {
                        while($rows=mysqli_fetch_assoc($result)){
                            $search=true;
                        }
                    }
                   
                    if($search==false){
                    echo '<div class="prod_item">';
                        echo '<img src="images/white_maize.jfif" class="image_prod"/><br/>';
                        echo '<span class="prodName">White Maize</span><br/>';
                        echo '<span class="prodLocation">Uasin Gishu</span><br/>';
                        echo '<span class="prodPrice">50 Shillings Per Kilo</span><br/>';
                        echo '<div className="fpRating">';
                        echo    '<button class="prodBuy">Buy</button>';
                        echo '</div>';
                    echo '</div>';
                    echo '<div class="prod_item">';
                        echo '<img src="images/Yellow-beans.jpeg" class="image_prod"/>';
                        echo '<span class="prodName">White Maize</span><br/>';
                        echo '<span class="prodLocation">Uasin Gishu</span><br/>';
                        echo '<span class="prodPrice">50 Shillings Per Kilo</span><br/>';
                        echo '<div className="fpRating">';
                            echo '<button class="prodBuy">Buy</button>';
                        echo '</div>';
                    echo '</div>';
                    echo '<div class="prod_item">';
                    echo '<img src="images/white_wheat" class="image_prod"/>';
                        echo '<span class="prodName">White Maize</span><br/>';
                        echo '<span class="prodLocation">Uasin Gishu</span><br/>';
                        echo '<span class="prodPrice">50 Shillings Per Kilo</span><br/>';
                        echo '<div className="fpRating">';
                            echo '<button class="prodBuy">Buy</button>';
                        echo '</div>';
                    echo '</div>';
                    echo '<div class="prod_item">';
                        echo '<img src="images/white_wheat" class="image_prod"/>';
                        echo '<span class="prodName">White Maize</span><br/>';
                        echo '<span class="prodLocation">Uasin Gishu</span><br/>';
                        echo '<span class="prodPrice">50 Shillings Per Kilo</span><br/>';
                        echo '<div className="fpRating">';
                            echo '<button class="prodBuy">Buy</button>';
                        echo '</div>';
                    echo '</div>';
                    }
                    ?>
                </div>
                <h2>Search by Location</h2>
                <div class="prod_row">
                    <div class="prod_item">
                        <img src="images/uasin_gishu.jpg" class="image_prod"/><br/>
                        <span class="prodName">White Maize</span><br/>
                        <span class="prodLocation">Uasin Gishu</span><br/>
                        <span class="prodPrice">50 Shillings Per Kilo</span><br/>
                        <div className="fpRating">
                            <button class="prodBuy">Buy</button>
                        </div>
                    </div>
                    <div class="prod_item">
                        <img src="images/barley.jpg" class="image_prod"/>
                        <span class="prodName">Barley</span><br/>
                        <span class="prodLocation">Uasin Gishu</span><br/>
                        <span class="prodPrice">50 Shillings Per Kilo</span><br/>
                        <div className="fpRating">
                            <button class="prodBuy">Buy</button>
                        </div>
                    </div>
                    <div class="prod_item">
                        <img src="images/rice.jfif" class="image_prod"/>
                        <span class="prodName">Rice</span><br/>
                        <span class="prodLocation">Ahero</span><br/>
                        <span class="prodPrice">50 Shillings Per Kilo</span><br/>
                        <div className="fpRating">
                            <button class="prodBuy">Buy</button>
                        </div>
                    </div>
                    <div class="prod_item">
                        <img src="images/tomato.jpg" class="image_prod"/>
                        <span class="prodName">Tomato GreenHouse</span><br/>
                        <span class="prodLocation">Tharaka Nithi</span><br/>
                        <span class="prodPrice">7,000 Kshs Per Crate</span><br/>
                        <div className="fpRating">
                            <button class="prodBuy">Buy</button>
                        </div>
                    </div>
                </div>
                <div class="prod_row">
                    <div class="prod_item">
                        <img src="images/uasin_gishu.jpg" class="image_prod"/><br/>
                        <span class="prodName">White Maize</span><br/>
                        <span class="prodLocation">Uasin Gishu</span><br/>
                        <span class="prodPrice">50 Shillings Per Kilo</span><br/>
                        <div className="fpRating">
                            <button class="prodBuy">Buy</button>
                        </div>
                    </div>
                    <div class="prod_item">
                        <img src="images/barley.jpg" class="image_prod"/>
                        <span class="prodName">Barley</span><br/>
                        <span class="prodLocation">Uasin Gishu</span><br/>
                        <span class="prodPrice">50 Shillings Per Kilo</span><br/>
                        <div className="fpRating">
                            <button class="prodBuy">Buy</button>
                        </div>
                    </div>
                    <div class="prod_item">
                        <img src="images/rice.jfif" class="image_prod"/>
                        <span class="prodName">Rice</span><br/>
                        <span class="prodLocation">Ahero</span><br/>
                        <span class="prodPrice">50 Shillings Per Kilo</span><br/>
                        <div className="fpRating">
                            <button class="prodBuy">Buy</button>
                        </div>
                    </div>
                    <div class="prod_item">
                        <img src="images/tomato.jpg" class="image_prod"/>
                        <span class="prodName">Tomato GreenHouse</span><br/>
                        <span class="prodLocation">Tharaka Nithi</span><br/>
                        <span class="prodPrice">7,000 Kshs Per Crate</span><br/>
                        <div className="fpRating">
                            <button class="prodBuy">Buy</button>
                        </div>
                    </div>
                </div>
                <div class="prod_row">
                    <div class="prod_item">
                        <img src="images/uasin_gishu.jpg" class="image_prod"/><br/>
                        <span class="prodName">White Maize</span><br/>
                        <span class="prodLocation">Uasin Gishu</span><br/>
                        <span class="prodPrice">50 Shillings Per Kilo</span><br/>
                        <div className="fpRating">
                            <button class="prodBuy">Buy</button>
                        </div>
                    </div>
                    <div class="prod_item">
                        <img src="images/barley.jpg" class="image_prod"/>
                        <span class="prodName">Barley</span><br/>
                        <span class="prodLocation">Uasin Gishu</span><br/>
                        <span class="prodPrice">50 Shillings Per Kilo</span><br/>
                        <div className="fpRating">
                            <button class="prodBuy">Buy</button>
                        </div>
                    </div>
                    <div class="prod_item">
                        <img src="images/rice.jfif" class="image_prod"/>
                        <span class="prodName">Rice</span><br/>
                        <span class="prodLocation">Ahero</span><br/>
                        <span class="prodPrice">50 Shillings Per Kilo</span><br/>
                        <div className="fpRating">
                            <button class="prodBuy">Buy</button>
                        </div>
                    </div>
                    <div class="prod_item">
                        <img src="images/tomato.jpg" class="image_prod"/>
                        <span class="prodName">Tomato GreenHouse</span><br/>
                        <span class="prodLocation">Tharaka Nithi</span><br/>
                        <span class="prodPrice">7,000 Kshs Per Crate</span><br/>
                        <div className="fpRating">
                            <button class="prodBuy">Buy</button>
                        </div>
                    </div>
                </div>
                <div class="prod_row">
                    <div class="prod_item">
                        <img src="images/uasin_gishu.jpg" class="image_prod"/><br/>
                        <span class="prodName">White Maize</span><br/>
                        <span class="prodLocation">Uasin Gishu</span><br/>
                        <span class="prodPrice">50 Shillings Per Kilo</span><br/>
                        <div className="fpRating">
                            <button class="prodBuy">Buy</button>
                        </div>
                    </div>
                    <div class="prod_item">
                        <img src="images/barley.jpg" class="image_prod"/>
                        <span class="prodName">Barley</span><br/>
                        <span class="prodLocation">Uasin Gishu</span><br/>
                        <span class="prodPrice">50 Shillings Per Kilo</span><br/>
                        <div className="fpRating">
                            <button class="prodBuy">Buy</button>
                        </div>
                    </div>
                    <div class="prod_item">
                        <img src="images/rice.jfif" class="image_prod"/>
                        <span class="prodName">Rice</span><br/>
                        <span class="prodLocation">Ahero</span><br/>
                        <span class="prodPrice">50 Shillings Per Kilo</span><br/>
                        <div className="fpRating">
                            <button class="prodBuy">Buy</button>
                        </div>
                    </div>
                    <div class="prod_item">
                        <img src="images/tomato.jpg" class="image_prod"/>
                        <span class="prodName">Tomato GreenHouse</span><br/>
                        <span class="prodLocation">Tharaka Nithi</span><br/>
                        <span class="prodPrice">7,000 Kshs Per Crate</span><br/>
                        <div className="fpRating">
                            <button class="prodBuy">Buy</button>
                        </div>
                    </div>
                </div>
                
            </section>        
        </div>
        <div class="foot">
            <?php include "footer.php"?>
        </div>
</body>
</html>