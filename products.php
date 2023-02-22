<?php 

    session_start();
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
        // update the farmer table
        $username=$_SESSION["Username"];
        $addquery="select * from users where FirstName = '$username'";
        $result=mysqli_query($conn,$addquery);
        $rows=mysqli_fetch_assoc($result);
        $email=$rows["Email"];

        // get the productID from the updated DBase
        $prodID="select productID from products where productName= '$prodName' and  productDescription = '$prodDescription' and productImg= '$prodImg'";
        $prodQuery=mysqli_query($conn,$prodID);
        $prod=mysqli_fetch_assoc($prodQuery);
        $insertQ="INSERT INTO farmer (farmerID,farmerName,farmLocation,productID) VALUES('$email','$username','$prodLocation','$prod')";
        $insertRes=mysqli_query($conn,$insertQ);
        if($insertRes){
            echo '<script type= "text/javascript">';
            echo 'alert("You Have Added a Product");';    
            echo 'window.location.href = "index.php";';
            echo '</script>';
        }
    }


?>