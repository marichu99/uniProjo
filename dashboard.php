<?php
    session_start();
    $conn=mysqli_connect("localhost","root","");
    mysqli_select_db($conn,"farmer");
    $arr_results=array();
    $all=true;
    // use button clicked to show which selection has been made for toggling
    $buttonclicked="None";


    // check whether the modes are set
    if(isset($_GET["mode"])){
        $mode=$_GET["mode"];
        if($mode == "users"){
            // get all users from the database
            $buttonclicked="users";
            $queryAll="select * from users";
            $resultsAll=mysqli_query($conn,$queryAll) or die(mysqli_error($conn));
            $numResult=mysqli_num_rows($resultsAll);
            while($rows=mysqli_fetch_assoc($resultsAll)){
                array_push($arr_results,$rows);
            }
        }else if($mode == "produce"){
            // get all products from the database
            $buttonclicked="produce";
            $queryAll="select * from products";
            $resultsAll=mysqli_query($conn,$queryAll) or die(mysqli_error($conn));
            $numResult=mysqli_num_rows($resultsAll);
            while($rows=mysqli_fetch_assoc($resultsAll)){
                array_push($arr_results,$rows);
            }
        }else if($mode == "admin"){
            // get all products from the database
            $buttonclicked = "admin";
            $queryAll="select * from products";
            $resultsAll=mysqli_query($conn,$queryAll) or die(mysqli_error($conn));
            $numResult=mysqli_num_rows($resultsAll);
            while($rows=mysqli_fetch_assoc($resultsAll)){
                array_push($arr_results,$rows);
            }
        }
    }
    
?>

