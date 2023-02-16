<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="nav.css">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <title>Document</title>
</head>
<body>
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
                    <li><a href="login.php">Login</a></li>
                    <li><a href="Sign.php">Sign Up</a></li>
                    <li><a href="contact.html">Contact Us</a></li>
                    <li><a href="about.html">About Us</a></li>
                    <li><a href="logout.php"><i class="uil uil-signout"></a></i></li>
                </ul>                                                
                </div>
                <i class="fa fa-bars" onclick="showMenu()" id="bars"></i>
            </div>
        </nav>
</body>
</html>