
<?php 
    session_start();
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
            <div class="searchContainer">
                <div class="searchItem">
                    <input type="text" placeholder="Search Produce" class="search_produce first"/>
                </div>
                <div class="searchItem">
                    <input type="text" placeholder="Search Location" class="search_produce"/>
                </div>
                <div class="searchItem">
                    <input type="text" placeholder="Quantity in Kilos" class="search_produce"/>
                </div>
                <button class="searchBtn"><a href="advanced.html">Search</a></button>
             </div>
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
                    <div class="prod_item">
                        <img src="images/white_maize.jfif" class="image_prod"/><br/>
                        <span class="prodName">White Maize</span><br/>
                        <span class="prodLocation">Uasin Gishu</span><br/>
                        <span class="prodPrice">50 Shillings Per Kilo</span><br/>
                        <div className="fpRating">
                            <button class="prodBuy">Buy</button>
                        </div>
                    </div>
                    <div class="prod_item">
                        <img src="images/Yellow-beans.jpeg" class="image_prod"/>
                        <span class="prodName">White Maize</span><br/>
                        <span class="prodLocation">Uasin Gishu</span><br/>
                        <span class="prodPrice">50 Shillings Per Kilo</span><br/>
                        <div className="fpRating">
                            <button class="prodBuy">Buy</button>
                        </div>
                    </div>
                    <div class="prod_item">
                        <img src="images/white_wheat" class="image_prod"/>
                        <span class="prodName">White Maize</span><br/>
                        <span class="prodLocation">Uasin Gishu</span><br/>
                        <span class="prodPrice">50 Shillings Per Kilo</span><br/>
                        <div className="fpRating">
                            <button class="prodBuy">Buy</button>
                        </div>
                    </div>
                    <div class="prod_item">
                        <img src="images/white_wheat" class="image_prod"/>
                        <span class="prodName">White Maize</span><br/>
                        <span class="prodLocation">Uasin Gishu</span><br/>
                        <span class="prodPrice">50 Shillings Per Kilo</span><br/>
                        <div className="fpRating">
                            <button class="prodBuy">Buy</button>
                        </div>
                    </div>
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
</body>
</html>