<!DOCTYPE html>
<html>
    <head lang="en">
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

    <!-- CSS -->
    <link rel="stylesheet" href="dash.css">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css"> 

    <title>Admin Dashboard Panel</title>
    </head>
    <body>
        <div class="navlets">

            <!-- the div below is for the Sidebar Container -->

            <nav class="navContainer">
                <div class="logoName">
                    <span class="logo_name">Ukulima Bora</span>
                </div>
                <form method="post">
                <div class="menu-items">
                    <ul class="nav-links">
                        <li><a href="#">
                            <i class="uil uil-estate"></i>
                            <span class="link-name" onclick="window.location.href='dashboard.php'">Dashboard</span>
                        </a></li>
                        <li><a href="#">
                            <i class="uil uil-chart-line"></i>
                            <span class="link-name">Analytics</span>
                        </a></li>
                        <li><a href="#">
                            <i class="uil uil-adjust-circle"></i>
                            <span class="link-name" onclick="showPage('admin')" >Add Admin</span>
                        </a></li>
                        <li><a href="#">
                            <i class="uil uil-user-circle"></i>
                            <span class="link-name" onclick="showPage('users')">Users</span>
                        </a></li>
                        <li><a href="#">
                            <i class="uil uil-plane-departure"></i>
                            <span class="link-name" onclick="showPage('produce')">Produce</span>
                        </a></li>
                        
                    </ul>

                    <ul>
                        <li><a href="adminLogout.php">
                            <i class="uil uil-signout"></i>
                            <span class="link-name">Log out</span>
                        </a></li>
                    </ul>
                </div>
                </form>
            </nav>

            
            <!-- the div below is for the main content -->

            <div class="dashboard">
                <!-- div for the top level stuff -->
                <div class ="top">
                    <i class="uil uil-bars side-bar"></i>
                    <div class="search-box">
                    <i class="uil uil-user-circle"></i>
                    <span><?php echo $_SESSION["Username"];?></span>
                    </div>
                </div>
                <!-- div for the header content -->
                
                <!-- div for sign up to users -->
                <div class="main" id="main"> 

                    <form action="adminSign.php" method="POST">
                        <div class="row">
                            <div class="col">
                                <h3 class="title">Billing Addre ss</h3>
                                <div class="user">
                                    <label>First Name:</label>
                                    <input type="text" placeholder="Enter First Name" name="fname" required/>
                                </div>
                                <div class="user">
                                    <label>Last Name:</label>
                                    <input type="text" placeholder="Enter Last Name" name="lname" required/>
                                </div>
                                <div class="user">
                                    <label>Email:</label>
                                    <input type="email" placeholder="enter your email address" name="email" required/>
                                </div>
                                <div class="user">
                                    <label>Password:</label>
                                    <input type="password" placeholder="enter your password" name="password" required/>
                                </div>
                                <div class="user">
                                    <label>Confirm Password:</label>
                                    <input type="password" placeholder="Confirm your password" name="password" required/>
                                </div>
                            </div>
                            <div class="col">
                                <p id="firstSignValid"></p>
                                <p id="specialCharacter"></p>
                                <p id="lastSignValid"></p>
                                <p id="emailSignValid"></p>
                                <p id="passwordSignValid"></p>
                                <p id="passReValid"></p>     
                            </div>
                        </div>
                        <input type="submit" value="SUBMIT DETAILS" class="submit">
                    </form>        
                 </div>
                <!-- div for users -->
                <section class="farm_produce" >        
                    <h3 id="userHead">Featured Farm Products</h3>
                    <?php if($all==true){
                        echo "All users";
                    }else{
                        echo $numResult." results found";
                    }?>
                    <div class="prod_row" id="users">
                        

                        <!-- all products -->
                        
                        <?php
                            $iterations=0;
                            if(isset($resultsAll) and $all==true){
                                if($numResult>0){
                                while($iterations<$numResult){
                            
                        ?>
                        
                        <div class="prod_item">
                            <span><?php print_r($rows);?></span>
                            <img src='images/<?php echo $arr_results[$iterations]["userIMG"];?>' class="image_prod"/><br/>
                            <span class="prodName">Name: <?php echo $arr_results[$iterations]["FirstName"]; echo $arr_results[$iterations]["LastName"];?></span><br/>
                            <span class="prodName">User Name: <?php echo $arr_results[$iterations]["userName"]; ?></span><br/>
                            <form method="post" action="">
                            <div className="fpRating">
                                <input type="button" class="prodBuy" name="getDetails" value="DELETE USER"/>
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
                <!-- div for products -->
                <section class="farm_produce" id="farms">        
                    <h3>Featured Farm Products</h3>
                    <?php if($all==true){
                        echo "All produce";
                    }else{
                        echo $numResult." results found";
                    }?>
                    <div class="prod_row" id="farm_produces">
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
                    <?php 

                            if(isset($_SESSION["Username"])){
                                // $buttonclicked="None";
                            if($buttonclicked == "None"){
                                include("dashmain.php ");
                            }else if($buttonclicked == "admin"){
                                // echo $buttonclicked;
                                echo "
                                    <script type='text/javascript'>
                                    var admin=document.getElementById('main');
                                    admin.style.display='flex';
                                    </script>            
                                    ";
                            }else if($buttonclicked == "users"){
                                // echo $buttonclicked;
                                echo "
                                    <script type='text/javascript'>
                                    var users=document.getElementById('users');
                                    var heading=document.getElementById('userHead');
                                    var farms=document.getElementById('farms');
                                    heading.textContent='User List';
                                    users.style.display='flex';
                                    farms.style.display='none';
                                    </script>            
                                    ";
                            }else if($buttonclicked == "produce"){
                                // echo $buttonclicked;
                                echo "
                                    <script type='text/javascript'>
                                    var produce=document.getElementById('farm_produces');
                                    var heading=document.getElementById('userHead');
                                    heading.textContent='';
                                    produce.style.display='flex';
                                    </script>            
                                    ";
                            }
                                
                            }
                        ?>
             </div>
        </div>
        
        <script type="text/javascript">
            // get the div elements
           
            function showPage(type) {      
                if(type === "admin"){
                    window.location.href='dashboard.php?mode=admin';                
                }else if(type === "users"){
                    window.location.href='dashboard.php?mode=users';
                }else if(type === "produce"){
                    window.location.href='dashboard.php?mode=produce';
                }
            }
           
        </script>
    </body>
</html>