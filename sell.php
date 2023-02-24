
<?php 
    session_start();
    $userName=$_SESSION["Username"];
    $conn=mysqli_connect("localhost","root","");
    mysqli_select_db($conn,"farmer");

    // check if the farmer is approved to sell
    $query="select Approved from farmer where farmerName='$userName'";
    $result=mysqli_query($conn,$query);
    $rows=mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="sell.css">
    <title>Document</title>
</head>
<body>
    <div class="main">
        <?php 
            if($rows==="Approved"){
                include("sellPage.php");
            }else{
                include("sellerDetails.php");
            }
        ?>
    </div>
    
</body>
</html>