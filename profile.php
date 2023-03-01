<?php 
    session_start();
    $conn=mysqli_connect("localhost","root","");
    mysqli_select_db($conn,"farmer");
    if(isset($_SESSION["Username"])){
        $userName=$_SESSION["Username"];
        // echo $userName;
    }
    // get the details of the username 
    $query="select Email,FirstName,LastName from users where userName='$userName'";
    $result=mysqli_query($conn,$query) or die($conn);
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
        <form action="profileUpload.php" enctype="multipart/form-data" method="POST" >
            <div class="row">
                <div class="col">
                    <h3 class="title" onclick="window.location.href='productDetail.php'">Please Provide us with more details</h3>
                    <div class="profileHeader">
                        <div class="userDetails">
                            <h2><?php echo $rows["FirstName"]." ".$rows["LastName"];?></h2>
                            <p><?php echo $rows["Email"];?></p>
                            
                        </div>
                        <div class="userImage">
                            <!-- check whether the user has uploaded the photos -->
                            <?php if(!empty($rows["userIMG"])){

                            ?>
                            <div class="profilePic">
                                <img src="images/ <?php echo $rows["userIMG"];?>" alt="" id="pic">
                            </div>

                            <?php } else{  ?>
                            <!-- else -->
                            <div class="profilePic">
                                <img src="images/profile.jpg" alt="" id="pic">
                            </div>
                            <input type="file" id="upload" accept="Image/*" onchange="readURL(this)" value="Select an Image" name="userIMG"/>
                            <?php 
                             }
                            ?>
                            
                        </div>
                    </div>
                    <div class="details">
                        <div>
                            <div class="user">
                                <label>Change your Password</label>
                                <input type="password" placeholder="Enter your password" name="password" id="password"/>
                            </div>
                            <div class="user">
                                <label>Confirm your Password</label>
                                <input type="password" placeholder="Confirm your Password" name="passwordRe" id="passwordRE"/>
                            </div>
                            
                            <div class="flex">
                                <div class="user">
                                <input type="submit" value="SUBMIT CHANGES" class="submit" name="submit">
                                </div>
                            </div>
                        </div>
                        <div>
                            <div class="user">
                                <label id="passError"></label>
                            </div>
                            <div class="user">
                                <label id="passConfirm"></label>
                            </div>
                            <div class="flex">
                                <div class="user">
                                <input type="submit" value="DELETE ACCOUNT" class="submit" name="submit" id="delete">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                        
            </div>
        
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

        // form validation on the forms
        var password=document.getElementById("password");
        var passwordRE=document.getElementById("passwordRE");

        // get the error strings
        var passError=document.getElementById("passError");
        var passConfirm=document.getElementById("passConfirm");

        if(password.value.length<8 && password.value.length>0){
            passError.textContent="Password should be atleast 8 characters long";
            passError.style.color="red";
        }if(password.value !== passwordRE.value){
            passConfirm.textContent="Passwords do not match";
        }


    </script>
    
</body>
</html>
