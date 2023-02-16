<?php 
    if(isset($_POST["prodName"])){
        $prodName=$_POST["prodName"];
        $prodName=stripcslashes($prodName);
    }
    if(isset($_POST["prodDescription"])){
        $prodDescription=$_POST["prodDescription"];
        $prodDescription=stripcslashes($prodDescription);
    }
    if(isset($_POST["prodImg"])){
        $prodImg=$_POST["prodImg"];
        $prodImg=stripcslashes($prodImg);
    }
    if(isset($_POST["prodLocation"])){
        $prodLocation=$_POST["prodLocation"];
        $prodLocation=stripcslashes($prodLocation);
    }
    if(isset($_POST["prodPrice"])){
        $prodPrice=$_POST["prodPrice"];
        $prodPrice=stripcslashes($prodPrice);
    }
    if(isset($_POST["prodCountry"])){
        $prodCountry=$_POST["prodCountry"];
        $prodCountry=stripcslashes($prodCountry);
    }
    if(isset($_POST["prodQuantity"])){
        $prodQuantity=$_POST["prodQuantity"];
        $prodQuantity=stripcslashes($prodQuantity);
    }
    
    // configure a database connection
    $conn=mysqli_connect("localhost","root","");
    
    // prevent sql injection
    $prodName=mysqli_real_escape_string($conn,$prodName);
    $prodDescription=mysqli_real_escape_string($conn,$prodDescription);
    $prodImg=mysqli_real_escape_string($conn,$prodImg);
    $prodLocation=mysqli_real_escape_string($conn,$prodLocation);
    $prodPrice=mysqli_real_escape_string($conn,$prodPrice);
    $prodCountry=mysqli_real_escape_string($conn,$prodCountry);
    $prodQuantity=mysqli_real_escape_string($conn,$prodQuantity);

    // connect to the specific database
    mysqli_select_db($conn,"farmer");


    $sql="INSERT INTO products(productName,productDescription,productImg,productLocation,productPrice,prodCountry,productQuantity) VALUES ('$prodName','$prodDescription','$prodImg','$prodLocation','$prodPrice','$prodCountry','$prodQuantity')";

    $query=mysqli_query($conn,$sql);

    // function to redirect user
    function redirect($url){
        header("Location:".$url);
    }

    // check for errors when posting the data to the backend
    if(!$query){
        $error=mysqli_error($conn);
        echo "The error is ".$error;
    }else{
        echo '<script type= "text/javascript">';
        echo 'alert("You Have Added a Product");';    
        echo 'window.location.href = "index.php";';
        echo '</script>';
    }


?>