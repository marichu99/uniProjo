<?php 
    session_start();
    $conn=mysqli_connect("localhost","root","");
    mysqli_select_db($conn,"farmer");
    if(isset($_SESSION["Username"])){
        $userName=$_SESSION["Username"];
        // echo $userName;
    }
    if(isset($_POST["submit"])){
        if(isset($_SESSION["Username"])){
            $userName=$_SESSION["Username"];
            echo $userName;
        }
        if(isset($_FILES["userIMG"])){
           
            $userIMG=$_FILES["userIMG"];
            // insert the details to the database 
            echo "The username is". $userName;
            echo $userIMG;
            // $query="INSERT  INTO users (userIMG)  select '$userIMG' from  where userName ='$userName' ";
            $query="UPDATE users set userIMG='$userIMG' where userName ='$userName'";
            $result=mysqli_query($conn,$query) or die(mysqli_error($conn));
            $rows=mysqli_affected_rows($conn);
            print_r($rows);
            if($rows>0){
                echo "
                    <script type='text/javascript'>
                        alert('Image saved successfully');
                        window.location.href='userLand.php';
                    </script>
                ";
            }
        }else{
             echo isset($_POST["userIMG"]);
        }
        if(isset($_POST["password"])){
            $password=$_POST["password"];
            $password=stripcslashes($password);
            $password=mysqli_real_escape_string($conn,$password);
            // hash the password
            $passHashed=password_hash($password,PASSWORD_DEFAULT);
            
            // update the password for the specific user
            // echo $userName;
            $sql="update users set password='$passHashed' where userName='$userName'";
            $query=mysqli_query($conn,$sql);
            $res=mysqli_affected_rows($conn);

            // appropriate messages
            if($res>1){
                echo "
                    <script type='text/javascript'>
                        alert('Password changed successfully');
                        window.location.href='userLand.php';
                    </script>
                ";
            }
        }
    }

    
    

?>