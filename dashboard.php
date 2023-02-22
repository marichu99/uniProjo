<?php
    session_start();
    $buttonclicked="None";
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
                            <span class="link-name">Dashboard</span>
                        </a></li>
                        <li><a href="#">
                            <i class="uil uil-chart-line"></i>
                            <span class="link-name">Analytics</span>
                        </a></li>
                        <li><a href="#">
                            <i class="uil uil-adjust-circle"></i>
                            <input type="submit" class="link-name" onclick="" value ="Add Admin" />
                        </a></li>
                        <li><a href="#">
                            <i class="uil uil-user-circle"></i>
                            <span class="link-name" onclick="window.location.href='Sign.php'">Add User</span>
                        </a></li>
                        <li><a href="#">
                            <i class="uil uil-plane-departure"></i>
                            <span class="link-name">Passwords</span>
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
                <?php 

                    if(isset($_SESSION["Username"])){
                        echo $buttonclicked;
                        include("dashmain.html");
                    }
                ?>

    
            </div>
        </div>
        
        <script type="text/javascript">
            const body = document.querySelector("body")
            var navContainer =body.querySelector(".navContainer")
            var navlist=body.querySelector(".navlist")
            // function to toggle the sidebar
            var sidebar=body.querySelector(".side-bar")
            // add the event listener
            sidebar.addEventListener("click",()=>{
                // navContainer.classList.toggle("navClose")
            })
        </script>
    </body>
</html>