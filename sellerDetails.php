<?php 
    $conn=mysqli_connect("localhost","root","");
    mysqli_select_db($conn,"farmer");
    if(isset($_SESSION["Username"])){
        $userName=$_SESSION["Username"];
    }
    // get the details of the username 
    $query="select Email,FirstName,LastName from users where FirstName='$userName'";
    $result=mysqli_query($conn,$query);
    $rows=mysqli_fetch_assoc($result);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="checkout.css">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css"> 
    <title>Document</title>
</head>
<body>
    <div class="main">
        <form action="sellerdetail.php" method="POST">
            <div class="row">
                <div class="col">
                    <h3 class="title">Please Provide us with more details</h3>
                    <div class="profileHeader">
                        <div class="userDetails">
                            <h2><?php echo $rows["FirstName"]." ".$rows["LastName"];?></h2>
                            <p><?php echo $rows["Email"];?></p>
                        </div>
                        <div class="userImage">
                            <div class="profilePic">
                                <img src="images/profile.jpg" alt="" id="pic">
                            </div>
                            <input type="file" id="upload" accept="Image/*" onchange="readURL(this)" value="Select an Image" name="farmerIMG"/>
                        </div>
                    </div>
                    <div class="user">
                        <label>Enter your ID image</label>
                        <input type="file" accept="Image/*" onchange="readURL(this)" value="Select an Image" name="IDimage"/>
                    </div>
                    <div class="user">
                        <label>Enter your Tax Compliance Certificate</label>
                        <input type="file" accept="Image/*" onchange="readURL(this)" value="Select an Image" name="Compliance"/>
                    </div>
                    <div class="flex">
                        <div class="user">
                            <label>Enter your KRA Pin:</label>
                            <input type="text" placeholder="AK023ERD234" name="KRAPin"/>
                        </div>
                    </div>
                </div>
                
            </div>
            <input type="submit" value="submit details" class="submit" name="submit">
        </form>
        <div class="payDeets">

        </div>
    </div>
    <script type="text/javascript">
        var upload=document.getElementById("upload")
        var image=document.getElementById("pic")

        // onchange
        upload.onchange=()=>{
            let reader= new FileReader();
            reader.readAsDataURL(upload.files[0])
            console.log(upload.files[0])
            reader.onload=()=>{
                image.setAttribute("src",reader.result)
            }
        }


    </script>
    
</body>
</html>