
<?php 
    session_start();
    
?>

<html>
    <head>
        <meta name="viewport" content="with=device-with, initial scale=1.0">
        <title> Farmer Consumer Linkage Management System </title>
    </head>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="nav.css">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <body>
        <div class="banner">
           
        <nav>
            <div class="navbar" id="navbar">
                <span><i class="uil uil-user-circle"></i> <?php if (isset($_SESSION["Username"])){
                                                                    echo $_SESSION["Username"];
                                                                }else{
                                                                    echo "Welcome";}?></span>
                <div class="navlinks" id="navLinks">                
                    <i class="fa fa-times" onclick="hideMenu()" id="times"></i>
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="buy.php">Products</a></li>
                    <li><a href="Sign.php">My Profile</a></li>
                    <li><a href="contact.php">Contact Us</a></li>
                    <li><a href="about.html">About Us</a></li>
                    <li><a href="logout.php"><i class="uil uil-signout"></a></i></li>
                </ul>                                                
                </div>
                <i class="fa fa-bars" onclick="showMenu()" id="bars"></i>
            </div>
        </nav>
            <div class="content">
                <h1>BUY AND SELL FARM PRODUCE</h1>
                <P>Buy or Sell Farm produce in the click of a button</P>
                <div>
                    
                    <input type="submit" class="button" onclick="window.location.href='buy.php'" value="BUY" name="buy"/>
                    <input type="submit" class="button" onclick="window.location.href='sell.php'" value="SELL" name="sell"/>
                    
                    
                </div>
            </div>
            
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
            
        
        </section>
        <div class="foot">
            <?php include "footer.php"?>
        </div>
        
        <script src="login.js" type="text/javascript"></script>
        <!-- Javascript for toggling the menu -->
        <script type="module">
            var navbar = document.getElementById("navbar")
            var navlinks= document.getElementById("navLinks")
            function hideMenu(){
                navlinks.style.right="-200px"
            }
            function showMenu(){
                navlinks.style.right="0"
            }
        
            
                fetch("http://localhost/PROJO/data.php",{
                    method:"GET",
                    mode:"cors",
                    headers:{"Content-type":"application/json"}
                })
                .then(res=>res.json())
                .then((data)=>{
                    console.log(data)
                    var backen = document.getElementById("backen");
                    backen.textContent=data
                })
            
        </script>
       
    </body>
</html>